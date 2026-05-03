<x-layout title="{{ $lesson['title'] }} - Bridge Lessons">
    <div class="mb-8">
        <a href="/" class="text-sm text-[#f53003] dark:text-[#FF4433] hover:underline mb-4 inline-block">&larr; Back to Lessons</a>
        <h1 class="text-3xl font-medium mb-3 text-[#1b1b18] dark:text-[#EDEDEC]">{{ $lesson['title'] }}</h1>
        <p class="text-[#706f6c] dark:text-[#A1A09A] text-lg">{{ $lesson['description'] }}</p>
    </div>

    <div class="prose dark:prose-invert max-w-none text-[#1b1b18] dark:text-[#EDEDEC]">
        <h2 class="text-xl font-medium mt-8 mb-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-2">The Basics of Bidding</h2>
        <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">
            To open the bidding, you first need to evaluate your hand. We do this by calculating <strong>High Card Points (HCP)</strong>:
        </p>
        <ul class="list-disc pl-5 mb-6 text-[#706f6c] dark:text-[#A1A09A] space-y-1">
            <li>Ace (A) = 4 points</li>
            <li>King (K) = 3 points</li>
            <li>Queen (Q) = 2 points</li>
            <li>Jack (J) = 1 point</li>
        </ul>

        <h2 class="text-xl font-medium mt-8 mb-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-2">Opening Rules (Berry's 5-Card Major)</h2>
        <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">
            If you have between <strong>12 and 19 HCP</strong>, you can open the bidding on the 1-level. Here are the rules in order of priority:
        </p>
        <ol class="list-decimal pl-5 mb-8 text-[#706f6c] dark:text-[#A1A09A] space-y-3">
            <li><strong>Pass:</strong> If you have less than 12 HCP.</li>
            <li><strong>1SA (1 No Trump):</strong> If you have 15-17 HCP <em>and</em> a balanced hand. A balanced hand means your card distribution is 4-3-3-3, 4-4-3-2, or 5-3-3-2.</li>
            <li><strong>5+ Card Suits:</strong> If you have one or more suits with 5+ cards, bid your <strong>highest ranking</strong> 5+ card suit. (<x-suit type="S"/> &gt; <x-suit type="H"/> &gt; <x-suit type="D"/> &gt; <x-suit type="C"/>)</li>
            <li><strong>Multiple 4-Card Minors:</strong> If you do not have a 5-card major, and you have both 4 <x-suit type="D"/> and 4 <x-suit type="C"/>, bid the <strong>lowest ranking</strong> suit: 1 <x-suit type="C"/>.</li>
            <li><strong>1 <x-suit type="D"/>:</strong> If you do not have a 5-card major, but you have exactly 4 <x-suit type="D"/> (and less than 4 <x-suit type="C"/>).</li>
            <li><strong>1 <x-suit type="C"/>:</strong> If none of the above apply.</li>
        </ol>

        <h2 class="text-xl font-medium mt-8 mb-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-2">Examples</h2>
        <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">
            Let's walk through a few examples to see how the evaluation works in practice.
        </p>
        <div id="examples" class="space-y-6 mt-6 mb-12">
            <!-- Examples will be injected here by JavaScript -->
        </div>

        <h2 class="text-xl font-medium mt-8 mb-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-2">Interactive Exercises</h2>
        <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">
            Practice what you've learned! Evaluate the following hands and select the correct opening bid.
        </p>

        <div id="exercises" class="space-y-8 mt-6">
            <!-- Exercises will be injected here by JavaScript -->
        </div>

        <div class="mt-8 text-center pb-8">
            <button onclick="loadMoreExercises()" class="px-6 py-3 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] text-[#1b1b18] dark:text-[#EDEDEC] rounded-full shadow-sm hover:shadow-md transition-shadow font-medium">
                Load More Exercises
            </button>
        </div>
    </div>

    @push('scripts')
        <style>
            .btn-correct {
                background-color: #dcfce7 !important;
                border-color: #22c55e !important;
                color: #166534 !important;
            }
            .btn-incorrect {
                background-color: #fee2e2 !important;
                border-color: #ef4444 !important;
                color: #991b1b !important;
            }
            .feedback-correct {
                background-color: #f0fdf4 !important;
                color: #166534 !important;
                border-color: #bbf7d0 !important;
            }
            .feedback-incorrect {
                background-color: #fef2f2 !important;
                color: #991b1b !important;
                border-color: #fecaca !important;
            }

            @media (prefers-color-scheme: dark) {
                .btn-correct {
                    background-color: rgba(20, 83, 45, 0.5) !important;
                    border-color: #22c55e !important;
                    color: #bbf7d0 !important;
                }
                .btn-incorrect {
                    background-color: rgba(127, 29, 29, 0.5) !important;
                    border-color: #ef4444 !important;
                    color: #fecaca !important;
                }
                .feedback-correct {
                    background-color: rgba(20, 83, 45, 0.3) !important;
                    color: #bbf7d0 !important;
                    border-color: #14532d !important;
                }
                .feedback-incorrect {
                    background-color: rgba(127, 29, 29, 0.3) !important;
                    color: #fecaca !important;
                    border-color: #7f1d1d !important;
                }
            }
        </style>
        <script>
            // The OpeningBidEvaluator logic re-implemented in JS for the frontend
            const HCP_VALUES = { 'A': 4, 'K': 3, 'Q': 2, 'J': 1 };
            const suitOrder = { 'S': 4, 'H': 3, 'D': 2, 'C': 1 };
            const rankOrder = { 'A': 14, 'K': 13, 'Q': 12, 'J': 11, '10': 10, '9': 9, '8': 8, '7': 7, '6': 6, '5': 5, '4': 4, '3': 3, '2': 2 };

            function sortHand(hand) {
                return hand.slice().sort((a, b) => {
                    const suitA = a[a.length - 1];
                    const suitB = b[b.length - 1];
                    if (suitOrder[suitA] !== suitOrder[suitB]) {
                        return suitOrder[suitB] - suitOrder[suitA];
                    }
                    const rankA = a.substring(0, a.length - 1);
                    const rankB = b.substring(0, b.length - 1);
                    return rankOrder[rankB] - rankOrder[rankA];
                });
            }
            
            function calculateHcp(hand) {
                return hand.reduce((total, card) => {
                    const rank = card[0];
                    return total + (HCP_VALUES[rank] || 0);
                }, 0);
            }

            function calculateDistribution(hand) {
                const dist = { 'S': 0, 'H': 0, 'D': 0, 'C': 0 };
                hand.forEach(card => {
                    const suit = card[card.length - 1]; // Support 10S/TS
                    if (dist[suit] !== undefined) {
                        dist[suit]++;
                    }
                });
                return dist;
            }

            function isBalanced(dist) {
                const counts = Object.values(dist).sort((a, b) => b - a);
                const shape = counts.join('-');
                return ['4-3-3-3', '4-4-3-2', '5-3-3-2'].includes(shape);
            }

            function evaluateBid(hand) {
                const hcp = calculateHcp(hand);
                const dist = calculateDistribution(hand);

                if (hcp < 12) return 'Pass';
                if (hcp >= 15 && hcp <= 17 && isBalanced(dist)) return '1SA';
                
                // Check for 5+ card suits
                const suits = ['S', 'H', 'D', 'C'];
                const fiveCardSuits = [];
                for (const suit of suits) {
                    if (dist[suit] >= 5) {
                        fiveCardSuits.push(suit);
                    }
                }

                if (fiveCardSuits.length > 0) {
                    const suitMap = { 'S': 'Spade', 'H': 'Heart', 'D': 'Diamond', 'C': 'Club' };
                    // suits are ordered highest to lowest ranking, so first is highest
                    return '1 ' + suitMap[fiveCardSuits[0]];
                }

                if (dist['D'] >= 4 && dist['C'] >= 4) return '1 Club';
                if (dist['D'] >= 4) return '1 Diamond';
                return '1 Club';
            }

            const suitSymbols = { 'S': '&spades;', 'H': '&hearts;', 'D': '&diams;', 'C': '&clubs;' };
            const suitColors = { 
                'S': 'suit-s', 
                'H': 'suit-h', 
                'D': 'suit-d', 
                'C': 'suit-c' 
            };

            function renderCard(cardString) {
                const rank = cardString.substring(0, cardString.length - 1);
                const suit = cardString[cardString.length - 1];
                return `<span class="inline-flex items-center px-2 py-1 bg-white dark:bg-[#2a2a28] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded shadow-sm text-lg font-medium mr-1 gap-0.5"><span class="text-[#1b1b18] dark:text-[#EDEDEC]">${rank}</span><span class="${suitColors[suit]}">${suitSymbols[suit]}</span></span>`;
            }

            function renderSuit(suit) {
                return `<span class="${suitColors[suit]} font-bold">${suitSymbols[suit]}</span>`;
            }

            function renderBid(bid) {
                if (bid === 'Pass' || bid === '1SA') return bid;
                const parts = bid.split(' ');
                if (parts.length === 2) {
                    const suitMap = { 'Spade': 'S', 'Heart': 'H', 'Diamond': 'D', 'Club': 'C' };
                    const suit = suitMap[parts[1]] || parts[1][0]; // Handle "1 Spade" or "1 S"
                    return `${parts[0]} ${renderSuit(suit)}`;
                }
                return bid;
            }

            // Examples Data
            const examplesData = [
                {
                    title: "Example 1: Not enough points",
                    hand: ['AS', '3S', '2S', 'KH', '5H', '4H', 'QD', '9D', '8D', 'JC', '7C', '6C', '5C'],
                    hcp: "4 (♠) + 3 (♥) + 2 (♦) + 1 (♣) = 10",
                    distribution: `3 ${renderSuit('S')}, 3 ${renderSuit('H')}, 3 ${renderSuit('D')}, 4 ${renderSuit('C')}`,
                    reasoning: "We only have 10 High Card Points. Since we need at least 12 HCP to open the bidding, we must Pass.",
                    bid: "Pass"
                },
                {
                    title: "Example 2: Balanced hand with 15-17 HCP",
                    hand: ['AS', 'KS', '3S', 'QH', 'JH', '4H', 'AD', '5D', '2D', 'KC', '8C', '7C', '6C'],
                    hcp: "7 (♠) + 3 (♥) + 4 (♦) + 3 (♣) = 17",
                    distribution: `3 ${renderSuit('S')}, 3 ${renderSuit('H')}, 3 ${renderSuit('D')}, 4 ${renderSuit('C')} (4-3-3-3 balanced)`,
                    reasoning: "We have exactly 17 HCP and a balanced distribution (4-3-3-3). The first rule that applies is the 1SA rule.",
                    bid: "1SA"
                },
                {
                    title: "Example 3: 5-Card Major",
                    hand: ['KS', '4S', 'AH', 'QH', '8H', '5H', '3H', 'KD', '4D', '2D', '9C', '3C', '2C'],
                    hcp: "3 (♠) + 6 (♥) + 3 (♦) + 0 (♣) = 12",
                    distribution: `2 ${renderSuit('S')}, 5 ${renderSuit('H')}, 3 ${renderSuit('D')}, 3 ${renderSuit('C')}`,
                    reasoning: `We have 12 HCP, which is enough to open. We do not have 15-17 HCP balanced. The next rule is to check for a 5-card major. We have 5 ${renderSuit('H')}, so we bid 1 ${renderSuit('H')}.`,
                    bid: "1 Heart"
                }
            ];

            // Exercise Data
            const exercises = [
                {
                    id: 1,
                    hand: ['AS', 'KS', '3S', '4S', 'AH', '2H', '3H', '4D', '5D', '6D', '2C', '3C', '4C'],
                    explanation: `This hand has 11 HCP (${renderSuit('S')}: 4+3=7, ${renderSuit('H')}: 4). Since it's less than 12 HCP, you must Pass.`
                },
                {
                    id: 2,
                    hand: ['AS', 'KS', 'QS', '2S', '3S', 'AH', 'KH', '2H', '2D', '3D', '4D', 'JC', '2C'],
                    explanation: `This hand has 17 HCP and a 5-3-3-2 distribution (balanced). Even though there are 5 ${renderSuit('S')}, the 1SA rule (15-17 balanced) takes precedence.`
                },
                {
                    id: 3,
                    hand: ['AS', '2S', '3S', '4S', '5S', 'AH', '2H', '3H', 'AD', '2D', '3D', '2C', '3C'],
                    explanation: `This hand has 12 HCP and 5 ${renderSuit('S')}. It's not 15-17 balanced, so you open 1 ${renderSuit('S')}.`
                },
                {
                    id: 4,
                    hand: ['AS', '2S', '3S', 'AH', '2H', '3H', '4H', '5H', 'AD', '2D', '3D', '2C', '3C'],
                    explanation: `This hand has 12 HCP, 3 ${renderSuit('S')}, and 5 ${renderSuit('H')}. You open 1 ${renderSuit('H')}.`
                },
                {
                    id: 5,
                    hand: ['AS', '2S', '3S', 'AH', '2H', '3H', 'AD', '2D', '3D', '4D', '2C', '3C', '4C'],
                    explanation: `This hand has 12 HCP. No 5-card major, but you have 4 ${renderSuit('D')}. Open 1 ${renderSuit('D')}.`
                },
                {
                    id: 6,
                    hand: ['AS', '2S', '3S', '4S', 'AH', '2H', '3H', '4H', 'AD', '2D', '3D', 'QC', '2C'],
                    explanation: `This hand has 14 HCP. No 5-card major, and only 3 ${renderSuit('D')}. Open 1 ${renderSuit('C')}.`
                }
            ];

            function renderExample(example) {
                const sortedHand = sortHand(example.hand);
                let cardsHtml = sortedHand.map(renderCard).join('');
                return `
                    <div class="bg-[#f8f9fa] dark:bg-[#111110] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] p-6">
                        <h3 class="font-medium mb-4">${example.title}</h3>
                        <div class="mb-4 flex flex-wrap gap-1">
                            ${cardsHtml}
                        </div>
                        <ul class="text-sm text-[#706f6c] dark:text-[#A1A09A] space-y-2 mb-5">
                            <li><strong class="text-[#1b1b18] dark:text-[#EDEDEC]">HCP:</strong> ${example.hcp}</li>
                            <li><strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Distribution:</strong> ${example.distribution}</li>
                            <li><strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Reasoning:</strong> ${example.reasoning}</li>
                        </ul>
                        <div class="text-sm font-medium flex items-center gap-2">
                            <span class="text-[#1b1b18] dark:text-[#EDEDEC]">Correct Bid:</span> 
                            <span class="px-3 py-1 bg-[#dcfce7] text-[#166534] border border-[#bbf7d0] dark:bg-green-900/30 dark:text-[#bbf7d0] dark:border-[#14532d] rounded">${renderBid(example.bid)}</span>
                        </div>
                    </div>
                `;
            }

            function renderExercise(exercise, index) {
                const correctBid = evaluateBid(exercise.hand);
                const options = ['Pass', '1SA', '1 Spade', '1 Heart', '1 Diamond', '1 Club'];
                
                const sortedHand = sortHand(exercise.hand);
                let cardsHtml = sortedHand.map(renderCard).join('');
                
                let optionsHtml = options.map(opt => `
                    <button onclick="checkAnswer(${exercise.id}, '${opt}', '${correctBid}')" 
                            id="btn-${exercise.id}-${opt.replace(' ', '-')}"
                            class="px-4 py-2 bg-[#f5f5f5] dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded hover:bg-[#ebebeb] dark:hover:bg-[#2a2a28] transition-colors text-sm font-medium">
                        ${renderBid(opt)}
                    </button>
                `).join('');

                return `
                    <div class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 mb-6">
                        <h3 class="font-medium mb-4">Exercise ${index + 1}</h3>
                        <div class="mb-6 flex flex-wrap gap-1">
                            ${cardsHtml}
                        </div>
                        <p class="mb-3 text-sm text-[#706f6c] dark:text-[#A1A09A]">What is your opening bid?</p>
                        <div class="flex flex-wrap gap-3 mb-4" id="options-${exercise.id}">
                            ${optionsHtml}
                        </div>
                        <div id="feedback-${exercise.id}" class="hidden p-4 rounded-md mt-4 text-sm border">
                            <!-- Feedback injected here -->
                        </div>
                    </div>
                `;
            }

            window.checkAnswer = function(exerciseId, selectedBid, correctBid) {
                const feedbackEl = document.getElementById(`feedback-${exerciseId}`);
                const exercise = exercises.find(e => e.id === exerciseId);
                
                // Reset buttons
                const optionsContainer = document.getElementById(`options-${exerciseId}`);
                const buttons = optionsContainer.querySelectorAll('button');
                buttons.forEach(btn => {
                    btn.classList.remove('btn-correct', 'btn-incorrect');
                });

                const selectedBtn = document.getElementById(`btn-${exerciseId}-${selectedBid.replace(' ', '-')}`);
                const correctBtn = document.getElementById(`btn-${exerciseId}-${correctBid.replace(' ', '-')}`);

                if (selectedBid === correctBid) {
                    selectedBtn.classList.add('btn-correct');
                    feedbackEl.className = "p-4 rounded-md mt-4 text-sm border feedback-correct";
                    feedbackEl.innerHTML = `<strong>Correct!</strong> ${exercise.explanation}`;
                } else {
                    selectedBtn.classList.add('btn-incorrect');
                    correctBtn.classList.add('btn-correct');
                    feedbackEl.className = "p-4 rounded-md mt-4 text-sm border feedback-incorrect";
                    feedbackEl.innerHTML = `<strong>Incorrect.</strong> The correct bid is <strong>${renderBid(correctBid)}</strong>. <br><br>${exercise.explanation}`;
                }
                
                feedbackEl.classList.remove('hidden');
            };

            // Dynamic Exercise Generator
            function generateRandomHand() {
                const deck = [];
                const ranks = ['A', 'K', 'Q', 'J', '10', '9', '8', '7', '6', '5', '4', '3', '2'];
                const suits = ['S', 'H', 'D', 'C'];
                for (const suit of suits) {
                    for (const rank of ranks) {
                        deck.push(rank + suit);
                    }
                }
                // Shuffle
                for (let i = deck.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [deck[i], deck[j]] = [deck[j], deck[i]];
                }
                return deck.slice(0, 13);
            }

            function generateExplanation(hand) {
                const hcp = calculateHcp(hand);
                const dist = calculateDistribution(hand);
                
                let explanation = `This hand has ${hcp} HCP and a distribution of ${dist['S']} ${renderSuit('S')}, ${dist['H']} ${renderSuit('H')}, ${dist['D']} ${renderSuit('D')}, and ${dist['C']} ${renderSuit('C')}. `;
                
                if (hcp < 12) {
                    explanation += "With less than 12 HCP, you must Pass.";
                } else if (hcp >= 15 && hcp <= 17 && isBalanced(dist)) {
                    explanation += "With 15-17 HCP and a balanced hand, the 1SA rule takes precedence.";
                } else {
                    const suits = ['S', 'H', 'D', 'C'];
                    const fiveCardSuits = [];
                    for (const suit of suits) {
                        if (dist[suit] >= 5) {
                            fiveCardSuits.push(suit);
                        }
                    }

                    if (fiveCardSuits.length > 0) {
                        if (fiveCardSuits.length > 1) {
                            explanation += `When you have multiple 5+ card suits, you open the highest ranking suit (${renderSuit(fiveCardSuits[0])}).`;
                        } else {
                            explanation += `With 12+ HCP, not 15-17 balanced, and a 5+ card suit, you open that suit (${renderSuit(fiveCardSuits[0])}).`;
                        }
                    } else if (dist['D'] >= 4 && dist['C'] >= 4) {
                        explanation += `With 12+ HCP, no 5-card major, and multiple 4-card minor suits, you open the lowest ranking suit (1 ${renderSuit('C')}).`;
                    } else if (dist['D'] >= 4) {
                        explanation += `With 12+ HCP, no 5-card major, and 4+ Diamonds, you open 1 ${renderSuit('D')}.`;
                    } else {
                        explanation += `With 12+ HCP, no 5-card major, and less than 4 Diamonds, you open 1 ${renderSuit('C')}.`;
                    }
                }
                
                return explanation;
            }

            let exerciseCounter = exercises.length;

            window.loadMoreExercises = function() {
                const container = document.getElementById('exercises');
                
                for (let i = 0; i < 3; i++) {
                    exerciseCounter++;
                    let hand;
                    let bid;
                    
                    // Most of the time (80%), generate a hand that actually has a bid (>= 12 HCP) 
                    // so the user can practice different bids, not just passing.
                    const wantOpening = Math.random() < 0.8;
                    
                    while (true) {
                        hand = generateRandomHand();
                        bid = evaluateBid(hand);
                        if (wantOpening && bid !== 'Pass') break;
                        if (!wantOpening && bid === 'Pass') break;
                    }
                    
                    const newExercise = {
                        id: exerciseCounter,
                        hand: hand,
                        explanation: generateExplanation(hand)
                    };
                    
                    exercises.push(newExercise);
                    
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = renderExercise(newExercise, exerciseCounter - 1);
                    container.appendChild(tempDiv.firstElementChild);
                }
            };

            document.addEventListener('DOMContentLoaded', () => {
                const examplesContainer = document.getElementById('examples');
                if (examplesContainer) {
                    examplesContainer.innerHTML = examplesData.map(ex => renderExample(ex)).join('');
                }

                const exercisesContainer = document.getElementById('exercises');
                if (exercisesContainer) {
                    exercisesContainer.innerHTML = exercises.map((ex, index) => renderExercise(ex, index)).join('');
                }
            });
        </script>
    @endpush
</x-layout>