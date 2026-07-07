from __future__ import annotations

from pathlib import Path

from PIL import Image, ImageDraw, ImageFilter, ImageFont, ImageOps


ROOT = Path(__file__).resolve().parents[1]
IMAGE_ROOT = ROOT / "assets" / "images"

GREEN = (8, 163, 79)
PURPLE = (119, 99, 229)
GOLD = (248, 214, 78)


def load_font(size: int, *, bold: bool = False) -> ImageFont.ImageFont:
    names = ["arialbd.ttf", "segoeuib.ttf", "arial.ttf"] if bold else ["arial.ttf", "segoeui.ttf"]
    for name in names:
        try:
            return ImageFont.truetype(name, size)
        except OSError:
            continue
    return ImageFont.load_default()


def make_gradient(size: int) -> Image.Image:
    gradient = Image.new("RGBA", (size, size))
    pixels = gradient.load()
    for y in range(size):
        for x in range(size):
            t = (x + y) / (2 * (size - 1))
            red = round(GREEN[0] * (1 - t) + PURPLE[0] * t)
            green = round(GREEN[1] * (1 - t) + PURPLE[1] * t)
            blue = round(GREEN[2] * (1 - t) + PURPLE[2] * t)
            pixels[x, y] = (red, green, blue, 255)
    return gradient


def create_favicon() -> Image.Image:
    size = 512
    image = Image.new("RGBA", (size, size), (0, 0, 0, 0))

    shadow = Image.new("RGBA", (size, size), (0, 0, 0, 0))
    shadow_draw = ImageDraw.Draw(shadow)
    shadow_draw.ellipse((42, 54, size - 34, size - 22), fill=(0, 0, 0, 52))
    image.alpha_composite(shadow.filter(ImageFilter.GaussianBlur(18)))

    mask = Image.new("L", (size, size), 0)
    mask_draw = ImageDraw.Draw(mask)
    mask_draw.ellipse((48, 38, size - 48, size - 58), fill=255)

    mark = Image.new("RGBA", (size, size), (0, 0, 0, 0))
    mark.paste(make_gradient(size), (0, 0), mask)
    mark_draw = ImageDraw.Draw(mark)
    mark_draw.ellipse((48, 38, size - 48, size - 58), outline=(255, 255, 255, 72), width=7)
    mark_draw.arc((98, 88, size - 98, size - 108), 205, 332, fill=GOLD + (255,), width=18)
    image.alpha_composite(mark)

    draw = ImageDraw.Draw(image)
    font = load_font(292, bold=True)
    bbox = draw.textbbox((0, 0), "E", font=font)
    text_width = bbox[2] - bbox[0]
    text_height = bbox[3] - bbox[1]
    draw.text(
        ((size - text_width) / 2 - bbox[0], (size - text_height) / 2 - bbox[1] - 10),
        "E",
        font=font,
        fill=(255, 255, 255, 255),
    )

    output = IMAGE_ROOT / "fav.png"
    image.save(output)
    return image


def crop_cover(path: Path, size: tuple[int, int]) -> Image.Image:
    image = Image.open(path)
    image = ImageOps.exif_transpose(image).convert("RGB")
    scale = max(size[0] / image.width, size[1] / image.height)
    resized = image.resize((round(image.width * scale), round(image.height * scale)), Image.Resampling.LANCZOS)
    left = (resized.width - size[0]) // 2
    top = (resized.height - size[1]) // 2
    return resized.crop((left, top, left + size[0], top + size[1]))


def create_social_image(mark: Image.Image) -> None:
    size = (1200, 630)
    background = crop_cover(IMAGE_ROOT / "eminent" / "hero-preschool.jpg", size).convert("RGBA")

    overlay = Image.new("RGBA", size, (0, 0, 0, 0))
    pixels = overlay.load()
    for y in range(size[1]):
        for x in range(size[0]):
            t = x / (size[0] - 1)
            alpha = round(210 * (1 - t) + 55 * t)
            pixels[x, y] = (6, 30, 22, alpha)
    background.alpha_composite(overlay)

    logo = mark.resize((136, 136), Image.Resampling.LANCZOS)
    background.alpha_composite(logo, (76, 86))

    draw = ImageDraw.Draw(background)
    title_font = load_font(62, bold=True)
    small_font = load_font(24, bold=True)
    body_font = load_font(30)

    draw.text((238, 102), "Eminent Kids", font=title_font, fill=(255, 255, 255, 255))
    draw.text((242, 168), "Montessori School", font=small_font, fill=GOLD + (255,))
    draw.text(
        (82, 284),
        "Nurturing confident, creative and morally grounded learners in Mowe.",
        font=body_font,
        fill=(255, 255, 255, 238),
    )
    draw.rounded_rectangle((82, 398, 426, 458), radius=30, fill=GREEN + (235,))
    draw.text((116, 413), "eminentkidsschool.com", font=small_font, fill=(255, 255, 255, 255))

    background.convert("RGB").save(IMAGE_ROOT / "og-image.jpg", quality=90, optimize=True, progressive=True)


def main() -> None:
    IMAGE_ROOT.mkdir(parents=True, exist_ok=True)
    mark = create_favicon()
    create_social_image(mark)


if __name__ == "__main__":
    main()
