#!/usr/bin/php
<?php
if ($argc > 1 && $argv[1]!= NULL)
{
$my_arr = trim($argv[1]);
$my_arr = preg_replace('/ +/', " ", $my_arr);
$ret_array = explode(" ", $my_arr);
$last_word = $ret_array[0];
array_shift($ret_array);
array_push($ret_array, $last_word);
$arr_len = count($ret_array);
for ($i = 0; $i < $arr_len - 1; $i++)
{
echo "$ret_array[$i] ";
}
echo "$ret_array[$i]\n";
}
?>