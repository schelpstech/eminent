from __future__ import annotations

import argparse
import re
from collections import defaultdict
from pathlib import Path


ROOT = Path(__file__).resolve().parents[1]
IMAGE_ROOT = ROOT / "assets" / "images"

IMAGE_EXTENSIONS = {
    ".bmp",
    ".cr2",
    ".gif",
    ".heic",
    ".heif",
    ".ico",
    ".jpeg",
    ".jpg",
    ".nef",
    ".png",
    ".raw",
    ".svg",
    ".tif",
    ".tiff",
    ".webp",
}
JUNK_FILENAMES = {".ds_store", "thumbs.db"}

ACTIVE_SOURCES = [
    *ROOT.glob("*.php"),
    *ROOT.glob("inc/*.php"),
    ROOT / "assets" / "css" / "eminent.css",
]

PATH_REF_PATTERN = re.compile(
    r"""(?P<ref>(?:assets/images/|\.\./images/)[^"'()\s]+?\.(?:bmp|cr2|gif|heic|heif|ico|jpeg|jpg|nef|png|raw|svg|tif|tiff|webp))""",
    re.I,
)
QUOTED_IMAGE_PATTERN = re.compile(
    r"""["'](?P<name>[^"']+?\.(?:bmp|cr2|gif|heic|heif|ico|jpeg|jpg|nef|png|raw|svg|tif|tiff|webp))["']""",
    re.I,
)
META_IMAGE_PATTERN = re.compile(
    r"""content=["'](?P<ref>assets/images/[^"']+?\.(?:jpeg|jpg|png|webp))["']""",
    re.I,
)


def is_inside(path: Path, parent: Path) -> bool:
    try:
        path.resolve().relative_to(parent.resolve())
    except ValueError:
        return False
    return True


def resolve_ref(ref: str, source: Path) -> Path | None:
    clean_ref = ref.strip().split("?", 1)[0].split("#", 1)[0]
    if clean_ref.startswith(("http://", "https://", "data:")):
        return None

    if clean_ref.startswith("assets/images/"):
        path = ROOT / clean_ref
    else:
        path = source.parent / clean_ref

    path = path.resolve()
    return path if is_inside(path, IMAGE_ROOT) else None


def all_image_files() -> list[Path]:
    return sorted(
        path
        for path in IMAGE_ROOT.rglob("*")
        if path.is_file() and (path.suffix.lower() in IMAGE_EXTENSIONS or path.name.lower() in JUNK_FILENAMES)
    )


def collect_active_refs() -> tuple[set[Path], list[tuple[Path, str]]]:
    used: set[Path] = set()
    missing_seen: set[tuple[Path, str]] = set()
    eminent_files = {path.name.lower(): path.resolve() for path in (IMAGE_ROOT / "eminent").glob("*") if path.is_file()}

    for source in ACTIVE_SOURCES:
        if not source.exists():
            continue

        text = source.read_text(encoding="utf-8", errors="ignore")
        for pattern in (PATH_REF_PATTERN, META_IMAGE_PATTERN):
            for match in pattern.finditer(text):
                ref = match.group("ref")
                path = resolve_ref(ref, source)
                if path is None:
                    continue
                if path.exists():
                    used.add(path)
                else:
                    missing_seen.add((source, ref))

        for match in QUOTED_IMAGE_PATTERN.finditer(text):
            name = Path(match.group("name")).name.lower()
            path = eminent_files.get(name)
            if path is not None:
                used.add(path)

    return used, sorted(missing_seen)


def format_size(bytes_count: int) -> str:
    size = float(bytes_count)
    for unit in ("B", "KB", "MB", "GB"):
        if size < 1024 or unit == "GB":
            return f"{size:.1f} {unit}" if unit != "B" else f"{int(size)} B"
        size /= 1024
    return f"{bytes_count} B"


def group_by_top_folder(files: list[Path]) -> dict[str, tuple[int, int]]:
    grouped: dict[str, list[Path]] = defaultdict(list)
    for path in files:
        rel = path.relative_to(IMAGE_ROOT)
        key = rel.parts[0] if len(rel.parts) > 1 else "."
        grouped[key].append(path)
    return {
        key: (len(paths), sum(path.stat().st_size for path in paths))
        for key, paths in sorted(grouped.items())
    }


def print_grouped(title: str, files: list[Path]) -> None:
    print(title)
    for folder, (count, bytes_count) in group_by_top_folder(files).items():
        print(f"  {folder}: {count} files, {format_size(bytes_count)}")


def prune(files: list[Path]) -> int:
    deleted_files = 0
    for path in files:
        if not is_inside(path, IMAGE_ROOT):
            raise RuntimeError(f"Refusing to delete outside assets/images: {path}")
        path.unlink()
        deleted_files += 1

    removed_dirs = 0
    for directory in sorted((path for path in IMAGE_ROOT.rglob("*") if path.is_dir()), key=lambda item: len(item.parts), reverse=True):
        if directory == IMAGE_ROOT or not is_inside(directory, IMAGE_ROOT):
            continue
        try:
            directory.rmdir()
        except OSError:
            continue
        removed_dirs += 1

    print(f"deleted_files {deleted_files}")
    print(f"removed_empty_dirs {removed_dirs}")
    return deleted_files


def main() -> int:
    parser = argparse.ArgumentParser(description="Check and prune active EKMS image assets.")
    parser.add_argument("--prune", action="store_true", help="Delete unused image files under assets/images.")
    args = parser.parse_args()

    used, missing = collect_active_refs()
    images = all_image_files()
    unused = [path for path in images if path.resolve() not in used]

    print(f"active_sources {len([source for source in ACTIVE_SOURCES if source.exists()])}")
    print(f"image_files {len(images)}")
    print(f"used {len(used)}")
    print(f"unused {len(unused)}")
    print(f"unused_bytes {format_size(sum(path.stat().st_size for path in unused))}")
    print(f"missing {len(missing)}")
    for source, ref in missing:
        print(f"{source.relative_to(ROOT)}: {ref}")

    print_grouped("unused_by_folder", unused)

    if missing:
        return 1
    if args.prune:
        prune(unused)
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
