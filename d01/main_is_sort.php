#!/usr/bin/php
<?php
include("ft_is_sort.php");
$tab = array("-100", "-42", "42", "60", "70");
$tab[] = "What are we doing now ?";
if (ft_is_sort($tab))
	echo "The array is sorted\n";
else
	echo "The array is not sorted\n";
?>