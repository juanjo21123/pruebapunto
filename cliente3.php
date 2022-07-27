<?php
    header("content-type:image/png");
	require_once './vendor/autoload.php';
	use Laminas\Soap\Client;	
	$url = "http://localhost/9d/pruebapunto/servidor.php";
	$ac = array(
		'location' => $url,
		'uri' => "http://localhost/9d/pruebapunto"
	);
	$cliente = new Client(null, $ac);
	
	// http://localhost:8080/producto3/soap/poligono/cliente.php?l=4&r=50&cx=50&cy=50
	$lados = $_GET['l']; 
	$radio = $_GET['r']; 
	$centrox = $_GET['cx']; 
	$centroy = $_GET['cy'];
	$ap = $cliente->calcularPuntosPoligonoEnCirculo($lados, $radio, $centrox, $centroy);
	//var_dump($ap);
	$nea = count($ap);
	/*
    echo "<hr />El número de elementos en el arreglo de puntos es: $nea <hr />";
	for($i=0; $i<$nea; $i++){
		echo "(" . $ap[$i]->x . ", " . $ap[$i]->y . ")<br />"; 
	}
    */
    $ancho = 2 * $radio;
    $img =imagecreate($ancho, $ancho);
    $blanco = imagecolorallocate($img, 255,255,255);
    $rojo = imagecolorallocate($img, 255,0,0);
    $negro = imagecolorallocate($img, 0,0,0);
    $azul = imagecolorallocate($img, 51,255,212);
    $morado = imagecolorallocate($img, 111,8,207);
    $gris = imagecolorallocate($img, 140,140,140);
    for($i=1; $i<$lados; $i++){
        imagepolygon($img,
        array( $centrox,$centroy,
            $ap[$i-1]->x,$ap[$i-1]->y,
            $ap[$i]->x,$ap[$i]->y),
        3,
        $morado);
    }
    imagepolygon($img,
        array( $centrox,$centroy,
            $ap[0]->x,$ap[0]->y,
            $ap[$lados-1]->x,$ap[$lados-1]->y),
        3,
        $morado);
        imagepng($img);
	imagedestroy($img);

    
?>
