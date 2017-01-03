function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóüabcdefghijklmnñopqrstuvwxyz";
    especiales = [8,32,37,39];

    tecla_especial = false
    for(var i in especiales){
      if(key==especiales[i]){
        tecla_especial = true;
        break;
      }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
      return false;
    }
  }

function soloNumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8];

    tecla_especial = false
    for(var i in especiales){
      if(key==especiales[i]){
        tecla_especial = true;
        break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
      return false;
    }
  }

function soloFechas(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8,45];

    tecla_especial = false
    for(var i in especiales){
      if(key==especiales[i]){
        tecla_especial = true;
        break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
      return false;
    }
  }

  function soloNumerosYFracciones(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8,46];

    tecla_especial = false
    punto = false;
    for(var i in especiales){
      if(key==especiales[i]){
        tecla_especial = true;
        break;
      }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
      return false;
    }
  }

function ValidaDecimal(dato) {
  var valor = dato.indexOf(".");
  if ((window.event.keyCode > 47 && window.event.keyCode <58) || window.event.keyCode == 46) {
    if (window.event.keyCode == 46) {
      if (valor >= 0) {
        window.event.returnValue = false;
      }
    }
  }else {
    window.event.returnValue = false;
  }
}

function telefonos(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8,40,41,45,47];

    tecla_especial = false
    for(var i in especiales){
      if(key==especiales[i]){
        tecla_especial = true;
        break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
      return false;
    }
  }

function validaTipoValor(valor){ 
  if (isNaN(valor)) { 
    document.getElementById('tipoCaracter').value = 0;//LETRA
  }else{ 
    document.getElementById('tipoCaracter').value = 1;//NUMERO
  } 
}

function validaMontoCobrado(){
  var monCob = parseFloat(document.getElementById('txtMonVal').value);
  var monPag = parseFloat(document.getElementById('txtMonLet').value);
  if (monPag > 0 && monPag <= monCob){

  }else{
    alert('El monto cobrado no puede exceder los S/.'+monCob+' ni puede ser S/0.00 soles.');
    document.getElementById('txtMonLet').style.background = "#FFBBBB";
    document.getElementById("txtMonLet").focus();
  }
}
