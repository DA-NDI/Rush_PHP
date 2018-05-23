#!/usr/bin/php
<?php
function ft_cmp($p1, $p2)
{
	$s1 = strtolower($p1);
	$s2 = strtolower($p2);
	$i = 0;
	while ($s1[$i] || $s1[$i] || $s1[$i] == "0" || $s2[$i] == "0")
	{
		if (!$s1[$i] && $s1[$i] != "0")
			return (-1);
		if (!$s2[$i] && $s2[$i] != "0")
			return (1);
		if (ctype_alpha($s1[$i]))
			$pr1 = 1;
		else if (ctype_digit($s1[$i]))
			$pr1 = 0;
		else
			$pr1 = -1;
		if (ctype_alpha($s2[$i]))
			$pr2 = 1;
		else if (ctype_digit($s2[$i]))
			$pr2 = 0;
		else
			$pr2 = -1;
		if ($pr1 > $pr2)
			return (-1);
		else if ($pr1 < $pr2)
			return (1);
		else
		{
			if ($s1[$i] < $s2[$i])
				return (-1);
			else if ($s1[$i] > $s2[$i])
				return (1);
		}
		$i++;
	}
	return (0);
}
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
	/* usort($ret_arr, ft_cmp);   will be the same result as all bottom(except foreach block). left for realization lookup  */
	$i = 0;
	$len = count($ret_arr);
	while ($i < $len - 1)
	{
		if (ft_cmp($ret_arr[$i], $ret_arr[$i + 1]) > 0)
		{
			$temp = $ret_arr[$i];
			$ret_arr[$i] = $ret_arr[$i + 1];
			$ret_arr[$i + 1] = $temp;
			$i = 0;
		}
		else
			$i++;
	}
	foreach ($ret_arr as $elem)
	{
		echo "$elem\n";
	}
}
?>