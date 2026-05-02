<?php

use App\Services\OpeningBidEvaluator;

// Helper to quickly generate a hand from a string of space-separated cards
function makeHand(string $cards): array {
    return explode(' ', $cards);
}

it('recommends Pass for hands with less than 12 HCP', function () {
    $evaluator = new OpeningBidEvaluator();
    
    // 11 HCP: AS(4) KS(3) AH(4) = 11 HCP, 4-3-3-3
    $hand = makeHand('AS KS 3S 4S AH 2H 3H 4D 5D 6D 2C 3C 4C');
    expect($evaluator->evaluate($hand))->toBe('Pass');

    // 0 HCP
    $hand = makeHand('2S 3S 4S 5S 2H 3H 4H 2D 3D 4D 2C 3C 4C');
    expect($evaluator->evaluate($hand))->toBe('Pass');
});

it('recommends 1SA for balanced hands with 15-17 HCP', function (string $cards) {
    $evaluator = new OpeningBidEvaluator();
    $hand = makeHand($cards);
    expect($evaluator->evaluate($hand))->toBe('1SA');
})->with([
    // 15 HCP, 4-3-3-3: AS(4) AH(4) AD(4) KC(3)
    ['AS 2S 3S 4S AH 2H 3H AD 2D 3D KC 2C 3C'],
    // 16 HCP, 4-3-3-3: AS(4) KS(3) AH(4) KD(3) QD(2) -> wait, KD+QD is 5. 4+3+4+5 = 16. Spades:2, Hearts:3, Diamonds:4, Clubs:4 -> 4-4-3-2
    ['AS KS AH 2H 3H KD QD 2D 3D 2C 3C 4C 5C'], 
    // 17 HCP, 5-3-3-2: AS(4) KS(3) QS(2) AH(4) KH(3) JC(1) = 17 HCP. Spades:5, Hearts:3, Diamonds:3, Clubs:2
    ['AS KS QS 2S 3S AH KH 2H 2D 3D 4D JC 2C'],
]);

it('recommends 1 Spade for hands with 5+ spades (not 15-17 balanced)', function () {
    $evaluator = new OpeningBidEvaluator();
    
    // 12 HCP, 5 Spades, 3 Hearts, 3 Diamonds, 2 Clubs. AS(4) AH(4) AD(4) = 12 HCP
    $hand1 = makeHand('AS 2S 3S 4S 5S AH 2H 3H AD 2D 3D 2C 3C');
    expect($evaluator->evaluate($hand1))->toBe('1 Spade');

    // 18 HCP, 5 Spades, 5-3-3-2. AS(4) KS(3) QS(2) JS(1) AH(4) AD(4) = 18 HCP
    $hand2 = makeHand('AS KS QS JS 2S AH 2H 3H AD 2D 3D 2C 3C');
    expect($evaluator->evaluate($hand2))->toBe('1 Spade');
});

it('recommends 1 Heart for hands with 5+ hearts (not 15-17 balanced and <5 spades)', function () {
    $evaluator = new OpeningBidEvaluator();
    
    // 12 HCP, 3 Spades, 5 Hearts, 3 Diamonds, 2 Clubs. AS(4) AH(4) AD(4) = 12
    $hand1 = makeHand('AS 2S 3S AH 2H 3H 4H 5H AD 2D 3D 2C 3C');
    expect($evaluator->evaluate($hand1))->toBe('1 Heart');

    // 18 HCP, 6 Hearts, 2 Spades, 3 Diamonds, 2 Clubs. AH(4) KH(3) QH(2) JH(1) AD(4) KD(3) JC(1) = 18
    $hand2 = makeHand('2S 3S AH KH QH JH 2H 3H AD KD 2D JC 2C');
    expect($evaluator->evaluate($hand2))->toBe('1 Heart');
});

it('recommends 1 Diamond for hands with 4+ diamonds (when no 5-card major or 1SA applies)', function () {
    $evaluator = new OpeningBidEvaluator();
    
    // 12 HCP, 3 Spades, 3 Hearts, 4 Diamonds, 3 Clubs. AS(4) AH(4) AD(4) = 12
    $hand1 = makeHand('AS 2S 3S AH 2H 3H AD 2D 3D 4D 2C 3C 4C');
    expect($evaluator->evaluate($hand1))->toBe('1 Diamond');

    // 14 HCP, 4 Spades, 2 Hearts, 5 Diamonds, 2 Clubs. AS(4) AH(4) AD(4) QD(2) = 14
    $hand2 = makeHand('AS 2S 3S 4S AH 2H AD QD 2D 3D 4D 2C 3C');
    expect($evaluator->evaluate($hand2))->toBe('1 Diamond');
});

it('recommends 1 Club for all other hands', function () {
    $evaluator = new OpeningBidEvaluator();
    
    // 12 HCP, 3 Spades, 3 Hearts, 3 Diamonds, 4 Clubs. AS(4) AH(4) AC(4) = 12
    $hand1 = makeHand('AS 2S 3S AH 2H 3H 2D 3D 4D AC 2C 3C 4C');
    expect($evaluator->evaluate($hand1))->toBe('1 Club');

    // 14 HCP, 4 Spades, 4 Hearts, 3 Diamonds, 2 Clubs. AS(4) AH(4) AD(4) QC(2) = 14
    $hand2 = makeHand('AS 2S 3S 4S AH 2H 3H 4H AD 2D 3D QC 2C');
    expect($evaluator->evaluate($hand2))->toBe('1 Club');
});
