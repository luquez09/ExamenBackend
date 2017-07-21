<?php
/*Aplicamos la misma logica que ciudad.php*/
$lista = array();
$tipo = array();
$contador = 0;
    
    $data = file_get_contents("data-1.json");
    $datos = json_decode($data, true);
    foreach( $datos as $valores){
       $tipo[] = $valores["Tipo"];
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
    $input = '<option id="Tipo" selected>Elige un Tipo</option>';
    for($k=0; $k < $tam; $k++){
        $input = $input.'<option>'.$lista[$k].'</option>';
    }

    $respuesta = $input;
    echo $respuesta;
?>