<?php

$input = file( __DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES );

// PART 1
$elves = [];
$calories = 0;

foreach ( $input as $line ) {
	if( $line !== '' ) {
		$calories += (int) $line;
	} else {
		$elves[] = $calories;
		$calories = 0;
	}
}
$elves[] = $calories;

echo 'Part 1: ' . max( $elves ) . PHP_EOL;


// PART 2
rsort( $elves );
$sum = array_sum( array_splice( $elves, 0, 3 ) );

echo 'Part 2: ' . $sum . PHP_EOL;