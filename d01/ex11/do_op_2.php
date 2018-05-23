#!/usr/bin/php
<?php

function multiexplode ($delimiters,$string) {
	$ready = str_replace($delimiters, $delimiters[0], $string);
	$launch = explode($delimiters[0], $ready);
	return  $launch;
}

function do_op($str1)
{

	$temp = str_replace(" ", "", $str1);
	for ($i = 0; $temp[$i] || $temp[$i] == '0'; $i++)
	{
		if ($temp[$i] == '-' || $temp[$i] == '+' || $temp[$i] == '*' || $temp[$i] == '/' || $temp[$i] == '%')
			$sign = $temp[$i];
	}
	$exploded = multiexplode(array("-","+","*","%","/"),$temp);
	$number1 = $exploded[0];
	$number2 = $exploded[1];
	if ($sign == '+' && is_numeric($number1) && is_numeric($number2))
	{
		$temp = $number1 + $number2;
		echo "$temp\n";
	}
	else if ($sign == '-' && is_numeric($number1) && is_numeric($number2))
	{
		$temp = $number1 - $number2;
		echo "$temp\n";
	}
	else if ($sign == '*' && is_numeric($number1) && is_numeric($number2))
	{
		$temp = $number1 * $number2;
		echo "$temp\n";
	}
	else if ($sign == '/' && is_numeric($number1) && is_numeric($number2))
	{
		if ($number2 == '0')
		{
			echo "Warning: Division by zero!\n";
			return FALSE;
		}
		$temp = $number1 / $number2;
		echo "$temp\n";
	}
	else if ($sign == '%' && is_numeric($number1) && is_numeric($number2))
	{
		if ($number2 == '0')
		{
			echo "Warning: modulo by zero!\n";
			return FALSE;
		}
		$temp = $number1 % $number2;
		echo "$temp\n";
	}
	else
		echo "Syntax Error\n";
	return TRUE;
}
if ($argc !== 2)
{
	echo "Incorrect Parameters\n";
	return FALSE;
}
do_op($argv[1]);
return TRUE;
?>
