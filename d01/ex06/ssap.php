#!/usr/bin/php
<?php
if ($argc > 1)
{
	for ($i = 1; $i < $argc; $i++)
		$my_arr .= $argv[$i]." ";
	$sub_arr = trim($my_arr);
	while (strpos($sub_arr, "  ") !== false)
	{
		$sub_arr = str_replace("  ", " ", $sub_arr);
	}
	$ret_arr = explode(" ", $sub_arr);
	sort($ret_arr);

	foreach ($ret_arr as $elem)
	{
		echo "$elem\n";
	}
}
?>