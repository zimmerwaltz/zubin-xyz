# Color System

## Overview
The color system is based on a carefully curated palette that maintains consistency across the design system. All colors are accessible and tested for sufficient contrast ratios.

## Color Palette

### Surface Colors
- **Primary (Black)**: #000000 - Primary brand color, used for backgrounds and text
- **Light 1 (White)**: #ffffff - Default background
- **Light 2 (Gray)**: #f6f6f6 - Secondary backgrounds
- **Dark 1 (Black)**: #000000 - Dark surface alternatives

### Text Colors
- **Default**: #000000 - Primary text color
- **On Color**: #ffffff - Text on colored backgrounds
- **Secondary**: #444444 - Secondary/muted text
- **Muted**: #999999 - Disabled or placeholder text

### Button Colors
- **Primary Surface**: #000000
- **Primary Text**: #ffffff
- **Primary Hover**: #333333
- **Secondary Surface**: #ffffff
- **Secondary Text**: #000000
- **Secondary Border**: #f6f6f6

### Border & Separator Colors
- **Primary Border**: #000000
- **Default Border**: #e6e6e6
- **Light Border**: #d9d9d9

## Usage in CSS

```css
/* Text Colors */
color: var(--c-text-color-default-0);
color: var(--c-text-color-on-color-0);

/* Background Colors */
background-color: var(--c-surface-color-primary-default);
background-color: var(--c-surface-color-default-light-1);
background-color: var(--c-surface-color-default-light-2);

/* Border Colors */
border-color: var(--c-border-color-primary-default);
border-color: var(--c-border-color-default-1);
```

## Accessibility
- Minimum contrast ratio: 4.5:1 for normal text (WCAG AA)
- Minimum contrast ratio: 7:1 for large text and UI components (WCAG AAA)
- All colors tested with color blindness simulation tools
