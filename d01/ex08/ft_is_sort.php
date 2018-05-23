<?php
function ft_is_sort($tab)
{
	if (!$tab)
		return TRUE;
	else
	{
		$i = 0;
		while (is_string($tab[$i]) && is_string($tab[$i + 1]))
		{
			if ($tab[$i] > $tab[$i + 1])
			{
				return FALSE;
			}
			else
				$i++;
		}
	}
	return TRUE;
}
?>