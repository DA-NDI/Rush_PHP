#!/usr/bin/php
<?php
if ($argc < 3)
	return FALSE;
$my_key = $argv[1];
$argv = array_slice($argv, 2);
$argv = array_reverse($argv);
foreach ($argv as $element)
{
	$temp = explode(":", $element);
	if ($my_key === $temp[0])
	{
		echo $temp[1]."\n";
		exit();
	}
}
?>