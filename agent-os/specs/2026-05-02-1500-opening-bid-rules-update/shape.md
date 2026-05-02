# Update Opening Bid Rules — Shaping Notes

## Scope

The current implementation of `OpeningBidEvaluator` doesn't fully capture all the opening bid rules correctly, specifically when dealing with hands that have multiple 5-card suits or multiple 4-card suits, or cases where a 4-card diamond and 5-card club suit are present.

New Rules:
- When a hand counts 2 5-cards (5+ of a suit), bid the highest ranking suit. Even if one is a 5-card and the other is a 6-card, bid the highest ranking.
- When a hand counts 2 or more 4-cards, bid the lowest (but remember 5-card major rules still apply, so this mainly affects minors).
- If a hand has 4 Diamonds and 5 Clubs (and no 5-card major), bid 1 Club.

## Decisions

- Implement these edge cases in `OpeningBidEvaluatorTest.php` first.
- Update `OpeningBidEvaluator.php` logic to check for longest suit or highest ranking suit when there are multiple 5+ card suits.
- Update logic to handle multiple 4-card minor suits (bid lowest).
- Ensure a hand with 4 Diamonds and 5 Clubs returns 1 Club.

## Context

- **Visuals:** None
- **References:** `app/Services/OpeningBidEvaluator.php` and `tests/Unit/OpeningBidEvaluatorTest.php`
- **Product alignment:** Correcting the rules of Berry's 5-card major logic.

## Standards Applied

- `tdd-preferences` — Tests must be updated before production code.