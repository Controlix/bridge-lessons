<?php

namespace App\Services;

class LessonService
{
    public function getLessons(): array
    {
        return [
            [
                'title' => 'Opening bid on level 1',
                'description' => 'Learn the rules for opening the bidding with 12-19 HCP using Berry\'s 5-card major system.',
                'slug' => 'opening-bid-level-1',
            ],
            [
                'title' => 'Bidding Basics',
                'description' => 'Learn the fundamentals of bidding and how to open the auction.',
                'slug' => 'bidding-basics',
            ],
            [
                'title' => 'Card Play',
                'description' => 'Master the techniques of playing a hand of bridge.',
                'slug' => 'card-play',
            ],
            [
                'title' => 'Defense',
                'description' => 'Learn how to defend against the opponents.',
                'slug' => 'defense',
            ],
            [
                'title' => 'Declarer Play',
                'description' => 'Advanced techniques for the declarer.',
                'slug' => 'declarer-play',
            ],
            [
                'title' => 'Signals',
                'description' => 'Understand the conventions and signals in bridge.',
                'slug' => 'signals',
            ],
            [
                'title' => 'Slam Bidding',
                'description' => 'Learn to bid and make slams.',
                'slug' => 'slam-bidding',
            ],
        ];
    }

    public function getLessonBySlug(string $slug): ?array
    {
        $lessons = $this->getLessons();
        
        foreach ($lessons as $lesson) {
            if ($lesson['slug'] === $slug) {
                return $lesson;
            }
        }
        
        return null;
    }
}