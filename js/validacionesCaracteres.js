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



