<?php

$input = file( __DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES );

// PART 1
$score = 0;

$points = [
	'X' => 1,
	'Y' => 2,
	'Z' => 3,
	'A' => 1,
	'B' => 2,
	'C' => 3,
];

foreach ( $input as $game ) {
	[ $him, $me ] = explode( ' ', $game );

	// Tie
	if ( $points[ $him ] === $points[ $me ] ) {
		$score += 3;
	}

	// Win
	if ( ( $me === 'X' && $him === 'C' ) || ( $me === 'Y' && $him === 'A' ) || ( $me === 'Z' && $him === 'B' ) ) {
		$score += 6;
	}

	// Move score
	$score += $points[ $me ];
}

echo 'Part 1: ' . $score . PHP_EOL;


// PART 2
$score = 0;
$beats = [ 'A' => 3, 'B' => 1, 'C' => 2 ];
$wins  = [ 'A' => 2, 'B' => 3, 'C' => 1 ];

foreach ( $input as $game ) {
	[ $him, $me ] = explode( ' ', $game );

	switch ( $me ) {
		case 'Y' :
			$score += $points[ $him ] + 3;
			break;
		case 'X':
			$score += $beats[ $him ];
			break;
		case 'Z':
			$score += $wins[ $him ] + 6;
			break;
	}
}

echo 'Part 2: ' . $score . PHP_EOL;