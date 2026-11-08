#!/usr/bin/env bash
set -euo pipefail

cd -- "$(dirname -- "${BASH_SOURCE[0]}")"

for command in identify convert; do
    if ! command -v "$command" >/dev/null 2>&1; then
        printf 'Required command not found: %s\n' "$command" >&2
        exit 1
    fi
done

processed=0

for image in *.png; do
    [[ -f "$image" ]] || continue
    [[ "$(identify -format '%wx%h' "$image")" == "480x466" ]] || continue

    temporary=$(mktemp --tmpdir=. --suffix=.png ".${image%.png}.XXXXXX")
    if convert "$image" -crop 466x466+0+0 +repage -alpha off \
        \( -size 466x466 xc:black -fill white -draw 'circle 233,233 233,0' -alpha copy \) \
        -compose CopyOpacity -composite "$temporary"; then
        mv -- "$temporary" "$image"
        printf 'Rounded %s\n' "$image"
        processed=$((processed + 1))
    else
        rm -f -- "$temporary"
        exit 1
    fi
done

printf 'Processed %d watch screenshot(s).\n' "$processed"