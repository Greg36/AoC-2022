<?php

$input = file( __DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES );

function count_score( $letter ) {
	$val = ord( $letter );
	if ( $val < 97 ) {
		return $val - 38;
	}

	return $val - 96;
}

// PART 1
$score = 0;

foreach ( $input as $item ) {
	$items = str_split( $item );
	$items = array_chunk( $items, count( $items ) / 2 );
	$diff  = array_unique( array_intersect( $items[0], $items[1] ) );

	foreach ( $diff as $letter ) {
		$score += count_score( $letter );
	}
}

echo 'Part 1: ' . $score . PHP_EOL;


// PART 2
$score = 0;

$groups = array_chunk( $input, 3 );
foreach ( $groups as $group ) {
	$group = array_map( function ( $item ){
		return str_split( $item );
	}, $group );

	$diff = array_unique( array_intersect( ...$group ) );
	$score += count_score( array_pop( $diff ) );
}

echo 'Part 2: ' . $score . PHP_EOL;