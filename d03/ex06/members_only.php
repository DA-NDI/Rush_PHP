<?php
if (($_SERVER['PHP_AUTH_USER'] == 'zaz') && ($_SERVER['PHP_AUTH_PW'] == 'jaimelespetitsponeys'))
{
?>
<html><body>
Hello Zaz<br />
<img src='data:image/png;base64,
<?php
	$image = file_get_contents("../img/42.png");
	$uncod = base64_encode($image);
	echo "$uncod";
?>'></body></html>
<?php
}
else
	{
?>
<html><body>That area is accessible for members only</body></html>
<?php
header("Connection: close", true);
	}
	?>
