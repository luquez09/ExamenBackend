<?php 
/*Variables*/
	$resultado = "";
	$respuesta = "";
	
	/*Datos recibidos desde JAX*/
	$valorIzquierdo =$_GET['valorIzq'];
	$valorDerecho = $_GET['valorDer'];
	$ciudad = $_GET['ciudades'];
	$tipo = $_GET['tipos'];

/*lEEMOS EL JSON*/
	$datos = file_get_contents("data-1.json");
	$valores = json_decode($datos, true);

/*rECORREMOS EL JSON */
	foreach ($valores as $value) {
		$cadena = $value['Precio'];
		$precio = ereg_replace("[^0-9]", "", $cadena);
		/*pREGUNTAMOS SI SE CUMPLE LA CONDICION QUE PIDE EL USUARIO FINAL*/
		if (($precio >= $valorIzquierdo) && ($precio <= $valorDerecho) && 
			($ciudad === $value['Ciudad']) && ($tipo === $value['Tipo'])){

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