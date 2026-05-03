# Plan: Card and Suit Visual Enhancements

## Task 1: Save Spec Documentation
- **plan.md** (this file)
- **shape.md**
- **standards.md**

## Task 2: Create Suit/Card Blade Components
- Create `resources/views/components/suit.blade.php` to render colored suit symbols.
- Create `resources/views/components/card.blade.php` to render cards with colored suits.

## Task 3: Update Static HTML Content
- Update `opening-bid-level-1.blade.php` to use `<x-suit>` for suit mentions.

## Task 4: Update JavaScript Dynamic Content
- Update `renderCard` in `opening-bid-level-1.blade.php` for colored suits.
- Update `generateExplanation` and `renderExample` to use symbols and colors.
- Update bid buttons to use symbols.
