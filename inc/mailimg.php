<?php
$txt = base64_decode($_GET['mail']);
$len = strlen($txt);
$img = imagecreate($len*10,23);
$backcolor = imagecolorallocate($img,255,255,255);
$textcolor = imagecolorallocate($img,0,0,0);
imagefill($img,0,0,$backcolor);

imagestring($img,10,5,5,$txt,$textcolor);
header("Content-type: image/gif");
imagegif($img);
?>