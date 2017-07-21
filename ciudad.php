<?php
/*Este PHP, cargara las ciudades que se encuentran en el JSON 
para asi poderlos mostrar en una lista o bien select, aplique Estructuras de datos
el cual  uso array para guardar las ciudades y al mismo tiempo validadon para no mostrar ciudades repetidas en la lista que el usuario final vera*/

$lista = array();
$tipo = array();
$contador = 0;
    
    $data = file_get_contents("data-1.json");
    $datos = json_decode($data, true);
    foreach( $datos as $valores){
       $tipo[] = $valores["Ciudad"];
     }

    $longitu = sizeof($tipo);
    $lista[] = $tipo[0];
    $bandera = 'n';
    $pos = 0;
    for($i=0; $i < $longitu; $i++){
        $tam = sizeof($lista);
       for($j=0; $j < $tam; $j++){
            if($tipo[$i] ==  $lista[$j])
            {
                $bandera = 's';
            }
       }
       if($bandera == 'n'){
            $pos++;
            $lista[$pos] = $tipo[$i];
       }
       $bandera = 'n';
    }
    $input = '<option id="Tipo" selected>Elige una ciudad</option>';
    for($k=0; $k < $tam; $k++){
        $input = $input.'<option>'.$lista[$k].'</option>';
    }

    $respuesta = $input;
    echo $respuesta;
?>