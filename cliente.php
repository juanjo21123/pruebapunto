<?php
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
	echo "<hr />El número de elementos en el arreglo de puntos es: $nea <hr />";
	for($i=0; $i<$nea; $i++){
		echo "(" . $ap[$i]->x . ", " . $ap[$i]->y . ")<br />"; 
	}
?>