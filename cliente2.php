<?php
	header("Content-Type: image/png");
	require_once './vendor/autoload.php';
	use Laminas\Soap\Client;	
	$url = "http://localhost/9d/pruebapunto/servidor.php";
	$ac = array(
		'location' => $url,
		'uri' => "http://http://localhost/9d/pruebapunto/"
	);
	$cliente = new Client(null, $ac);
	
	// http://localhost:8080/producto3/soap/poligono/cliente.php?l=4&r=50&cx=50&cy=50
	$lados = $_GET['l']; 
	$radio = $_GET['r']; 
	$centrox = $_GET['cx']; 
	$centroy = $_GET['cy'];
	$ap = $cliente->calcularPuntosPoligonoEnCirculo($lados, $radio, $centrox, $centroy);
	$nea = count($ap);
	
	$ancho = 2 * $radio;
	$img = imagecreate($ancho, $ancho);    
	$negro = imagecolorallocate($img, 0, 0, 0);
	$blanco = imagecolorallocate($img, 255, 255, 255);
	$rojo = imagecolorallocate($img, 255, 0, 0);
	imagestring($img, 1, 5, 5,  "A Simple Text String", $blanco);

	imageellipse($img, $centrox, $centroy, $ancho, $ancho, $negro);
	
	imageline($img, $ap[0]->x, $ap[0]->y, $centrox, $centroy, $blanco); 
	imageline($img, $ap[1]->x, $ap[1]->y, $centrox, $centroy, $blanco);
	imageline($img, $ap[0]->x, $ap[0]->y, $ap[1]->x, $ap[1]->y, $blanco); 
	
	imagepng($img);
	imagedestroy($img);
?>

