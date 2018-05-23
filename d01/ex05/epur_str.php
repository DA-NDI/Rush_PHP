#!/usr/bin/php
<?php
if ($argc > 1 && is_string($argv[0]))
{
	$my_arr = trim($argv[1]);
	while (strpos($my_arr, "  ") !== false)
	{
		$my_arr = str_replace("  ", " ", $my_arr);
	}
	print_r($my_arr);
	echo "\n";
}
?>