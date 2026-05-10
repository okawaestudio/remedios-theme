#!/usr/bin/env bash
# Convierte cada {slug}.jpg de assets/img/hero/provincias/ en 3 WebPs
# responsive (720/1280/1920). Idempotente — sobreescribe si existen.
#
# USAGE:
#   bash tools/optimize-provincias-img.sh
#
# REQUIERE: cwebp (brew install webp)

set -e
cd "$(dirname "$0")/.."
DIR="assets/img/hero/provincias"

if [ ! -d "$DIR" ]; then
  echo "ERROR: $DIR no existe."
  exit 1
fi

count=0
for jpg in "$DIR"/*.jpg; do
  [ -e "$jpg" ] || continue
  base=$(basename "$jpg" .jpg)
  echo "▶ $base.jpg"
  cwebp -q 75 -mt -resize 720 0  "$jpg" -o "$DIR/${base}-720.webp"  >/dev/null 2>&1
  cwebp -q 75 -mt -resize 1280 0 "$jpg" -o "$DIR/${base}-1280.webp" >/dev/null 2>&1
  cwebp -q 75 -mt              "$jpg" -o "$DIR/${base}.webp"      >/dev/null 2>&1
  printf "  ✓ %s.webp · %s-1280.webp · %s-720.webp\n" "$base" "$base" "$base"
  count=$((count + 1))
done

echo ""
echo "Listo · $count provincias optimizadas."
