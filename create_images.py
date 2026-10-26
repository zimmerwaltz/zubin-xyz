#!/usr/bin/env python3
import base64
import os

# Create base directory for all images
os.makedirs('assets/images', exist_ok=True)

# Simple 1x1 gray placeholder PNG
placeholder_png = base64.b64decode(
    b'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg=='
)

# Simple 1x1 gray placeholder JPG
placeholder_jpg = base64.b64decode(
    b'/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAgGBgcGBQgHBwcJCQgKDBQNDAsLDBkSEw8UHRofHh0aHBwgJC4nICIsIxwcKDcpLDAxNDQ0Hyc5PTgyPC4zNDL/2wBDAQkJCQwLDBgNDRgyIRwhMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjL/wAARCAABAAEDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAv/xAAUEAEAAAAAAAAAAAAAAAAAAAAA/8VAFQEBAQAAAAAAAAAAAAAAAAAAAAX/xAAUEQEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIRAxEAPwCwAC8A'
)

# Create all required images
images = [
    ('profile.jpg', 300, 300, False),
    ('project-1.jpg', 500, 400, False),
    ('project-2.jpg', 500, 400, False),
    ('project-3.jpg', 500, 400, False),
    ('project-4.jpg', 500, 400, False),
    ('thermo-fisher.png', 200, 80, True),
    ('brand-2.png', 200, 80, True),
    ('shoppers-stop.png', 200, 80, True),
    ('akasa-air.png', 200, 80, True),
    ('brand-5.png', 200, 80, True),
    ('shoppers-stop-2.png', 200, 80, True),
    ('shoppers-stop-logo.png', 200, 80, True),
    ('brand-8.png', 200, 80, True),
    ('shoppers-stop-3.png', 200, 80, True),
    ('google-certification.png', 100, 100, True),
    ('university-logo.png', 100, 100, True),
    ('school-logo.png', 100, 100, True),
]

for filename, width, height, is_png in images:
    filepath = f'assets/images/{filename}'
    data = placeholder_png if is_png else placeholder_jpg
    with open(filepath, 'wb') as f:
        f.write(data)
    print(f"✓ Created {filename}")

print("\n✅ All placeholder images created in assets/images/")
    img.save(f'assets/images/education/{filename}', 'PNG')
    print(f"✓ Created education/{filename}")

print("\n✅ All placeholder images created in assets/images/")
