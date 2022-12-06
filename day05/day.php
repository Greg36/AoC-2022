<?php

$input = file( __DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES );

$pos = [
	'1' => 'SMRNWJVT',
	'2' => 'BWDJQPCV',
	'3' => 'BJFHDRP',
	'4' => 'FRPBMND',
	'5' => 'HVRPTB',
	'6' => 'CBPT',
	'7' => 'BJRPL',
	'8' => 'NCSLTZBW',
	'9' => 'LSG',
];

foreach ( $pos as $key => $stack ) {
	$pos[ $key ] = str_split( $stack );
}
$pos2 = $pos1 = $pos;
$top1 = $top2 = '';

// PART 1
foreach ( $input as $inst ) {
	[ , $count, , $from, , $to ] = explode( ' ', $inst );

	// Cut boxes to move and reverse then merge to destination
	$move        = array_reverse( array_splice( $pos1[ $from ], - 1 * $count ) );
	$pos1[ $to ] = array_merge( $pos1[ $to ], $move );

	// For second part do not reverse the spliced part
	$move        = array_splice( $pos2[ $from ], - 1 * $count );
	$pos2[ $to ] = array_merge( $pos2[ $to ], $move );
}



// Get letters from top of each stack
foreach ( $pos1 as $stack ) $top1 .= end( $stack );
echo 'Part 1: ' . $top1 . PHP_EOL;

// PART 2
foreach ( $pos2 as $stack ) $top2 .= end( $stack );
echo 'Part 2: ' . $top2 . PHP_EOL;