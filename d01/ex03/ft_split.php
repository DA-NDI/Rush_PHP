<?php
function ft_split($my_arr)
{
	if (is_string($my_arr))
	{
		$sub_arr = trim($my_arr);
		$sub_arr = preg_replace('/ +/', " ", $sub_arr);
		$ret_arr = explode(" ", $sub_arr);
		sort($ret_arr);
		return ($ret_arr);
	}
	else
		return (FALSE);
}
?>