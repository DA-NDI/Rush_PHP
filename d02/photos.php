#!/usr/bin/php
<?php
print("argv = $argv[1]\n");
$content = file_get_contents($argv[1]);

preg_match_all('/<img[^>]+src=([^\s>]+)/i', $images);
print_r($images);





//print($content);

  



?>