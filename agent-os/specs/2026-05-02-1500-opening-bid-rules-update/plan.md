## Task 1: Save Spec Documentation
Create `agent-os/specs/2026-05-02-1500-opening-bid-rules-update/` with plan.md, shape.md, standards.md, and references.md.

## Task 2: Update Unit Tests
Modify `tests/Unit/OpeningBidEvaluatorTest.php` for the new edge cases:
- Hand with two 5+ card suits -> expects highest ranking
- Hand with two 4-card minors (D=4, C=4) -> expects 1 Club
- Hand with 4 Diamonds and 5 Clubs -> expects 1 Club

## Task 3: Implement Rule Update
Modify `app/Services/OpeningBidEvaluator.php` to enforce the new prioritization logic.

## Task 4: Verification
Run `vendor/bin/pest` to verify all tests pass.