<?php

$input = file( __DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES )[0];


function find_unique_string_pos( $input, $size ) {
	$target = '';
	$length = strlen( $input );

	for( $i = 0; $i < $length - $size; $i++ ) {
		$sub = substr( $input, $i, $size );

		// Return string of unique characters and check its length
		if( strlen( count_chars( $sub, 3 ) ) === $size ) {
			$target = $i + $size;
			break;
		}
	}

	return $target;
}

// PART 1
echo 'Part 1: ' . find_unique_string_pos( $input, 4 ) . PHP_EOL;

// PART 2
echo 'Part 2: ' . find_unique_string_pos( $input, 14 ) . PHP_EOL;