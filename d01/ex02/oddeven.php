#!/usr/bin/php
<?php
$stdin = fopen('php://stdin', 'r');
while ($stdin && !feof($stdin))
{
	echo "Enter a number: ";
	$number = trim(fgets($stdin));
	if (feof($stdin) && print"\n")
		exit;
	if (!is_numeric($number))
		print("'$number' is not a number\n");
	else if ($number % 2 == 0)
		print("The number $number is even\n");
	else
		print("The number is odd\n");
}
fclose($stdin);
?>