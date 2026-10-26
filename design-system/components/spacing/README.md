# Spacing & Layout System

## Overview
The spacing system is based on an 8px base unit, creating a scalable and consistent spacing scale throughout the design system. This ensures visual harmony and rhythm across all pages and components.

## Spacing Scales

### Base Scale (8px Grid)
```
0px, 4px, 8px, 16px, 24px, 32px, 48px, 64px, 96px, 128px
```

### Named Spacing Variables

**Small Scale** (for component internals)
- `--s-spacing-00`: 0px
- `--s-spacing-80`: 8px
- `--s-spacing-160`: 16px
- `--s-spacing-240`: 24px
- `--s-spacing-320`: 32px
- `--s-spacing-640`: 64px

**Jumper Scale** (for major layout sections)
- `--r-jumper-xs-xs`: 16px
- `--r-jumper-sm-sm`: 24px
- `--r-jumper-lg-sm`: 48px
- `--r-jumper-xl-md`: 64px
- `--r-jumper-3xl-md`: 120px
- `--r-jumper-3xl-xl`: 160px
- `--r-jumper-4xl-md`: 160px

## Common Spacing Patterns

### Padding
```css
/* Component internal padding */
padding: 16px;              /* Small components */
padding: 24px;              /* Medium components */
padding: 48px;              /* Large sections */

/* Using tokens */
padding: var(--s-spacing-160);
padding: var(--r-jumper-lg-sm);
```

### Gap (Flexbox/Grid)
```css
/* Between items */
gap: 8px;                   /* Tight groupings */
gap: 16px;                  /* Standard spacing */
gap: 24px;                  /* Comfortable spacing */

/* Using tokens */
gap: var(--s-spacing-80);
gap: var(--s-spacing-160);
gap: var(--r-jumper-sm-sm);
```

### Margin
```css
/* Section spacing */
margin-bottom: 120px;       /* Between major sections */
margin-bottom: 64px;        /* Between subsections */

/* Using tokens */
margin-bottom: var(--r-jumper-3xl-md);
margin-bottom: var(--r-jumper-xl-md);
```

## Layout Patterns

### Hero Section
```css
.hero {
    padding: 120px var(--r-jumper-xl-md);   /* Vertical/Horizontal */
}
```

### Grid with Gap
```css
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--r-jumper-lg-sm);             /* 48px between items */
}
```

### Flex with Gap
```css
.flex {
    display: flex;
    gap: var(--s-spacing-160);              /* 16px between items */
}
```

## Responsive Spacing

Always maintain consistent spacing ratios on smaller screens:

```css
@media (max-width: 768px) {
    .hero {
        padding: 64px var(--r-jumper-sm-sm);  /* Reduced padding */
    }

    .grid {
        gap: var(--r-jumper-lg-sm);            /* Still comfortable */
    }
}
```

## Best Practices

1. **Always use tokens** - Never hardcode spacing values
2. **Consistent rhythm** - Use the same spacing values repeatedly
3. **Vertical rhythm** - Maintain consistent line heights and spacing
4. **Mobile first** - Start with mobile spacing, scale up
5. **Whitespace matters** - Generous spacing creates breathing room

## Container Sizes

- **Max Width**: 1440px (desktop)
- **Padding**: var(--r-jumper-xl-md) on each side
- **Mobile Padding**: var(--r-jumper-lg-sm) on each side

## Icon Spacing

- **Icon + Text**: var(--c-button-global-icon-spacing) (8px)
- **Icon Size XS**: 16px
- **Icon Size SM**: 20px
- **Icon Size MD**: 24px
- **Icon Size LG**: 40px
- **Icon Size XL**: 64px
