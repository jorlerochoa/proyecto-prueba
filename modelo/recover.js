$(cargar('0'));

function cargar(consulta){
  $.ajax({
      url: '../modelo/datos.php',
      type: 'POST',
      dataType: 'html',
      data:{consulta: consulta},
      })
      .done(function(respuesta){
        $("#div_table").html(respuesta);
          //console.log(respuesta);
      })
      .fail(function(){
        console.log(error);
      })
    }
    $(document).on('keyup','#text_busqueda',function(){
      var valor=$(this).val();
      if(valor != ""){
        cargar(valor);
      }
      else{
        cargar('0');
      }
    })


function compruebaPassword(){
  var pass1 = document.getElementById('cliente_password').value;
  var pass2 = document.getElementById('confirm_password').value;
  if(pass1!=pass2){

    document.getElementById("id_oculto").style.display = "block";
    document.getElementById('registro').disabled=true;
    document.getElementById('confirm_password').style.borderColor="#CB4335";
  }
  else{
      document.getElementById("id_oculto").style.display = "none";
      document.getElementById('registro').disabled=false;
  }
}

function compruebaDocumento(){
  var documento = document.getElementById('cliente_documento').value;

  if(!/^[(0-9)]*$/.test(documento)) {
      document.getElementById("validadocumento_oculto").style.display = "block";
      document.getElementById('registro').disabled=true;
      document.getElementById('cliente_documento').style.borderColor="#CB4335";
  }
  else{
      document.getElementById("validadocumento_oculto").style.display = "none";
      document.getElementById('registro').disabled=false;
  }
}

function compruebaExtencionPassword(){
  var documento = document.getElementById('cliente_password').value.length;
console.log(documento);
  if(documento < 4) {
      document.getElementById("validaextension_oculto").style.display = "block";
      document.getElementById('registro').disabled=true;
      document.getElementById('cliente_password').style.borderColor="#CB4335";
  }
  else{
      document.getElementById("validaextension_oculto").style.display = "none";
      document.getElementById('registro').disabled=false;
  }
}

function ValidaLogin(credenciales){
  $.ajax({
      url: '../modelo/datos.php',
      type: 'POST',
      dataType: 'html',
      data:{credenciales: credenciales},
      })
      .done(function(respuesta){
            $("#mensaje").html(respuesta);
            $("#mensaje").background='#CB4335';
            console.log(respuesta);
      })
      .fail(function(){
        console.log(error);
      })
    }


function datosLogin(){
  var credenciales = document.getElementById('user').value + "-" + document.getElementById('password').value;
  if(credenciales != ""){
    ValidaLogin(credenciales);
  }
}
