# Background Options — Shaping Notes

## Scope

Adding a subtle, soft background image to the UI for the bridge lessons app. The user requested 3 temporary pages to test what different background styles look like before making a final choice.
Ultimately implemented a global background layout with clear readability constraints.

## Decisions

- Created temporary routes and views to test different background styles.
- **Iteration:** The initial playing cards photo had a poker vibe (poker chips). Revised options to be strictly bridge-appropriate:
  1. Green felt card table with subtle floating card outlines
  2. Clean green felt texture
  3. Close-up photo of playing cards on a table (no poker chips)
- **Final Selection:** Option 3 (Close-up cards photo).
- **Styling Architecture:** 
  - To maintain maximum readability for the lessons while keeping the visual interest of the background photo, the layout was split into layers:
  - The background image is applied globally to `body`.
  - A translucent `.overlay` covers the background (`rgba(255, 255, 255, 0.4)`) with a slight blur (`backdrop-filter: blur(2px)`).
  - The main content is wrapped in a centered `.content-wrapper` (max-width `5xl`) that has a highly opaque white background (`rgba(255, 255, 255, 0.95)`), a soft drop shadow, and faint borders. This frames the content beautifully like a page sitting on a card table.
- Skip TDD standard for these visual UI changes.

## Context

- **Visuals:** Sourced a freely available Unsplash image of playing cards.
- **References:** None.
- **Product alignment:** Yes, aligns with target audience (beginners learning bridge, free accessible app) by keeping the UI approachable and visually appealing without sacrificing reading clarity.

## Standards Applied

- Skipped `tdd-preferences` standard for these temporary pages and visual CSS changes, per user request.
