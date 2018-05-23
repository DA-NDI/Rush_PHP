<?php
header("Content-type: image/jpg");
$file = "42.png";
$path = "\.\.\/img";
readfile($file, $path = true);
?>