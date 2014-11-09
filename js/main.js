function validate(form) {

	var name = true,
		email = true,
		passw = true,
		repPass = true,
		fecha = true;

	if (form.name.value === "") {
		alert('Hay que rellenar el nombre.');
		//form.name.style.background = '#e74c3c';
		return false;
	} else {
		name = validateName(form.name);
	}

	if (form.email.value === "") {
		alert('Hay que rellenar el email.');
		return false;
	}

	if (form.password.value === "") {
		alert('Hay que rellenar la contraseña.');
		return false;
	} else {
		passw = validatePassword(form.password);
	}

	if (form.passRep.value === "") {
		alert('Hay que volver a escribir la contraseña.');
		return false;
	} else {
		repPass = comparePassword(form.password, form.passRep);
	}

	if(form.fecha.value ===""){
		alert("Hay que rellenar la fecha.");
		return false;
	} else{
		fecha = validateFecha(form.fecha);
	}

	

	if (name === true && email === true && passw === true && repPass === true && fecha === true) {
		alert('true');
		console.log('true');
		return true;
	} else{
		alert('false');
	 console.log('false');
	 return false;
	}


}





function validateFecha(e){
	console.log('valid fecha');
	var fecha = e.value.split('/');
	var dia = fecha[0];
	var mes = fecha[1];
	var anyo = fecha[2];

	if(e.value.indexOf("/")==-1){
		alert('Tienes que definir la fecha con la forma dd/mm/yyyy');
		console.log('first false');
			return false;
		}else{
			//saber si anyo es bisiesto para el mes de febrero
			if((anyo % 4 === 0) && ((anyo % 100 !== 0) || (anyo % 400 === 0))){
				if(mes==2 && dia>29){
					alert('Febrero tiene 29 días en febrero');
					return false;
				}
			}
			//para el mes de febrero anyo no bisiesto
			if(mes==2 && dia>28){
				alert('Febrero tiene 28 días.');
				return false;
			}
			if(m1.indexOf(mes)>=-1){
				if(dia<1 || dia>31){
			        alert('Este mes tiene entre 1 y 31 días.'); 
					return false;
				}				
			}
			
			if(m2.indexOf(mes)>=-1){
				if(dia<1 || dia>30){
			        alert('Este mes tiene entre 1 y 30 días.'); 

					return false;
				}				
			}		
		    if(mes<1 || mes>12){
		    	alert('Debes introducir entre 1 y 12 meses.');
		    	return false;
		    }
		    if(anyo<1800 || anyo>(new Date()).getFullYear()){
		    	alert('No pudes introducir ese año.');
				return false;
		    }		
		}
		return true;
}



function validateName(e) {

	var illegalChars = /\W/;
	var ret = true;

	if (e.value.length < 3 || e.value.length > 15) {
		alert('El usuario debe tener entre 3 y 15 caracteres, solo se permite letras, numeros y barra baja.');
		ret = false;
	} else if (illegalChars.test(e.value)) {
		alert('El usuario contiene caracteres ilegales.');
		ret = false;
	}

	if (ret === false) {
		e.style.borderColor = "#e74c3c";
	}
	return ret;
}


function validatePassword(e) {
	var ret = true;

	var ilegalChars = new RegExp("^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15})$");

	if ((e.value.length < 7) || (e.value.length > 15)) {
		alert('La contraseña debe tener entre 7 y 15 caracteres.');
		ret = false;
	} else if (!illegalChars.test(e.value)) {
		alert('La contraseña contiene caracteres ilegales, solo se permite letras y numeros.');
		ret = false;
	}


	if (ret === false) {
		e.style.borderColor = "#e74c3c";
	}

	return ret;
}


function comparePassword(one, two) {
	if (one.value == two.value) {
		return true;
	} else {
		alert('Las contraseñas no coinciden.');
		return false;
	}
}





function validateEmail(e) {
	var te = trim(e.value);
	var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
	var illegalChars = /[\(\)\<\>\,\;\:\\\"\[\]]/;

	var ret = true;

	if (!emailFilter.test(te)) {
		alert('Introduce un email valido.');
		ret = false;
	} else if (e.value.match(illegalChars)) {
		alert('El email contiene caracters no permitidos.');
		ret = false;
	}

	return ret;
}

function validateLogin(form){


	if(form.name.value !=="" && form.password.value!==""){
		return true;
	}
	else{
		alert('Debes introducir los dos campos.');
		return false;
	}
}

