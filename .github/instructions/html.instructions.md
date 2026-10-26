---
applyTo: "**/*.{html,php}"
---

# HTML Instructions

## 1. Semantic HTML

Use semantic HTML elements wherever appropriate:

- `header`
- `nav`
- `main`
- `section`
- `article`
- `aside`
- `footer`
- `button`
- `form`
- `label`

Do not use a generic `div` when an appropriate semantic element exists.

---

## 2. DOM Structure

Keep the DOM hierarchy as shallow as reasonably possible.

Avoid unnecessary wrapper elements.

Use wrappers only when they provide a clear:
- Layout purpose
- Semantic purpose
- Accessibility purpose
- Interaction purpose

Structure the DOM to reflect Figma Auto Layout relationships rather than reproducing visual coordinates.

---

## 3. Component Structure

Reuse existing components before creating new markup.

Components should:
- Have a clear responsibility
- Be reusable where appropriate
- Follow existing project conventions
- Preserve Figma visual hierarchy
- Preserve supported variants and states

Do not duplicate markup for visually or functionally identical components.

---

## 4. Naming

Use descriptive, semantic names.

Prefer:

- `primary-button`
- `project-card`
- `site-header`
- `project-navigation`

Avoid:

- `box`
- `wrapper`
- `container2`
- `div1`
- `thing`

Follow existing project naming conventions when they are already established.

---

## 5. Accessibility

Use native interactive elements whenever possible.

Use:
- `<button>` for actions
- `<a>` for navigation
- `<input>` and associated `<label>` for form controls

Do not use clickable `div` elements when a native interactive element is appropriate.

Ensure:
- Interactive elements have accessible names
- Icon-only controls have appropriate accessible labels
- Heading hierarchy is meaningful
- Informative images have appropriate `alt` text
- Decorative images use empty `alt=""`
- Keyboard interaction is preserved

---

## 6. Figma Components & Code Connect

When a Figma component has an existing Code Connect mapping:

- Use the mapped code component.
- Do not recreate the component manually.
- Preserve supported variants.
- Preserve supported states.
- Use the component's existing API.

---

## 7. Responsive Markup

Structure markup so it naturally supports responsive Flexbox/Grid layouts.

Do not create separate desktop, tablet, and mobile markup unless the Figma designs genuinely require different structures.

Prefer responsive styling over duplicated markup.

---

## 8. Barba.js

Preserve existing Barba.js structure.

Do not remove, rename, or restructure existing:

- `data-barba`
- `data-barba="wrapper"`
- `data-barba="container"`
- Transition-related attributes

unless explicitly requested.

Ensure dynamically replaced Barba containers remain compatible with existing initialization logic.