# Task: Card and Suit Visual Enhancements

## Scope
Improve the visual distinction between suits by showing the face value in the default font color and the suit symbol in a specific color. Additionally, represent suits as symbols by default.

## Decisions
- **Spades:** Blue (`text-blue-600 dark:text-blue-400`)
- **Hearts:** Red (`text-red-600 dark:text-red-400`)
- **Diamonds:** Orange (`text-orange-600 dark:text-orange-400`)
- **Clubs:** Green (`text-green-600 dark:text-green-400`)
- Use Tailwind CSS utility classes as per `agent-os/standards/views/color-palette.md`.
- Create Blade components for reuse.

## Context
- **Visuals:** None provided.
- **References:** `resources/views/lessons/opening-bid-level-1.blade.php`
- **Product alignment:** Aligns with the goal of providing quality interactive learning resources for beginners.

## Standards Applied
- `views/color-palette` — Ensures consistent theming and light/dark mode support.
