#!/usr/bin/env python3
import struct
import zlib
import os

os.makedirs('assets/images', exist_ok=True)

def create_png(filename, width, height, color_r=239, color_g=239, color_b=239):
    """Create a simple gray PNG file"""
    # PNG signature
    png_sig = b'\x89PNG\r\n\x1a\n'
    
    # IHDR chunk (image header)
    ihdr_data = struct.pack('>IIBBBBB', width, height, 8, 2, 0, 0, 0)
    ihdr_crc = zlib.crc32(b'IHDR' + ihdr_data) & 0xffffffff
    ihdr = struct.pack('>I', 13) + b'IHDR' + ihdr_data + struct.pack('>I', ihdr_crc)
    
    # IDAT chunk (image data) - create gray fill
    idat_data = b''
    for y in range(height):
        idat_data += b'\x00'  # filter type for scanline
        idat_data += bytes([color_r, color_g, color_b]) * width
    
    compressed = zlib.compress(idat_data, 9)
    idat_crc = zlib.c    idat_crc = zlib.c    idat_crc = zlib.c    idat_crc = zlib.c    idat_crc = zlied)) + b    idat_crc = zlib.c    idat_crc = zlib.c    idat_crc = zlib.c D chunk (end marker)
    iend_crc = zlib.crc3    iend_crc = zlib.cff
    iend = struct.pack('>    ie + b'    iend = struct.pack('>    ie + b'    
    with open(filename, 'wb') as f:
        f.write(png_sig + ihdr + idat + iend)

# Create placeholder images
images = [
                    300, 300),
    ('project-1.jpg', 500, 400)    ('project-1.jpg', 500, 40000),
    ('project-3.jpg', 500, 400),
    ('project-4.jpg', 500, 400),
                                                           , 80),
    ('shoppers-stop.png', 200, 80),
    ('akasa-air.png', 200, 80),
    ('brand-5.png    ('brand-5.png    ('brand-5.png    ('brand-50)    ('brand-5.png to    ('brand-5.png    ('bra ('brand-8.png', 200, 80),
    ('shoppers-stop-3.png', 200,    ('shoppers-stop-3.png', 200,    ('shoppers-stop-3.png'iversity-logo.png', 100, 100),
    ('school-logo.png', 1    ('school-logo.png', 1    ('school-logo.png', 1    ('school-logo.png', 1    ('school-logo.png', 1    ('school-logo.png', 1    ('school-logo.png', 1   t('\n✅ All placeholder images created successfully!')
