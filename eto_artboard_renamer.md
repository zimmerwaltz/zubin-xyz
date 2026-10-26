# Figma Skill: Rename Application Artboards

## Purpose

Rename only the Figma frames that represent actual application screens.

The goal is to produce concise, consistent, and professional screen names that accurately describe each screen's purpose within the user journey while leaving all supporting documentation untouched.

---

# Context

This Figma file contains two types of frames:

1. **Application Screens**
2. **Helper Frames**

Only application screens should be renamed.

Helper frames exist solely to provide context about the screens that follow and should never be renamed.

Helper frames can be identified by either of the following fill styles:

- `s_color/error/80`
- `s_color/indigo/80`

These helper frames may contain:

- User flow descriptions
- Business logic
- Functional requirements
- Acceptance criteria
- Design rationale
- Product notes
- UX guidance
- Screen descriptions

Read the contents of these helper frames before naming the screens that follow them. They provide valuable context that should influence the naming of subsequent screens.

---

# Screen Notes

Many application screens also have annotations or notes positioned directly beneath them.

Before renaming a screen, inspect these notes and use them as additional context.

When determining the most appropriate screen name, use the following sources of information in order of priority:

1. Helper frame content
2. Notes directly beneath the screen
3. Visible page title
4. Primary CTA or action
5. UI components and layout
6. Navigation patterns
7. The surrounding user flow

Do not rely solely on the visible heading of a screen.

---

# Scope

Rename **only** frames that represent actual application screens.

Do **not** rename:

- Helper frames
- Annotation frames
- Documentation frames
- Sticky notes
- Sections
- Components
- Component variants
- Auto Layout containers
- Variables
- Assets
- Icons
- Groups
- Libraries

Leave all non-screen objects completely unchanged.

---

# Decision Rules

For every application screen:

1. Determine the user's primary objective on that screen.
2. Ignore decorative or secondary content.
3. Name the screen based on the user's primary task or destination.
4. Prefer clear UX terminology over implementation terminology.
5. Reuse existing terminology consistently across the entire file.
6. Do not invent new names if an equivalent screen already exists.
7. Keep names concise while remaining descriptive.

---

# Naming Convention

Names should be:

- Short
- Descriptive
- Professional
- Human-readable
- Developer-friendly
- Consistent across the entire file

Use **Title Case**.

Examples:

- Escalation List
- Escalation Details
- Create Escalation
- Edit Escalation
- Assign Engineer
- Update Status
- Add Comment
- Upload Photos
- Review Escalation
- Resolution Summary
- Escalation Submitted

Avoid names such as:

- Screen 1
- Page 2
- Frame 156
- Desktop
- Mobile
- Copy
- Final
- Untitled
- New Screen

---

# Overlay Naming

If a frame primarily represents a modal, append:

`- Modal`

Examples:

- Escalation Details - Modal
- Update Status - Modal
- Confirm Resolution - Modal

If a frame primarily represents a sidebar or slide-out panel, append:

`- Sidebar`

Examples:

- Filters - Sidebar
- Escalation Details - Sidebar
- Notification History - Sidebar

Only append these suffixes when the modal or sidebar is the primary purpose of that frame.

---

# Multiple States

If multiple frames represent different states of the same screen, keep the base name identical and differentiate using a suffix.

Examples:

- Escalation Details
- Escalation Details - Loading
- Escalation Details - Empty
- Escalation Details - Error
- Escalation Details - Success
- Escalation Details - Validation Error

Apply this consistently throughout the file.

---

# Naming Style

Use nouns for information-focused screens.

Examples:

- Escalation List
- Escalation Details
- Resolution Summary

Use verbs for task-oriented screens.

Examples:

- Create Escalation
- Assign Engineer
- Update Status
- Add Comment
- Upload Photos
- Review Submission

Choose names that clearly communicate what the user is trying to accomplish.

---

# Consistency

Maintain consistent terminology throughout the design file.

For example, if one screen is named **Escalation Details**, do not rename another equivalent screen as:

- Escalation Information
- Escalation Overview
- Ticket Details

unless it genuinely represents a different concept.

Use identical terminology whenever the functionality is the same.

---

# Handling Ambiguity

If the purpose of a screen is unclear:

1. Read the nearest helper frame.
2. Read the notes beneath the screen.
3. Examine the preceding and following screens.
4. Infer the user's journey.
5. Determine the most likely purpose of the screen.

Only rely solely on the visible UI when no supporting context exists.

---

# Quality Standards

Every renamed screen should:

- Clearly communicate its purpose.
- Be understandable without opening the frame.
- Follow the same naming pattern as neighbouring screens.
- Be easy for designers, developers, product managers, and QA engineers to understand.
- Improve navigation within the Figma file.

---

# Output

Rename only the application screens.

Leave all helper frames, notes, documentation, and non-screen elements unchanged.

The final result should be a Figma file with a clean, professional, and consistent naming convention that accurately reflects the user journey and improves navigation, collaboration, usability, and developer handoff.