<?php

$input = file( __DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES );

// Grid ix [y][x]
$grid = [];
foreach ( $input as $item ) {
	$grid[] = array_map( function ( $cell ) {
		return [ (int) $cell, 0, 1 ];
	}, str_split( $item ) );
}

// PART 1
for( $i = 0; $i < 4; $i++ ) {
	for( $y = 1; $y < count( $grid ) - 1; $y++ ) {
		$top = $grid[$y][0][0];
		for( $x = 1; $x < count( $grid[$y] ) - 1; $x++ ) {
			$current = $grid[$y][$x][0];
			$view = 0;

			// Part 1: For each tree in row increase second param if it was hidden
			if( $current <= $top ) {
				$grid[$y][$x][1]++;
			} else {
				$top = $current;
			}

			// Part 2: Count visibility of trees remaining in line of sight
			// in this direction, break if tree is higher or equal in height
			$rest = array_slice( $grid[$y], $x + 1 );
			foreach ( $rest as $tree ) {
				$view++;
				if( $current <= $tree[0] ) break;
			}

			// Count the view with the current view
			$grid[$y][$x][2] = $grid[$y][$x][2] * $view;
		}
	}

	// For each element of array return it to new array
	// this will actually "rotate" the matrix by 90 deg
	$grid = array_map( null, ...$grid );
	$grid = array_map('array_reverse', $grid );
}

// Count visible trees
$cells = array_merge(...$grid);
$trees = 0;
foreach ( $cells as $cell ) {
	if( $cell[1] !== 4 ) $trees++;
}

echo 'Part 1: ' . $trees . PHP_EOL;


// PART 2
$view = [0,0,0];
foreach ( $cells as $cell ) {
	if( $cell[2] > $view[2] ) $view = $cell;
}

echo 'Part 2: ' . $view[2] . PHP_EOL;