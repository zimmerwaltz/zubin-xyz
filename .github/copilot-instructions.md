# Copilot Instructions — Project & Design System

## 1. Project Context

This is a Figma-driven website implementation project.

Primary stack:
- Figma
- Figma MCP
- HTML
- Tailwind CSS
- Vanilla JavaScript
- PHP where required
- Barba.js for page transitions and navigation

Figma is the visual source of truth.

Figma MCP is the source for:
- Figma structure
- Components
- Variables
- Design tokens
- Assets
- Layout relationships
- Responsive references
- Component states

Existing project code is the source of truth for:
- Existing components
- Utilities
- Architecture
- Naming conventions
- Established implementation patterns

Do not redesign or reinterpret the Figma design unless explicitly requested.

---

## 2. Figma Fidelity — Primary Rule

Match the Figma design as closely as possible at every provided breakpoint.

Preserve:
- Typography
- Font size
- Font weight
- Line height
- Letter spacing
- Spacing
- Padding
- Gap
- Section spacing
- Colors
- Borders
- Border radius
- Shadows
- Component dimensions
- Icon sizing
- Alignment
- Component states
- Responsive behavior

Treat desktop, tablet, and mobile Figma frames as explicit references.

Compare the available Figma breakpoints before determining:
- What resizes
- What repositions
- What stacks
- What reorders
- What changes orientation
- What appears
- What disappears
- What changes alignment
- What changes spacing
- What changes component variants

Do not assume that mobile is simply a scaled-down desktop layout.

Success criterion:

> The implementation should be visually indistinguishable from the Figma reference at the intended breakpoints.

---

## 3. Design Tokens

Always use the project's existing design tokens.

Reuse existing tokens before creating new ones.

Design tokens govern:
- Spacing
- Typography
- Colors
- Border radius
- Borders
- Shadows
- Sizing
- Breakpoints

Do not invent new values when an appropriate token already exists.

If an exact Figma value is not represented by an existing token:

1. Check whether an existing token is appropriate.
2. If not, determine whether a new token should be added.
3. Propose the token addition.
4. Do not silently substitute a visually different value.
5. Do not introduce arbitrary values without justification.

The design-token system should remain the single source of truth for reusable visual values.

---

## 4. Existing Components & Code Connect

Reuse existing components whenever possible.

Before creating a new component:
1. Inspect the existing codebase.
2. Search for an equivalent or similar component.
3. Check relevant Figma Code Connect mappings.
4. Reuse or extend the existing component when appropriate.

Do not recreate a Figma component manually when an existing Code Connect mapping exists.

Preserve existing component APIs, variants, and states unless a change is explicitly required.

Extract repeated UI patterns into reusable components when appropriate.

Do not create abstractions merely for the sake of abstraction.

---

## 5. Responsive Design

Implement responsive behavior based on the Figma references.

Use the project's configured breakpoint system.

Follow mobile-first principles unless the existing project architecture requires otherwise.

Responsive implementation must reflect the actual differences between Figma breakpoints.

Explicitly account for:
- Visibility
- Layout direction
- Element ordering
- Alignment
- Spacing
- Sizing
- Navigation changes
- Component variants
- Content density

Do not infer responsive behavior solely from generic conventions when Figma provides a reference.

---

## 6. Architecture & Code Quality

Follow the existing project architecture.

Prefer:
- Simple solutions
- Reusable components
- Existing utilities
- Existing patterns
- Semantic markup
- Maintainable code

Do not:
- Introduce unnecessary abstractions
- Introduce unnecessary dependencies
- Introduce a new framework without explicit instruction
- Replace working architecture unnecessarily
- Modify unrelated files
- Refactor unrelated code

Do not use Bootstrap or another UI framework unless explicitly requested.

---

## 7. Barba.js

Barba.js is responsible for page navigation and page transitions.

Preserve the existing Barba.js architecture and lifecycle.

Do not break:
- `data-barba` attributes
- Barba wrappers
- Barba containers
- Transition hooks
- Existing navigation behavior

Ensure page-specific JavaScript works correctly after Barba replaces page content.

Ensure global functionality remains available across Barba navigation.

---

## 8. Implementation Workflow

Before making significant changes:

1. Inspect the relevant existing code.
2. Identify reusable components and utilities.
3. Inspect the relevant Figma frame/component through Figma MCP.
4. Check existing design tokens.
5. Check Code Connect mappings where applicable.
6. Compare desktop, tablet, and mobile Figma references.
7. Determine the smallest appropriate implementation.
8. Implement the change.
9. Test the relevant page and breakpoints.
10. Perform a visual parity check against Figma.
11. Fix discrepancies before considering the task complete.

Do not make broad changes when a targeted change is sufficient.

---

## 9. Scope Control

Only modify what is required for the requested task.

Do not:
- Refactor unrelated code
- Modify unrelated pages
- Replace existing components unnecessarily
- Add unrequested functionality
- Add unnecessary dependencies

Prefer incremental changes over large rewrites.

---

## 10. Decision Making

If the requirement can reasonably be inferred from:
- Figma
- Figma MCP
- Existing code
- Design tokens
- Code Connect
- Existing project conventions

proceed without asking for clarification.

Ask for clarification only when a missing decision would materially change the implementation.

Prefer established project patterns over introducing new approaches.

---

## 11. Final Verification

Before considering a Figma-driven UI implementation complete, verify:

### Visual
- Typography
- Spacing
- Alignment
- Component dimensions
- Colors
- Radius
- Borders
- Shadows
- Icons
- Visual hierarchy

### Responsive
- Desktop
- Tablet
- Mobile
- Show/hide behavior
- Layout changes
- Component variants

### Functional
- Interactions
- Navigation
- Component states
- Barba.js transitions
- Dynamically loaded content

Fix obvious discrepancies before finishing.