<?php

// Random string generation
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

session_start();

// Setting content type
header("Content-type: image/gif");
$width  = 200;
$height = 35;

$im = imagecreatetruecolor($width, $height);
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 138, 138, 138);
$black = imagecolorallocate($im, 123, 123, 123);
imagefilledrectangle($im, 0, 0, $width, $height, $white);

//ADD NOISE - DRAW background squares
$square_count = 6;
for($i = 0; $i < $square_count; $i++){
    $cx = rand(0,$width);
    $cy = (int)rand(0, $width/2);
    $h  = $cy + (int)rand(0, $height/5);
    $w  = $cx + (int)rand($width/3, $width);
    imagefilledrectangle($im, $cx, $cy, $w, $h, $white);
}

//ADD NOISE - DRAW ELLIPSES
$ellipse_count = 5;
for ($i = 0; $i < $ellipse_count; $i++) {
    $cx = (int)rand(-1*($width/2), $width + ($width/2));
    $cy = (int)rand(-1*($height/2), $height + ($height/2));
    $h  = (int)rand($height/2, 2*$height);
    $w  = (int)rand($width/2, 2*$width);
    imageellipse($im, $cx, $cy, $w, $h, $grey);
}

$randomnr = generateRandomString();
$font = dirName(__FILE__) . '/fonts/SpecialElite.ttf';

// Add some shadow to the text
imagettftext($im, 20, 2, 23, 30, $grey, $font, $randomnr);

// Add the text
imagettftext($im, 20, 1, 22, 29, $black, $font, $randomnr);

header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


imagegif($im);
imagedestroy($im);