<?php

use Gitonomy\Git\Diff\File;
use Wikimedia\Onus\GitHistoryProcessor;

include( __DIR__ . '/../vendor/autoload.php' );

$dir = $argv[1];
$processor = new GitHistoryProcessor( $dir, [ 'T263592' ] );

$commits = $processor->listCommits();

foreach ( $commits as $cmtInfo ) {
	print 'commit ' . $cmtInfo['hash']. "\n";
	print 'Date: ' . $cmtInfo['date'] . "\n";
	print 'Subject: ' . $cmtInfo['subject'] . "\n";
	print 'Bugs: ' . implode( ', ', $cmtInfo['bugs'] ) . "\n";
	print "\n";
	foreach ( $cmtInfo['files'] as $file ) {
		print $file . "\n";
	}
	print "\n";
}