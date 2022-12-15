<?php

$input = file( __DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES );


// PART 1
$pwd   = [];
$drive = [];

// Parse directories
foreach ( $input as $line ) {

	if( $line === '$ ls' ) continue;

	if( $line === '$ cd /' ) {
		$pwd = [ '.' ];
		continue;
	}

	if( $line === '$ cd ..' ) {
		array_pop( $pwd );
		continue;
	}

	if( str_starts_with( $line, '$ cd ' ) ) {
		$pwd[] = str_replace( '$ cd ', '', $line );
		continue;
	}

	// File
	$cmd = explode( ' ', $line );
	if ( is_numeric( $cmd[0] ) ) {
		$dir = implode( '/', $pwd );

		$drive[ $dir ] ??= [
			'files' => [],
			'size'  => 0,
		];

		if ( ! in_array( $cmd[1], $drive[ $dir ]['files'] ) ) {
			$drive[ $dir ]['files'][] = $cmd[1];
			$drive[ $dir ]['size']    += (int) $cmd[0];
		}
	}
}

// Parse folder sizes to include children
foreach ( $drive as $name => $dir ) {
	foreach ( $drive as $name2 => $dir2 ) {
		if ( $name !== $name2 && strpos( $name2, $name ) === 0 ) {
			$drive[ $name ]['size'] += $drive[ $name2 ]['size'];
		}
	}
}

// Create missing directories
// If there is dir ./a/b/c and dir b only contains dir c
// it needs to be added to drive
foreach ( $drive as $name => $dir ) {
	$partial = explode( '/', $name );

	while( count( $partial ) > 1 ) {
		$prev = $drive[ implode( '/', $partial ) ]['size'];
		array_pop( $partial );

		$drive[ implode( '/', $partial ) ] ??= [
			'files' => [],
			'size'  => $prev,
		];
	}
}

// Calculate size of all dirs under 10K
$size = 0;
foreach ( $drive as $dir ) {
	if ( $dir['size'] <= 100000 ) {
		$size += $dir['size'];
	}
}
echo 'Part 1: ' . $size . PHP_EOL;


// PART 2
$limit = abs( 40000000 - $drive['.']['size'] );
$gap = PHP_INT_MAX;

// Check smallest directory that is bigger than limit we need to pass
foreach ( $drive as $dir ) {
	$diff = $dir[ 'size' ] - $limit;
	if( $diff > 0 && $diff < $gap ) {
		$gap = $diff;
		$target = $dir['size'];
	}
}

echo 'Part 2: ' . $target . PHP_EOL;