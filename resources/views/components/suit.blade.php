@props(['type', 'text' => false])

@php
    $symbols = [
        'S' => '&spades;',
        'H' => '&hearts;',
        'D' => '&diams;',
        'C' => '&clubs;',
    ];
    $names = [
        'S' => 'Spade',
        'H' => 'Heart',
        'D' => 'Diamond',
        'C' => 'Club',
    ];
    $colors = [
        'S' => 'suit-s',
        'H' => 'suit-h',
        'D' => 'suit-d',
        'C' => 'suit-c',
    ];
    $symbol = $symbols[$type] ?? $type;
    $color = $colors[$type] ?? '';
    $name = $names[$type] ?? '';
@endphp

@if($text)
    {{ $name }}
@else
    <span class="{{ $color }} font-bold">{!! $symbol !!}</span>
@endif
