<?php 
/**Variables**/
	$resultado = "";
	$respuesta = "";
	
	/*Captura de los datos mandados desde AJAX*/
	$valorIzquierdo =$_GET['valorIzq'];
	$valorDerecho = $_GET['valorDer'];
	$ciudad = $_GET['ciudades'];

/*leemos el JSON*/
	$datos = file_get_contents("data-1.json");
	$valores = json_decode($datos, true);

/*RECORREMOS EL JSON*/
	foreach ($valores as $value) {
		$cadena = $value['Precio'];
		/*Como el JSON ES UN STRING QUITAMOS EL SIGNO DE PESO $, PARA PODER SER COMPARADO 
		CON EL PRECIO TRAIDO DESDE EL FONT-END*/
		$precio = ereg_replace("[^0-9]", "", $cadena);

		/*PREGUNTAMOS SI ESTA ENTRE EL INTERVALO DE RANGO EL PRECIO QUE SE AH RECIBIDO Y SI ES LA CIUDAD*/
		if (($precio >= $valorIzquierdo) && ($precio <= $valorDerecho) && 
			($ciudad === $value['Ciudad'])){
			/*Concatenamos toda la informacion que cumpla conla condicion dada anterior mente*/
			$resultado = '<div class="con-datos">';
			$resultado = $resultado.'<div class="img"><img src="img/home.jpg"></div>';       
            $resultado = $resultado.'<div class="dato">';
            $resultado = $resultado.$value['Id'].'<br>';
            $resultado = $resultado.$value['Direccion'].'<br>';
            $resultado = $resultado.$value['Ciudad'].'<br>';
            $resultado = $resultado.$value['Telefono'].'<br>';
            $resultado = $resultado.$value['Codigo_Postal'].'<br>';
            $resultado = $resultado.$value['Tipo'].'<br>';
            $resultado = $resultado.$value['Precio'].'<br>';
            $resultado = $resultado.'</div>';
            $resultado = $resultado.'</div>';
            $resultado = $resultado.'</div>';
            $respuesta = $respuesta.$resultado;
		}
	}
	echo $respuesta;
	
?>