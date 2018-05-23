#!/usr/bin/php
<?php

function do_op($n1, $sign_before, $n2)
{
	$number1 = trim($n1);
	$number2 = trim($n2);
	$sign = trim($sign_before);
	if ($sign[0] == '+')
		$temp = $number1 + $number2;
	else if ($sign[0] == '-')
		$temp = $number1 - $number2;
	else if ($sign[0] == '*')
		$temp = $number1 * $number2;
	else if ($sign[0] == '/')
	{
		if ($number2 == '0')
		{
			echo "Warning: Division by zero!\n";
			return FALSE;
		}
		$temp = $number1 / $number2;
	}
	else if ($sign[0] == '%')
	{
		if ($number2 == '0')
		{
			echo "Warning: modulo by zero!\n";
			return FALSE;
		}
		$temp = $number1 % $number2;
	}
	echo "$temp\n";
	return TRUE;
}
if ($argc !== 4)
{
	echo "Incorrect Parameters\n";
	return FALSE;
}
do_op($argv[1], $argv[2], $argv[3]);
return TRUE;
?>
