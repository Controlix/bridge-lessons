<?php

namespace App\Services;

class OpeningBidEvaluator
{
    private const SUITS = ['S', 'H', 'D', 'C'];
    
    private const HCP_VALUES = [
        'A' => 4,
        'K' => 3,
        'Q' => 2,
        'J' => 1,
    ];

    public function evaluate(array $hand): string
    {
        $hcp = $this->calculateHcp($hand);
        $distribution = $this->calculateDistribution($hand);

        if ($hcp < 12) {
            return 'Pass';
        }

        if ($hcp >= 15 && $hcp <= 17 && $this->isBalanced($distribution)) {
            return '1SA';
        }

        // Check for 5+ card suits
        $fiveCardSuits = [];
        foreach (self::SUITS as $suit) {
            if ($distribution[$suit] >= 5) {
                $fiveCardSuits[] = $suit;
            }
        }

        if (count($fiveCardSuits) > 0) {
            // self::SUITS is ordered S, H, D, C (highest to lowest ranking).
            // Therefore, the first one found is automatically the highest ranking.
            return '1 ' . $this->suitName($fiveCardSuits[0]);
        }

        // At this point, there are no 5-card suits.
        // We cannot bid a major. We must bid a minor.
        
        if ($distribution['D'] >= 4 && $distribution['C'] >= 4) {
            // 2 or more 4-cards. Bid lowest.
            return '1 Club';
        }

        if ($distribution['D'] >= 4) {
            return '1 Diamond';
        }

        return '1 Club';
    }

    private function suitName(string $suitChar): string
    {
        return match ($suitChar) {
            'S' => 'Spade',
            'H' => 'Heart',
            'D' => 'Diamond',
            'C' => 'Club',
        };
    }

    private function calculateHcp(array $hand): int
    {
        $hcp = 0;
        foreach ($hand as $card) {
            $rank = $card[0];
            if (isset(self::HCP_VALUES[$rank])) {
                $hcp += self::HCP_VALUES[$rank];
            }
        }
        return $hcp;
    }

    private function calculateDistribution(array $hand): array
    {
        $dist = ['S' => 0, 'H' => 0, 'D' => 0, 'C' => 0];
        foreach ($hand as $card) {
            $suit = $card[1];
            if (isset($dist[$suit])) {
                $dist[$suit]++;
            }
        }
        return $dist;
    }

    private function isBalanced(array $distribution): bool
    {
        $counts = array_values($distribution);
        rsort($counts);

        $shape = implode('-', $counts);

        return in_array($shape, ['4-3-3-3', '4-4-3-2', '5-3-3-2']);
    }
}
