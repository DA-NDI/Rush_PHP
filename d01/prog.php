#!/usr/bin/php
<?php

/* print("Hello\n"); */

function my_add($p1, $p2)
{
	return $p1 + $p2;
}

$my_var = 42;
$my_string = "World\n";
//$my_tab = array("zero", "un", "two");
$my_hash = array("key1" => "value1_1", "key2" => "value2");
$my_tab = explode(";", "zero;un;deux");
/* echo $my_var."\n"; // contantuation */
/* echo "$my_var.$my_string"; // print */
$result = "21" + "23";
echo "$result\n";

$my_tab[0] = "00";

echo $my_tab[0];
echo "\n";
echo $my_hash["key1"]."\n";

print_r($my_tab);

echo my_add("36", "4")."\n";

if ($my_tab[1] == "un")
{
	echo "OK\n";
}
else
{
	echo "KO\n";
}

echo "$argc\n";
print_r($my_tab);

foreach ($argv as $elemen)
{
	echo "$elemen\n";
}



?>


