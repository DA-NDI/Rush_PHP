<?php
echo $_GET['link'];
foreach ($_GET as $key => $value) {
	echo "$key: $value";
	echo "\n";
}
?>