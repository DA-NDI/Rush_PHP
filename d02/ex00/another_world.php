#!/usr/bin/php
<?php
if ($argc > 1 && is_string($argv[0]))
{
	$my_arr = trim($argv[1]);
	$my_arr = preg_replace('/\t+/', " ", $my_arr);
	$my_arr = preg_replace('/\ +/', " ", $my_arr);
	print_r("$my_arr\n");
}
?>