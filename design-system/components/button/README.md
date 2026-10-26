# Button Component

## Overview
Buttons are clickable elements that trigger actions or navigate to new pages. They come in two styles: primary (filled) and outline.

## Variants

### Primary Button
- Background: Black (#000000)
- Text Color: White (#ffffff)
- Hover: Dark Gray (#333333)
- Used for: Primary actions

### Outline Button
- Background: White (#ffffff)
- Text Color: Black (#000000)
- Border: Black (#000000)
- Hover Border: Dark Gray (#333333)
- Used for: Secondary actions

## Specifications
- Height: 56px
- Padding: 24px (horizontal), 0px (vertical)
- Border Radius: 4px
- Icon Spacing: 8px
- Border Width: 1px

## Usage

### Primary Button
```html
<a href="#" class="btn btn-primary">
  <span>View Portfolio</span>
  <span class="btn-icon icon-mask icon-arrow-right" aria-hidden="true"></span>
</a>
```

### Outline Button
```html
<a href="#" class="btn btn-outline">
  <span>Connect on LinkedIn</span>
  <span class="btn-icon icon-mask icon-linkedin" aria-hidden="true"></span>
</a>
```

## Accessibility
- Use semantic `<a>` or `<button>` tags
- Include descriptive text in `<span>`
- Decorative icons should have `aria-hidden="true"`
- Ensure sufficient contrast ratio (7:1 for WCAG AAA)
