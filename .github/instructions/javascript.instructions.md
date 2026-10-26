---
applyTo: "**/*.{js,mjs,cjs}"
---

# JavaScript Instructions

## 1. General JavaScript

Use modern, readable JavaScript.

Prefer:
- Existing project utilities
- Existing project patterns
- Native browser APIs
- Small, focused functions
- Reusable utilities

Do not introduce a dependency when native JavaScript can reasonably solve the problem.

Do not introduce new libraries without explicit justification.

Avoid unnecessary global variables.

---

## 2. DOM Interaction

Use semantic selectors and the existing component structure.

Prefer event delegation for:
- Global interactions
- Repeated components
- Dynamically generated content

Avoid unnecessary repeated DOM queries.

Reuse DOM references when appropriate.

Clean up:
- Event listeners
- Observers
- Timers
- Animation instances

when their lifecycle requires it.

---

## 3. Barba.js

Barba.js controls page navigation and page transitions.

Preserve the existing Barba.js lifecycle.

Use appropriate lifecycle hooks:

- `before`
- `beforeLeave`
- `leave`
- `afterLeave`
- `beforeEnter`
- `enter`
- `afterEnter`

Do not bypass Barba.js for internal page navigation.

Page-specific JavaScript must initialize correctly after Barba replaces page content.

Do not retain stale DOM references from the previous page.

Reinitialize required interactions after navigation.

Clean up page-specific listeners and animation instances when leaving a page.

---

## 4. Animation

Use the project's existing animation approach.

Prefer:
- CSS transitions/animations for simple microinteractions
- JavaScript for dynamic calculations, sequencing, or lifecycle coordination

Do not introduce another animation library unless explicitly requested.

Prefer animating:
- `transform`
- `opacity`

Avoid animating layout-triggering properties when a transform or opacity solution is possible.

Keep animations performant.

---

## 5. Reduced Motion

Respect `prefers-reduced-motion`.

Reduce or disable non-essential animations when the user has requested reduced motion.

Functional interactions must remain usable without animation.

---

## 6. Interactive Components

Interactions must:

- Work with dynamically loaded Barba content
- Preserve accessibility
- Avoid unexpected layout shifts
- Avoid duplicate event handlers after navigation
- Preserve existing component behavior

---

## 7. Component States

Implement interaction states represented in Figma, including:

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

## 8. Global Interactions

For application-wide interactions:

- Prefer reusable utilities or delegated event handlers.
- Do not duplicate identical logic across pages.
- Ensure functionality works on content loaded through Barba.js.

---

## 9. Error Handling

Fail gracefully when optional DOM elements are absent.

Do not allow an optional component being absent on a page to break the entire application.

Do not silently suppress errors that indicate a genuine implementation problem.

---

## 10. Scope

Modify only the JavaScript required for the requested functionality.

Do not:
- Refactor unrelated JavaScript
- Change unrelated interactions
- Introduce unnecessary abstractions
- Add unrequested functionality

Preserve existing functionality unless explicitly instructed to change it.