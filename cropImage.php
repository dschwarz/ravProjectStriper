<?php

///thnks to http://deepliquid.com/content/Jcrop_Implementation_Theory.html

$targ_w = $targ_h = 20;
$jpeg_quality = 90;

$src = $_GET['imgSrc'];
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

imagecopyresampled($dst_r,$img_r,0,0,$_GET['x'],$_GET['y'],
    $targ_w,$targ_h,20,20);

$temp = rand(1,100);
$fileName = $temp.'.jpg';

//header('Content-type: image/jpeg');  (couldn't output then ajax)
imagejpeg($dst_r, $fileName, $jpeg_quality);
print '<img id="'.$temp.'" class="image20" src="'.$fileName.'">'

?>