#!/usr/bin/php
<?php
if ($argv[1])
{
	if (($stdin = fopen($argv[1], 'r')) == FALSE)
	{
		print("Not a file or failed to open\n");
		exit ;
	}

	function upper_callback($str)
	{
		$str[2] = strtoupper($str[2]);
		return ($str[1] . $str[2] . $str[3]);
	}
	$page = file_get_contents($argv[1]);
	$part = explode('<a ', $page);
	$count = count($part);
	for ($i = 1; $i < $count; $i++) {
		$part[$i] = preg_replace_callback('/([tT][iI][tT][Ll][eE][\s]*=[\s]*\")((?s).*?)(\")/', upper_callback, $part[$i]);
		$part[$i] = preg_replace_callback('/(>)(.*?)(<)/', upper_callback, $part[$i]);
	}
	$page = implode('<a ', $part);
	print_r("$page\n");

	if (@fclose($stdin) == FALSE)
	{
		print("Failed to close the file\n");
		exit ;
	}
}
?>