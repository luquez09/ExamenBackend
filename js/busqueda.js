/*Funcion que llamara las funciones de filtro sea el caso por
Tipo -Rango
Ciudad -Rango
Tipo - Ciudad -Rango
Rango
*/
function opciones(){
    /*Capturamos la seleccion de filtro por ciudad y por Tipo y validamos que si selecciono 
    o no un item de la lista*/
    var pos = document.getElementById('selectCiudad').selectedIndex;
    var ciudades = document.getElementById('selectCiudad').options;
    ciudades = ciudades[pos].text;

    var pos = document.getElementById('selectTipo').selectedIndex;
    var tipos = document.getElementById('selectTipo').options;
    tipos = tipos[pos].text;

/*Preguntamos si quiere eligio los 3 tipos de filtro*/
    if((ciudades.indexOf("Elige") == -1) && (tipos.indexOf("Elige") == -1)){
     /*Si se cumple llamamos la funcion filtroCTR*/
    alert("FILTRO POR CTR");
     filtroCTR();
    }else{
      /*En caso que no preguntamos si eligio solamente tipo de vivienda*/
      if((ciudades.indexOf("Elige") > -1) && (tipos.indexOf("Elige") == -1)){
        /*Si se cumple llamaos a la funcion filtroTipo*/
        alert("FILTRO POR TIPO");
        filtroTipo();
      }else{
        /*Si no preguntamos si eligio solamente Ciudad */
        if((ciudades.indexOf("Elige") == -1) && (tipos.indexOf("Elige") > -1)){
          alert("FILTRO POR CIUDAD");
          filtroCiudad();
        }else{
          /*Si no, Solo mente quiere el filtro por el rango*/
          if((ciudades.indexOf("Elige") > -1) && (tipos.indexOf("Elige") > -1))
          {
            alert("FILTRO POR RANGO");
            filtroRango();
          }
        }
      }
    }
}


/*Funcion que recibira todas las ventas que existen sin ningun tipo de filtro*/
function agregar(){
      $.ajax({
        url: 'filtroPrincipal.php',
      }).done(function(datos) {
            $('#contenedor1').html(datos);
      })
}

/*Filtro que no tendra en cuenta el tipo de vivienda o ciudad, sola mente el invervalo de rango que 
el usuario pida*/
function filtroRango(){
  /*Capturamos los valores de los rangos, dados por el cliente*/
    var valorIzq = document.getElementsByClassName('irs-from')[0].innerHTML;
    var valorDer = document.getElementsByClassName('irs-to')[0].innerHTML;
    /*Quitamos el signo de valor ($), para asi hacer una comparacion de numeros y no
    de caracteres el cual no arrojaria ningun resultado.*/
    valorIzq = valorIzq.match(/\d+/g).join('');
    valorDer = valorDer.match(/\d+/g).join('');
   
      /*Realizamos una peticcion AJAX, el cual se le mandaron los valores o bien 
      rango de precio que quiere el cliente buscar*/
      $.ajax({
        url: 'filtroRango.php',
        type: 'GET',
        data: {valorIzq:valorIzq, valorDer:valorDer},
      }).done(function(datos) {
            $('#contenedor1').html(datos);
      })
    
}

/*FUNCION filtroCTR QUE CONSULTA LOS 3 TIPOS DE FILTRO
C: CIUDAD
T: TIPO
R: RANGO*/
function filtroCTR() {
  /*Capturamos los valores de los rangos, dados por el cliente*/
    var valorIzq = document.getElementsByClassName('irs-from')[0].innerHTML;
    var valorDer = document.getElementsByClassName('irs-to')[0].innerHTML;
    
    /*Quitamos el signo de valor ($), para asi hacer una comparacion de numeros y no
    de caracteres el cual no arrojaria ningun resultado.*/
    valorIzq = valorIzq.match(/\d+/g).join('');
    valorDer = valorDer.match(/\d+/g).join('');
    /*Capturamos la seleccion de filtro por ciudad y por Tipo y validamos que si selecciono 
    o no un item de la lista*/
    var pos = document.getElementById('selectCiudad').selectedIndex;
    var ciudades = document.getElementById('selectCiudad').options;
    ciudades = ciudades[pos].text;

    var pos = document.getElementById('selectTipo').selectedIndex;
    var tipos = document.getElementById('selectTipo').options;
    tipos = tipos[pos].text;

  /*Validamos que el usuario selecciono una ciudad y un tipo de vivienda, mas el rango del precio*/
    if ((ciudades.indexOf("Elige") == -1) && (tipos.indexOf("Elige") == -1)){
       /*Realizamos una peticcion AJAX*/
      $.ajax({
        url: 'filtroCompleto.php',
        type: 'GET',
        data: {valorIzq:valorIzq, valorDer:valorDer, ciudades:ciudades, tipos:tipos},
      }).done(function(datos) {
            $('#contenedor1').html(datos);
      })

    }
}

/*Funcion que solo filtrara las ciudades con su debido rango de precio*/
function filtroCiudad(){
   /*Capturamos los valores de los rangos, dados por el cliente*/
    var valorIzq = document.getElementsByClassName('irs-from')[0].innerHTML;
    var valorDer = document.getElementsByClassName('irs-to')[0].innerHTML;
    
    /*Quitamos el signo de valor ($), para asi hacer una comparacion de numeros y no
    de caracteres el cual no arrojaria ningun resultado.*/
    valorIzq = valorIzq.match(/\d+/g).join('');
    valorDer = valorDer.match(/\d+/g).join('');
    /*Capturamos la seleccion de filtro por ciudad y validamos que si selecciono 
    o no un item de la lista*/
    var pos = document.getElementById('selectCiudad').selectedIndex;
    var ciudades = document.getElementById('selectCiudad').options;
    ciudades = ciudades[pos].text;

    if ((ciudades.indexOf("Elige") == -1)){
       /*Realizamos una peticcion AJAX con la ciudad y el rango de precio*/
      $.ajax({
        url: 'filtroCiudad.php',
        type: 'GET',
        data: {valorIzq:valorIzq, valorDer:valorDer, ciudades:ciudades},
      }).done(function(datos) {
            $('#contenedor1').html(datos);
      })

    }
}
/*Funcion que solo filtrara las Tipo con su debido rango de precio*/
function filtroTipo(){
   /*Capturamos los valores de los rangos, dados por el cliente*/
    var valorIzq = document.getElementsByClassName('irs-from')[0].innerHTML;
    var valorDer = document.getElementsByClassName('irs-to')[0].innerHTML;
    
    /*Quitamos el signo de valor ($), para asi hacer una comparacion de numeros y no
    de caracteres el cual no arrojaria ningun resultado.*/
    valorIzq = valorIzq.match(/\d+/g).join('');
    valorDer = valorDer.match(/\d+/g).join('');
    /*Capturamos la seleccion de filtro por Tipo y validamos que si selecciono 
    o no un item de la lista*/
    var pos = document.getElementById('selectTipo').selectedIndex;
    var tipos = document.getElementById('selectTipo').options;
    tipos = tipos[pos].text;

    if ((tipos.indexOf("Elige") == -1)){
       /*Realizamos una peticcion AJAX*/
      $.ajax({
        url: 'filtroTipo.php',
        type: 'GET',
        data: {valorIzq:valorIzq, valorDer:valorDer, tipos:tipos},
      }).done(function(datos) {
            $('#contenedor1').html(datos);
      })

    }
}