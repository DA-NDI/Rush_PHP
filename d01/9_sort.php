#!/usr/bin/php
<?PHP
        function ft_epur ($str)
        {
            $str = trim($str);
            while ($str != str_replace('  ', ' ', $str))
                $str = str_replace('  ', ' ', $str);
            return $str;
        }
    if ($argc != 1)
    {
    foreach (array_slice($argv, 1) as $elem)
    {
    	$arr = ft_epur($elem);
    	if ($arr2)
                $arr2 = $arr2.' '.$arr;
            else
                $arr2 = $arr;
    }
    $arr2 = explode(' ', $arr2);
    $arr2 = array_filter($arr2);
    foreach ($arr2 as $elem) {
        if (ctype_alpha($elem[0]))
            $alpha[] = $elem;
        else if (ctype_digit(($elem[0])))
            $num[] = $elem;
        else
            $spe[] = $elem;
    }
    natcasesort($alpha);
    sort($num, SORT_STRING);
    natcasesort($spe);
    foreach ($alpha as $line)
    	echo "$line\n";
    foreach ($num as $line)
        echo "$line\n";
    foreach ($spe as $line)
        echo "$line\n";
    }
?>