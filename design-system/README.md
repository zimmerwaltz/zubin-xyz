# Design System

Zubin Charles' comprehensive design system: a single source of truth for all design decisions, components, and tokens.

## Structure

```
design-system/
├── index.html                    # Interactive showcase page
├── tokens.json                   # All design tokens (colors, typography, spacing, etc.)
└── components/
    ├── button/
    │   ├── README.md            # Component documentation
    │   ├── button.css           # Component styles
    │   └── button.html          # Component examples
    ├── typography/
    │   ├── README.md
    │   ├── typography.css
    │   └── typography.html
    └── colors/
        └── README.md            # Color palette documentation
```

## Quick Start

1. **View the Design System Showcase**
   - Open `design-system/index.html` in a browser
   - See all components, colors, and typography together

2. **Access Design Tokens**
   - Open `design-system/tokens.json`
   - Use tokens in your CSS: `var(--c-text-color-default-0)`

3. **Component Documentation**
   - Check component READMEs for usage examples
   - Copy component HTML and CSS as needed

## Using Design Tokens in CSS

### Colors
```css
color: var(--c-text-color-default-0);
background-color: var(--c-surface-color-primary-default);
border-color: var(--c-border-color-default-1);
```

### Typography
```css
font-family: var(--s-font-primary-font-family);
font-size: 16px;
font-weight: 500;
```

### Spacing
```css
padding: var(--r-jumper-lg-sm);
gap: var(--s-spacing-160);
margin-bottom: var(--r-jumper-sm-sm);
```

## Components

### Button
- **Primary**: Dark background, white text
- **Secondary**: White background, dark text with border
- [View Button Component →](components/button/README.md)

### Typography
- **Display**: Large, impactful headings (80px-72px)
- **Heading**: Section titles (24px-20px)
- **Body**: Content text (16px-14px)
- [View Typography Component →](components/typography/README.md)

### Colors
- **Surface**: Primary, light, dark variants
- **Text**: Default, secondary, muted colors
- **Interactive**: Button, link, and state colors
- [View Color System →](components/colors/README.md)

## Design Principles

1. **Consistency** - Use the same tokens everywhere
2. **Scalability** - Design tokens make scaling simple
3. **Accessibility** - Colors meet WCAG AA/AAA standards
4. **Flexibility** - Components adapt to different contexts

## Adding New Components

1. Create a new folder under `components/` (e.g., `components/card/`)
2. Add these files:
   - `README.md` - Documentation
   - `component.css` - Styles
   - `component.html` - Examples
3. Update `index.html` to showcase the new component
4. Update `tokens.json` if new tokens are needed

## Figma Integration

This design system is synced with the Figma design file. All components and tokens should match Figma definitions.

## Responsive Design

All components are responsive by default with breakpoints at:
- Mobile: 480px
- Tablet: 768px
- Desktop: 1440px

## Support

For questions about the design system, refer to the component READMEs or check the Figma design file.

---

**Version**: 1.0  
**Last Updated**: March 2026  
**Maintained by**: Zubin Charles
