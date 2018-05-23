#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Kiev');
if (!($fd = fopen("/var/run/utmpx", "r")))
{
	echo "failed to open file\n";
	return FALSE;
}
;
$length = filesize("/var/run/utmpx");
while ($str = fread($fd, 628))
	$data[] = unpack("a256name/a4id/a32line/ipid/itype/i2time/a256host", $str);
foreach ($data as $element)
{
	if ($element['type'] == 7)
	{
		echo $element["name"], " ";
		echo $element["line"],  "  ";
		echo date('M  j H:i', $element["time1"]), "\n";
	}
}
if (@fclose($fd) == FALSE)
{
	print("Failed to close the file\n");
	exit ;
}
?>