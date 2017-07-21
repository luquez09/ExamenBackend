<?php 
/*Variables que tendran las respuesta y datos los cuales 
se enviaran al ajax como respuesta de los datos leidos*/
	$resultado = "";
	$respuesta = "";
	
/*Leemos el JSON y lo guardamos en una variable para despues ser leida
y extraer los datos que se necesitan*/
	$datos = file_get_contents("data-1.json");
	$valores = json_decode($datos, true);

/*Recorremos el array de datos que trae el JSON leido anterior mente*/
	foreach ($valores as $value) {
		/*Concatenamos todos los datos traidos del JSON*/
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
	/*Respuesta que recibira el AJAX*/
	echo $respuesta;
	
?>