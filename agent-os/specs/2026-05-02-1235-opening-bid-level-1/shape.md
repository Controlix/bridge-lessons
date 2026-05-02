# Opening bid on level 1 — Shaping Notes

## Scope

This lesson covers the opening bid on level 1.
With 12-19 high card points (HCP) a player can bid 1 card.
All examples and exercises should be limited to hands with <20 HCP.

Rules for bidding:
- <12 HCP: pass.
- 15-17 HCP and a balanced hand (card distribution 5-3-3-2, 4-4-3-2, or 4-3-3-3): bid 1SA (1 No Trump).
- 5+ spades: bid 1 spade.
- 5+ hearts: bid 1 heart.
- 4+ diamonds: bid 1 diamond.
- else: bid 1 club.

## Decisions

- We will implement an `OpeningBidEvaluator` class in PHP to handle the logic.
- We will strictly follow TDD (Test-Driven Development) and write Pest tests first.
- Content is hardcoded/static per product roadmap; no database is needed.
- The app uses Blade templates and vanilla JS for interactivity.
- **UI Requirement:** The suits Diamonds and Hearts must be explicitly styled in red.
- **UI Requirement:** Provide explicit walkthrough examples (showing HCP breakdown, distribution, reasoning, and final bid) before the interactive exercises section.
- **UI Requirement:** Interactive exercises must provide explicit color-coded feedback (green for correct, red for incorrect) on both the buttons and the feedback boxes, with full support for light and dark modes.
- **UI Requirement:** Provide a "Load More Exercises" feature that dynamically generates new hands client-side, heavily weighting towards opening bids (rather than just passes), so users can continue practicing infinitely.

## Context

- **Visuals:** None
- **References:** `LessonService.php` and `resources/views/landing.blade.php`
- **Product alignment:** Aligned with teaching Berry's 5-card major (Berry's Vijfkaart Hoog), with explanatory content, examples, and interactive hands-on exercises.

## Standards Applied

- `tdd-preferences` — Tests must be written FIRST before any production code and presented for user review.
