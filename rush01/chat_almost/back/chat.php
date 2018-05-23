<?php
session_start();
include "auth.php";
if (!isset($_SESSION["loggued_on_user"]) || $_SESSION["loggued_on_user"] == "")
{
	echo "ERROR\n";
	exit(1);
}
date_default_timezone_set("Europe/Kiev");
?>
<!DOCTYPE html>
<html>
<head>
	<title>chat</title>
	<style>
		body
		{
	font-family: Arial;
	font-size: 27px;
	color: #FFFFFF;
	text-shadow: 
		-0   -1px 0   #000000,
		 0   -1px 0   #000000,
		-0    1px 0   #000000,
		 0    1px 0   #000000,
		-1px -0   0   #000000,
		 1px -0   0   #000000,
		-1px  0   0   #000000,
		 1px  0   0   #000000,
		-1px -1px 0   #000000,
		 1px -1px 0   #000000,
		-1px  1px 0   #000000,
		 1px  1px 0   #000000,
		-1px -1px 0   #000000,
		 1px -1px 0   #000000,
		-1px  1px 0   #000000,
		 1px  1px 0   #000000;
}
	</style>
</head>
<body>

<?php
$messages = load_from_file("chat");
foreach ($messages as $data)
{
	echo date("[H:i] ", $data["time"]) ."<b>". $data["login"] ."</b>: ". $data["msg"] ."<br />\n";
}
?>

</body>
</html>