# Plan: Opening Bid on Level 1

## Task 1: Save Spec Documentation
- Create `agent-os/specs/2026-05-02-1235-opening-bid-level-1/` with plan, shape, standards, and references.

## Task 2: Write tests for bid evaluation logic (TDD)
- Create Pest tests for `OpeningBidEvaluator` to verify bids based on HCP and distribution rules (Berry's 5-card major).

## Task 3: Implement bid evaluation logic
- Build `OpeningBidEvaluator` in PHP to pass the tests from Task 2.

## Task 4: Add lesson data & routing
- Register the new "Opening bid on level 1" lesson in `LessonService`.
- Set up a route to display the lesson view.

## Task 5: Create the lesson view (UI)
- Create the blade template with the explanatory content teaching the 12-19 HCP rules.
- Include a section containing detailed walkthrough examples that break down HCP, distribution, and the reasoning behind the bid.

## Task 6: Implement interactive exercises
- Add hands-on exercises to the lesson view, allowing the user to select the correct bid for various hands and get feedback using the logic built in Task 3.
- Ensure Diamonds and Hearts are visually styled in red.
- Implement explicit color feedback (green/red) for user answers and feedback messages, ensuring compatibility with light/dark modes.

## Task 7: Endless practice mode
- Add a "Load More Exercises" button.
- Create a client-side JavaScript card generator.
- Dynamically generate new hands with explanations, filtering mostly for opening bids so the user gets varied practice.
