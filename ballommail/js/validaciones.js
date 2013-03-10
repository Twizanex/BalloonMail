// JavaScript Document

function esFechaValida(fecha){
    if (fecha != undefined && fecha.value != "" ){
        if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha.value)){
            return false;
        }
        var dia  =  parseInt(fecha.value.substring(0,2),10);
        var mes  =  parseInt(fecha.value.substring(3,5),10);
        var anio =  parseInt(fecha.value.substring(6),10);
 
    switch(mes){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            numDias=31;
            break;
        case 4: case 6: case 9: case 11:
            numDias=30;
            break;
        case 2:
            if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
            break;
        default:
            return false;
    }
 
        if (dia>numDias || dia==0){
            
            return false;
        }
        return true;
    }
}

function comprobarSiBisisesto(anio){
if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0))) {
    return true;
    }
else {
    return false;
    }
}

function validarNumero(cadena){
if (/^([0-9])*$/.test(cadena)){
	return true;
	}
else{
	return false;
	}
}

function validarCorreo(cadena){
if (/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(cadena)){
	return true;
	}
else{
	return false;
	}
}


function validarPassword(cadena){
/*
Entre 8 y 10 caracteres, por lo menos un digito y un alfanumérico, y no puede contener caracteres espaciales
*/	
if (/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/.test(cadena)){
	return true;
	}
else{
	return false;
	}
}

function validarTelefono(cadena){
if (/^([0-9\s\+\-])+$/.test(cadena)){
	return true;
	}
else{
	return false;
	}
}

