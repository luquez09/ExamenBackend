$(document).ready(function(){
  $.ajax({
    url: 'tipo.php',
    type:'POST',
  }
  ).done(function(dato) {
    $('#selectTipo').html(dato);
  })

})  

$(document).ready(function(){
  $.ajax({
    url: 'ciudad.php',
    type:'POST',
  }
  ).done(function(dato) {
    $('#selectCiudad').html(dato);
  })

})
