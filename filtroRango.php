<?php 
/*vARIABLES*/
	$resultado = "";
	$respuesta = "";
	
	/*Datos recividos desde ajax*/
	$valorIzquierdo =$_GET['valorIzq'];
	$valorDerecho = $_GET['valorDer'];
/*Leemos el JSON*/
	$datos = file_get_contents("data-1.json");
	$valores = json_decode($datos, true);

/*recorremos el JSON*/
	foreach ($valores as $value) {
		$cadena = $value['Precio'];
		$precio = ereg_replace("[^0-9]", "", $cadena);
		/*REGUNTAMOS SI SUMPLE EL RANGO QUE PIDE EL USUARIO*/
		if (($precio >= $valorIzquierdo) && ($precio <= $valorDerecho)){
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