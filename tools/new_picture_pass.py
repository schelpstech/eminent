from __future__ import annotations

import argparse
import math
import shutil
from pathlib import Path

from PIL import Image, ImageEnhance, ImageFilter, ImageOps, ImageStat


ROOT = Path(__file__).resolve().parents[1]
SOURCE_ROOT = ROOT / "new pictures"
OUTPUT_ROOT = ROOT / "assets" / "images" / "eminent"
REVIEW_ROOT = ROOT / "tmp" / "new-picture-review"
RAW_PREVIEW_ROOT = REVIEW_ROOT / "raw-previews"
WEB_EXTENSIONS = {".jpg", ".jpeg", ".png", ".webp"}


def open_rgb(path: Path) -> Image.Image:
    image = Image.open(path)
    image = ImageOps.exif_transpose(image)
    return image.convert("RGB")


def text_width(draw, text: str, font) -> int:
    left, _top, right, _bottom = draw.textbbox((0, 0), text, font=font)
    return right - left


def score_image(path: Path) -> tuple[float, float, float]:
    image = open_rgb(path)
    small = image.resize((256, max(1, round(256 * image.height / image.width))))
    gray = ImageOps.grayscale(small)
    stat = ImageStat.Stat(gray)
    brightness = stat.mean[0]
    contrast = stat.stddev[0]
    sharpness = ImageStat.Stat(gray.filter(ImageFilter.FIND_EDGES)).mean[0]
    return brightness, contrast, sharpness


def make_contact_sheet(source_dir: Path, output_name: str) -> None:
    from PIL import ImageDraw, ImageFont

    REVIEW_ROOT.mkdir(parents=True, exist_ok=True)
    files = sorted(path for path in source_dir.glob("*") if path.is_file() and path.suffix.lower() in WEB_EXTENSIONS)
    if not files:
        return

    try:
        font = ImageFont.truetype("arial.ttf", 15)
        small_font = ImageFont.truetype("arial.ttf", 12)
    except Exception:
        font = ImageFont.load_default()
        small_font = ImageFont.load_default()

    tile_w, tile_h = 260, 218
    thumb_w, thumb_h = 240, 152
    margin = 18
    gap = 12
    columns = 4
    rows = math.ceil(len(files) / columns)
    width = margin * 2 + columns * tile_w + (columns - 1) * gap
    height = margin * 2 + rows * tile_h + (rows - 1) * gap
    sheet = Image.new("RGB", (width, height), "#f7f9f8")
    draw = ImageDraw.Draw(sheet)

    for index, path in enumerate(files):
        col = index % columns
        row = index // columns
        x = margin + col * (tile_w + gap)
        y = margin + row * (tile_h + gap)
        try:
            image = open_rgb(path)
            brightness, contrast, sharpness = score_image(path)
        except Exception:
            continue

        thumb = ImageOps.contain(image, (thumb_w, thumb_h), Image.Resampling.LANCZOS)
        bg = Image.new("RGB", (thumb_w, thumb_h), "#e9eeee")
        bg.paste(thumb, ((thumb_w - thumb.width) // 2, (thumb_h - thumb.height) // 2))
        sheet.paste(bg, (x + 10, y + 10))
        draw.rectangle((x, y, x + tile_w, y + tile_h), outline="#d6dedb", width=1)

        label = path.name
        if text_width(draw, label, font) > thumb_w:
            label = label[:24] + "..."
        draw.text((x + 10, y + 170), label, fill="#14221b", font=font)
        meta = f"{image.width}x{image.height}  b{brightness:.0f} c{contrast:.0f} s{sharpness:.0f}"
        draw.text((x + 10, y + 193), meta, fill="#557064", font=small_font)

    sheet.save(REVIEW_ROOT / output_name, quality=88, optimize=True)


def extract_raw_previews() -> None:
    RAW_PREVIEW_ROOT.mkdir(parents=True, exist_ok=True)
    for raw_path in SOURCE_ROOT.glob("*"):
        if raw_path.suffix.lower() not in {".nef", ".cr2"}:
            continue
        data = raw_path.read_bytes()
        starts: list[int] = []
        index = 0
        while True:
            index = data.find(b"\xff\xd8", index)
            if index == -1:
                break
            starts.append(index)
            index += 2

        best: bytes | None = None
        for start in starts:
            end = data.find(b"\xff\xd9", start + 2)
            if end == -1:
                continue
            chunk = data[start : end + 2]
            if len(chunk) > 50_000 and (best is None or len(chunk) > len(best)):
                best = chunk

        if not best:
            continue

        destination = RAW_PREVIEW_ROOT / f"{raw_path.stem}.jpg"
        destination.write_bytes(best)
        try:
            with Image.open(destination) as image:
                image.verify()
        except Exception:
            destination.unlink(missing_ok=True)


def enhance(image: Image.Image) -> Image.Image:
    image = ImageOps.autocontrast(image, cutoff=0.5)
    image = ImageEnhance.Color(image).enhance(1.06)
    image = ImageEnhance.Contrast(image).enhance(1.05)
    image = ImageEnhance.Sharpness(image).enhance(1.10)
    return image


def crop_cover(image: Image.Image, size: tuple[int, int]) -> Image.Image:
    target_w, target_h = size
    source_ratio = image.width / image.height
    target_ratio = target_w / target_h
    if source_ratio > target_ratio:
        new_w = round(image.height * target_ratio)
        left = max(0, (image.width - new_w) // 2)
        crop = (left, 0, left + new_w, image.height)
    else:
        new_h = round(image.width / target_ratio)
        top = max(0, (image.height - new_h) // 3)
        crop = (0, top, image.width, top + new_h)
    return image.crop(crop).resize(size, Image.Resampling.LANCZOS)


def contain_on_blur(image: Image.Image, size: tuple[int, int]) -> Image.Image:
    background = crop_cover(image, size).filter(ImageFilter.GaussianBlur(radius=14))
    background = ImageEnhance.Brightness(background).enhance(0.72)
    foreground = ImageOps.contain(image, (round(size[0] * 0.94), round(size[1] * 0.94)), Image.Resampling.LANCZOS)
    x = (size[0] - foreground.width) // 2
    y = (size[1] - foreground.height) // 2
    background.paste(foreground, (x, y))
    return background


def export_asset(source: Path, destination_name: str, size: tuple[int, int], fit: str = "cover") -> None:
    image = enhance(open_rgb(source))
    final = contain_on_blur(image, size) if fit == "contain-blur" else crop_cover(image, size)
    destination = OUTPUT_ROOT / destination_name
    destination.parent.mkdir(parents=True, exist_ok=True)
    final.save(destination, "JPEG", quality=86, optimize=True, progressive=True)


def backup_current() -> None:
    backup_dir = REVIEW_ROOT / "previous-eminent"
    backup_dir.mkdir(parents=True, exist_ok=True)
    for path in OUTPUT_ROOT.glob("*.jpg"):
        target = backup_dir / path.name
        if not target.exists():
            shutil.copy2(path, target)


def source(name: str) -> Path:
    return SOURCE_ROOT / name


def raw_preview(name: str) -> Path:
    return RAW_PREVIEW_ROOT / name


def export_curated() -> None:
    if not RAW_PREVIEW_ROOT.exists():
        extract_raw_previews()
    backup_current()

    assignments: list[tuple[str, Path, tuple[int, int], str]] = [
        ("hero-preschool.jpg", source("IMG-20260202-WA0148.jpg"), (760, 620), "cover"),
        ("hero-primary.jpg", raw_preview("DSC_5382.jpg"), (760, 620), "cover"),
        ("hero-graduation.jpg", source("20250714_113009.jpg"), (760, 620), "cover"),
        ("programme-preschool.jpg", source("IMG-20260202-WA0148.jpg"), (640, 430), "cover"),
        ("programme-preschool-alt.jpg", source("IMG-20260302-WA0026.jpg"), (720, 560), "cover"),
        ("programme-nursery.jpg", source("IMG-20260302-WA0026.jpg"), (640, 430), "cover"),
        ("programme-nursery-alt.jpg", source("IMG-20250523-WA0020.jpg"), (720, 560), "cover"),
        ("programme-primary.jpg", raw_preview("DSC_5382.jpg"), (640, 430), "cover"),
        ("programme-primary-alt.jpg", source("WhatsApp Image 2026-07-06 at 1.53.21 PM (1).jpeg"), (720, 560), "cover"),
        ("about-main.jpg", source("20250714_113009.jpg"), (720, 560), "cover"),
        ("about-mission.jpg", source("IMG-20241205-WA0019.jpg"), (620, 520), "cover"),
        ("about-values.jpg", source("WhatsApp Image 2026-07-06 at 1.53.21 PM.jpeg"), (620, 520), "cover"),
        ("admissions.jpg", source("20250714_113229.jpg"), (720, 560), "cover"),
        ("contact.jpg", source("20250714_114651.jpg"), (720, 560), "cover"),
        ("team-group.jpg", source("20250703_131309.jpg"), (620, 520), "cover"),
        ("breadcrumb-bg.jpg", source("20250322_140446.jpg"), (1920, 760), "cover"),
        ("footer-cta.jpg", source("20250714_113239.jpg"), (1600, 620), "cover"),
        ("event-leadership.jpg", source("IMG_4780.JPG"), (640, 430), "cover"),
        ("event-fun-day.jpg", source("20250322_135507.jpg"), (640, 430), "cover"),
        ("event-swimming-day.jpg", source("20250530_130113.jpg"), (640, 430), "cover"),
        ("event-science-day.jpg", source("WhatsApp Image 2026-07-06 at 1.53.21 PM.jpeg"), (640, 430), "contain-blur"),
        ("event-mathspeed.jpg", source("IMG-20260202-WA0148.jpg"), (640, 430), "cover"),
        ("event-christmas-presentation.jpg", source("IMG-20251219-WA0037.jpg"), (640, 430), "cover"),
        ("event-independence-day.jpg", source("IMG-20251001-WA0053.jpg"), (640, 430), "cover"),
    ]

    gallery_assignments: list[tuple[str, Path, str]] = [
        ("gallery-sports-01.jpg", source("20250307_131908.jpg"), "cover"),
        ("gallery-sports-02.jpg", source("20250322_135507.jpg"), "cover"),
        ("gallery-sports-03.jpg", source("20250322_140446.jpg"), "cover"),
        ("gallery-swimming-01.jpg", source("20250530_125438.jpg"), "cover"),
        ("gallery-swimming-02.jpg", source("20250530_130113.jpg"), "cover"),
        ("gallery-swimming-03.jpg", source("20250530_132638.jpg"), "cover"),
        ("gallery-swimming-04.jpg", source("20250530_134028.jpg"), "cover"),
        ("gallery-science-01.jpg", source("WhatsApp Image 2026-07-06 at 1.53.20 PM.jpeg"), "contain-blur"),
        ("gallery-science-02.jpg", source("WhatsApp Image 2026-07-06 at 1.53.21 PM.jpeg"), "contain-blur"),
        ("gallery-science-03.jpg", source("WhatsApp Image 2026-07-06 at 1.53.21 PM (1).jpeg"), "contain-blur"),
        ("gallery-science-04.jpg", source("20260311_122209.jpg"), "cover"),
        ("gallery-mathspeed-01.jpg", source("IMG-20260202-WA0148.jpg"), "cover"),
        ("gallery-mathspeed-02.jpg", source("IMG-20260202-WA0149.jpg"), "cover"),
        ("gallery-christmas-01.jpg", source("IMG-20251219-WA0032.jpg"), "cover"),
        ("gallery-christmas-02.jpg", source("IMG-20251219-WA0033.jpg"), "cover"),
        ("gallery-christmas-03.jpg", source("IMG-20251219-WA0034.jpg"), "cover"),
        ("gallery-christmas-04.jpg", source("IMG-20251219-WA0035.jpg"), "cover"),
        ("gallery-christmas-05.jpg", source("IMG-20251219-WA0036.jpg"), "cover"),
        ("gallery-christmas-06.jpg", source("IMG-20251219-WA0037.jpg"), "cover"),
    ]

    for destination_name, source_path, size, fit in assignments:
        export_asset(source_path, destination_name, size, fit)
    for destination_name, source_path, fit in gallery_assignments:
        export_asset(source_path, destination_name, (640, 480), fit)


def main() -> int:
    parser = argparse.ArgumentParser()
    parser.add_argument("--extract-raw-previews", action="store_true")
    parser.add_argument("--review", action="store_true")
    parser.add_argument("--review-raw", action="store_true")
    parser.add_argument("--review-output", action="store_true")
    parser.add_argument("--export-curated", action="store_true")
    args = parser.parse_args()

    if args.extract_raw_previews:
        extract_raw_previews()
    if args.review:
        make_contact_sheet(SOURCE_ROOT, "new-pictures-contact.jpg")
    if args.review_raw:
        make_contact_sheet(RAW_PREVIEW_ROOT, "raw-previews-contact.jpg")
    if args.review_output:
        make_contact_sheet(OUTPUT_ROOT, "exported-assets-contact.jpg")
    if args.export_curated:
        export_curated()
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
