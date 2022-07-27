<?php
//http://localhost/9d/pruebapunto/index.php;
header("Content-Type: image/png");
require_once 'punto.php';
$arrpuntos = array (
new punto(1000,500 ),
new punto(500,1000),
new punto(0,500),
new punto(500,0)
);
$img =imagecreate(1000, 1000);
$blanco = imagecolorallocate($img, 255,255,255);
$rojo = imagecolorallocate($img, 255,0,0);
$negro = imagecolorallocate($img, 0,0,0);
/*
imageline($img, $arrpuntos[0]->x, $arrpuntos[0]->y, $arrpuntos[1]->x, $arrpuntos[1]->y,$rojo);
imageline($img, $arrpuntos[2]->x, $arrpuntos[2]->y, $arrpuntos[3]->x, $arrpuntos[3]->y,$rojo);
imageline($img, $arrpuntos[1]->x, $arrpuntos[1]->y, $arrpuntos[3]->x, $arrpuntos[3]->y,$rojo);
imageline($img, $arrpuntos[0]->x, $arrpuntos[0]->y, $arrpuntos[1]->x, $arrpuntos[1]->y,$rojo);
*/
imagepolygon($img,
array(
    $arrpuntos[3]->x, $arrpuntos[3]->y,
    $arrpuntos[0]->x, $arrpuntos[0]->y,
    $arrpuntos[1]->x, $arrpuntos[1]->y,
    $arrpuntos[2]->x, $arrpuntos[2]->y
),
3,
$rojo
);
imagefilledpolygon($img,
array(
    $arrpuntos[3]->x, $arrpuntos[3]->y,
    $arrpuntos[0]->x, $arrpuntos[0]->y,
    $arrpuntos[1]->x, $arrpuntos[1]->y
),
3,
$rojo
);
imagepng ($img);
imagedestroy($img);
?>