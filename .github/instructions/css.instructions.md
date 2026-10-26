---
applyTo: "**/*.{css,scss,html,php}"
---

# CSS & Tailwind Instructions

## 1. Tailwind First

Use Tailwind CSS utilities for UI styling.

Do not use:
- Bootstrap
- Another CSS/UI framework
- Inline styles

Use custom CSS only when:
- Tailwind cannot reasonably express the required behavior
- A custom animation or browser feature requires it
- An existing project pattern already uses custom CSS
- A component requires a genuinely reusable custom rule

Do not duplicate Tailwind functionality unnecessarily with custom CSS.

---

## 2. Design Tokens

Always use the project's existing design tokens.

Use token-based classes for:
- Spacing
- Typography
- Colors
- Radius
- Shadows
- Sizing
- Breakpoints

Examples:

- `p-md`
- `gap-lg`
- `text-primary`
- `text-lg`
- `rounded-md`

Do not use arbitrary Tailwind values such as:

- `p-[13px]`
- `text-[17px]`
- `w-[347px]`

If a required Figma value does not exist:

1. Check existing tokens.
2. Determine whether an existing token can reasonably be reused.
3. If not, propose a new token.
4. Do not silently substitute a visually different value.
5. Do not hardcode arbitrary values.

---

## 3. Figma Auto Layout → CSS

Translate Figma Auto Layout into appropriate CSS layout primitives.

Prefer:

- `flex`
- `flex-col`
- `flex-row`
- `grid`
- `gap-*`
- `justify-*`
- `items-*`
- `self-*`

Use `gap` instead of margins for spacing between siblings whenever possible.

Map layout relationships rather than reproducing Figma coordinates.

---

## 4. Layout Principles

Layouts should be:

- Flexible
- Content-driven
- Responsive
- Maintainable

Avoid fixed widths and heights unless explicitly required by the design.

Avoid absolute positioning unless it represents:
- A genuine overlay
- A decorative element
- An intentional positioned relationship

Do not reproduce Figma using excessive absolute positioning.

If a layout requires a hack, first determine whether the underlying DOM or layout structure is incorrect.

---

## 5. Responsive Design

Use the project's configured breakpoints.

Implement responsive behavior mobile-first unless the existing architecture requires otherwise.

Use the Figma desktop, tablet, and mobile frames as explicit references.

Determine:

- What disappears
- What appears
- What stacks
- What changes orientation
- What reorders
- What changes alignment
- What changes spacing
- What changes size
- What becomes a different component variant

Do not simply scale desktop dimensions down.

---

## 6. Typography

Match Figma typography as closely as possible:

- Font family
- Font size
- Font weight
- Line height
- Letter spacing
- Text transformation

Use existing typography tokens.

Do not introduce arbitrary font sizes or line heights.

---

## 7. Visual Fidelity

Match Figma values for:

- Colors
- Spacing
- Border radius
- Border width
- Shadows
- Component dimensions
- Icon dimensions
- Alignment

Prioritize visual relationships and design-system consistency over isolated pixel values.

---

## 8. Tailwind Class Organization

Keep Tailwind classes logically organized.

Use a consistent conceptual order:

1. Layout
2. Positioning
3. Sizing
4. Spacing
5. Typography
6. Colors
7. Borders
8. Effects
9. Responsive modifiers
10. State modifiers

Avoid unnecessarily long or duplicated class lists.

---

## 9. Component States

Where Figma provides component states or variants, implement them explicitly.

Preserve:
- Default
- Hover
- Focus
- Active
- Disabled
- Selected
- Loading
- Expanded
- Collapsed

Do not invent additional visual states unless required by functionality.

---

## 10. CSS & Layout Anti-Patterns

Do not use:

- Magic numbers
- Arbitrary Tailwind values
- Negative margins to compensate for incorrect structure
- Excessive absolute positioning
- Transform-based positioning to correct layout mistakes
- Duplicate CSS rules
- One-off overrides when a token or structural correction would solve the problem

Correct the underlying layout structure instead of compensating for it with hacks.

---

## 11. Visual Parity Check

After implementing a Figma-driven UI, verify:

- Typography
- Spacing
- Alignment
- Component dimensions
- Colors
- Radius
- Borders
- Shadows
- Icons
- Responsive behavior
- Component states

Correct discrepancies before considering the implementation complete.