# Landing Page with Lesson Cards — Shaping Notes

## Scope

- New landing page for the bridge lessons app
- Display dynamically generated lessons as cards in a grid layout
- Replace the default Laravel welcome page at `/`

## Decisions

- **No database needed**: Lessons are dynamically generated with no state to persist. The app generates hands on-the-fly.
- **Blade templates**: Using Laravel's native templating per the tech stack
- **Tailwind CSS v4**: Already in use in the project (seen in welcome.blade.php)

## Context

- **Visuals:** lesson-cards-screenshot.png in agent-os/specs/ folder
- **References:** resources/views/welcome.blade.php (existing Laravel welcome page with Tailwind)
- **Product alignment:** N/A - no product docs found that conflict with this feature

## Standards Applied

- None required - building a simple landing page

## Tech Stack (from product docs)

- Blade templates
- Vanilla JavaScript
- CSS (Tailwind CSS v4)
- Laravel (PHP)
- No authentication
- No database