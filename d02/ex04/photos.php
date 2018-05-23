#!/usr/bin/php
<?php
foreach( $html->find('.featured img') as $image )
{
    $imageSrc = $image->src;
    $imageUri = $this->rel2abs($imageSrc, $sourceURI);
    $imageLocalPath = 'getImages/'.preg_replace('/[^a-z0-9-.]/i', '-', $imageUri);

    if (!file_exists($imageLocalPath))
    {
        $imageData = file_get_contents($imageUri, false, $streamContext);
        file_put_contents($imageLocalPath, $imageData);
    }
    else
        $imageData = file_get_contents($imageLocalPath);
}
?>