# Figma Skill: Create Clickable Prototype from Existing Screens

## Purpose

Convert an existing set of high-fidelity application screens into a clean, presentation-ready clickable prototype by automatically placing prototype hotspots on the appropriate UI elements.

The objective is **not** to redesign the interface or create new interactions. Instead, intelligently infer the intended user journey and connect the existing screens using Figma prototype interactions that follow consistent UX and prototyping best practices.

---

# User Input

The user will provide a brief description of the flow.

Examples:

- Create and manage escalations
- Submit a support request
- Complete onboarding
- Approve a purchase order
- Review inspection checklist

Use this information to understand the intended workflow before creating interactions.

---

# Scope

Only create prototype interactions.

Do **not**:

- Modify layouts
- Rename frames
- Move layers
- Resize elements
- Edit typography
- Change colours
- Create new UI components
- Adjust Auto Layout
- Modify spacing
- Redesign screens

The visual design should remain completely unchanged unless explicitly required for overlay preparation (see Overlay Preparation).

---

# Overall Behaviour

Before creating any interactions:

1. Review every screen.
2. Understand the complete user journey.
3. Analyse the order of the screens.
4. Infer navigation based on common UX patterns.
5. Connect only meaningful interactions.

Use the following sources of information:

- User-provided flow description
- Screen names
- UI hierarchy
- Primary CTAs
- Secondary actions
- Forms
- Navigation
- Tabs
- Existing layouts
- Nearby screens
- Notes associated with screens

Always infer the most logical navigation path.

---

# Interaction Rules

Only place hotspots on UI elements that are intended to be interactive.

Examples include:

- Primary buttons
- Secondary buttons
- Text links
- Navigation items
- Cards
- List rows
- Tabs
- Menu items
- Close buttons
- Back buttons
- Cancel buttons
- Save buttons
- Continue buttons
- Submit buttons
- Edit actions
- View Details actions
- Floating Action Buttons
- Icons that clearly represent actions

Ignore:

- Decorative graphics
- Static icons
- Images
- Labels
- Dividers
- Decorative illustrations

---

# Prototype Defaults

Unless another rule overrides them, all prototype interactions should use:

**Interaction**

- Click

**Action**

- Navigate To

**Animation**

- Instant

These defaults should be used consistently throughout the prototype.

---

# Overlay Detection

Automatically identify frames that represent overlays.

Overlay types include:

- Modal
- Dialog
- Sidebar
- Drawer
- Flyout
- Bottom Sheet
- Popup

Determine this using:

- Screen names
- Layer hierarchy
- Positioning
- Layout
- User flow
- UI conventions

---

# Overlay Preparation

When an overlay frame is detected:

## Visibility

Hide every layer inside the frame except the overlay itself.

This includes:

- Background application screens
- Duplicate content
- Temporary annotations
- Placeholder elements
- Underlying page content

Only the overlay component should remain visible.

---

## Frame Fill

Remove any fill applied to the parent frame.

The overlay frame itself should have a transparent background.

Do **not** modify the overlay component.

Only remove the fill applied to the parent frame.

---

# Overlay Prototype Settings

Whenever a hotspot opens an overlay, configure the interaction using the following properties.

**Interaction**

- Click

**Action**

- Open Overlay

**Animation**

- Instant

**Close when clicking outside**

- Enabled

**Background**

- Colour: `#1B1B1D`
- Opacity: `30%`

**Position**

Determine the overlay position automatically:

- Modals and dialogs → Centered
- Sidebars and drawers → Preserve the designed position
- Bottom sheets → Preserve the designed position
- Flyouts → Preserve the designed position
- Popovers → Preserve the designed position

Do not reposition overlays unless their intended location is ambiguous.

---

# Overlay Navigation

If one overlay opens another overlay:

Use:

**Interaction**

- Click

**Action**

- Swap Overlay

**Animation**

- Instant

Maintain the following overlay properties:

- Close when clicking outside → Enabled
- Background → `#1B1B1D`
- Background Opacity → 30%
- Preserve overlay positioning using the same rules defined above

---

# Overlay Closing

Identify controls that dismiss overlays.

Examples include:

- Close icon
- Cancel button
- Back button
- Done button
- Confirm button (where appropriate)

Closing an overlay should return the user to the underlying screen while preserving its state.

---

# Navigation Rules

Ensure every primary workflow supports:

- Moving forward
- Going back
- Cancelling
- Closing overlays
- Returning to list screens
- Completing a task

Avoid dead ends.

Every primary user journey should have a logical way to continue or exit.

---

# Primary Actions

Prioritize connecting:

- Primary CTA buttons
- Continue
- Next
- Save
- Submit
- Confirm
- Create
- Update
- Finish
- Complete
- View Details
- Open Item

These define the core user journey.

---

# Secondary Actions

Also connect meaningful secondary actions where appropriate.

Examples:

- Edit
- Delete
- View More
- Add Comment
- Add Note
- Add Attachment
- Apply Filters
- Reset Filters
- Search
- Retry
- View History
- Cancel
- Back
- Close

Do not connect every possible UI element.

Focus on interactions that improve the prototype experience.

---

# Forms

For forms, connect:

- Continue
- Next
- Previous
- Save
- Save Draft
- Submit
- Cancel
- Back

Do not create interactions for individual form fields unless they are essential to the flow.

---

# Lists

For list-based screens, connect:

- Primary cards
- Primary list rows
- View Details actions
- Floating Action Buttons
- Add New actions
- Search
- Filters
- Sort (when applicable)

Ignore decorative icons.

---

# Tabs

Connect tabs that navigate between major application views.

Ignore inactive decorative tabs that do not perform navigation.

---

# Menus

Create interactions for:

- Overflow menus
- Dropdown menus
- Context menus

Only when they perform meaningful navigation or actions.

---

# Empty States

For empty state screens, connect:

- Primary CTA
- Secondary CTA

Ignore illustrations.

---

# Success Screens

For confirmation screens, connect:

- Done
- Continue
- Return to List
- View Details
- Finish

---

# Error States

Connect:

- Retry
- Back
- Cancel
- Contact Support (if applicable)

---

# Loading States

Only create interactions if the loading screen naturally transitions to another supplied screen.

Otherwise leave the loading state unchanged.

---

# Animation Rules

Use:

Animation:

- Instant

Only use another animation when it is clearly implied by the interface.

Examples include:

- Bottom sheet sliding from bottom
- Sidebar sliding from the side
- Modal fading into view

Otherwise always prefer **Instant**.

---

# Multiple Possible Destinations

If multiple destination screens appear possible:

Determine the correct destination using:

1. User-provided flow description
2. Screen names
3. Nearby screens
4. Layout order
5. UX conventions
6. Existing navigation

Choose the destination that best represents the intended workflow.

Avoid duplicate or conflicting interactions.

---

# Confidence Rules

When uncertain:

1. Review neighbouring screens.
2. Analyse any documentation.
3. Infer the user's journey.
4. Follow standard UX conventions.

Avoid speculative interactions.

---

# Quality Standards

The completed prototype should:

- Represent the primary happy path.
- Include meaningful secondary flows.
- Feel like a production-ready application.
- Be suitable for stakeholder demonstrations.
- Be suitable for usability testing.
- Be suitable for developer handoff.
- Be easy to understand without additional explanation.

Interactions should be predictable, consistent, and minimal.

---

# Output

Automatically analyse the supplied screens and create a polished clickable prototype.

Apply hotspots only to meaningful interactive UI elements.

Use the following defaults unless overridden by overlay rules:

**Interaction**

- Click

**Action**

- Navigate To

**Animation**

- Instant

Override the default action when appropriate:

- **Open Overlay** for modals, dialogs, sidebars, drawers, bottom sheets, flyouts, and popovers.
- **Swap Overlay** when navigating directly from one overlay to another.

For overlays:

- Hide all non-overlay layers.
- Remove the parent frame fill.
- Enable **Close when clicking outside**.
- Set the overlay background colour to **#1B1B1D** at **30% opacity**.
- Position overlays according to their intended layout (center modals, preserve the designed position for sidebars, drawers, flyouts, and bottom sheets).

Do not modify the UI design itself.

The final result should be a clean, fully connected, production-quality clickable prototype that accurately represents the intended user journey while minimizing unnecessary interactions and adhering to Figma prototyping best practices.