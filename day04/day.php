<?php

$input = file( __DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES );

function parse_pair( $item ) {
	$pair = explode( ',', $item );

	return array_map( function ( $item ) {
		return explode( '-', $item );
	}, $pair );
}

// PART 1
$score = 0;

// Check each pair that contains one another fully in the range
foreach ( $input as $item ) {
	$pair = parse_pair( $item );

	if ( $pair[0][0] <= $pair[1][0] && $pair[0][1] >= $pair[1][1] ) {
		$score ++;
		continue;
	}
	if ( $pair[0][0] >= $pair[1][0] && $pair[0][1] <= $pair[1][1] ) {
		$score ++;
	}
}

echo 'Part 1: ' . $score . PHP_EOL;


// PART 2
$score = count( $input );

// Subtract pairs that do not overlap at all from total number of pairs
foreach ( $input as $item ) {
	$pair = parse_pair( $item );

	if ( $pair[0][1] < $pair[1][0] || $pair[0][0] > $pair[1][1] ) {
		$score --;
	}
}

echo 'Part 2: ' . $score . PHP_EOL;