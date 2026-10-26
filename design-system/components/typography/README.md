# Typography Component

## Overview
Typography defines the visual hierarchy and readability of text across the design system. All text styles use two primary font families: Plus Jakarta Sans for body and UI text, and Abril Fatface for display/headings.

## Font Families

### Primary Font
- **Plus Jakarta Sans** - Used for: Body text, buttons, navigation, UI labels
- **Abril Fatface** - Used for: Display text, main headings
- **Inter** - Used for: Captions, supplementary text

## Type Scales

### Display Styles
- **D3**: 80px / 120px line-height / 1px letter-spacing
- **D4**: 72px / 80px line-height / 1px letter-spacing

### Heading Styles
- **H5**: 24px / 40px line-height
- **H6**: 20px / 32px line-height

### Body Styles
- **Large**: 16px / 24px line-height
- **Medium**: 14px / 20px line-height

### Caption Styles
- **Large**: 16px / 18px line-height

## Font Weights
- Regular: 400
- Medium: 500
- Bold: 700

## Usage Examples

### Display Text (D3)
```html
<h1 class="display-d3">Main Heading</h1>
```

### Heading (H5)
```html
<h2 class="heading-h5">Section Title</h2>
```

### Body Large
```html
<p class="body-lg">Regular paragraph text with comfortable line height.</p>
```

### Body Medium
```html
<p class="body-md">Smaller body text for secondary content.</p>
```

## Best Practices
- Use consistent type scale for visual hierarchy
- Ensure sufficient contrast ratio (7:1 for WCAG AAA)
- Line length: 45-75 characters for optimal readability
- Use letter-spacing carefully; it should rarely exceed 0.05em
