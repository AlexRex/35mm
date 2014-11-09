function seleccionarEstilo(titulo) {
	var arrayLink = document.getElementsByTagName('link');

	for (var i = 0; i < arrayLink.length; i++) {
		if (arrayLink[i].getAttribute('rel') !== null &&
			arrayLink[i].getAttribute('rel').indexOf('stylesheet') != -1 &&
			arrayLink[i].getAttribute('media') != 'print') {
			if (arrayLink[i].getAttribute('title') !== null &&
				arrayLink[i].getAttribute('title').length > 0) {
				if (arrayLink[i].getAttribute('title') == titulo) {
					//console.log(arrayLink[i].getAttribute('title') + ": false");
					arrayLink[i].disabled = true;
					arrayLink[i].disabled = false;
				} else {
					//console.log(arrayLink[i].getAttribute('title') + ": true");
					arrayLink[i].disabled = true;
				}
			}
		}
	}
	return false;
}


// Código de http://www.w3schools.com/js/js_cookies.asp
function setCookie(c_name, value, expiredays) {
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + expiredays);
	document.cookie = c_name + "=" + escape(value) +
		((expiredays === null) ? "" : ";expires=" + exdate.toGMTString());
}

function getCookie(c_name) {
	if (document.cookie.length > 0) {
		c_start = document.cookie.indexOf(c_name + "=");
		if (c_start != -1) {
			c_start = c_start + c_name.length + 1;
			c_end = document.cookie.indexOf(";", c_start);
			if (c_end == -1)
				c_end = document.cookie.length;
			return unescape(document.cookie.substring(c_start, c_end));
		}
	}
	return "";
}

function listarEstilos(defecto){
	var arrayLink = document.getElementsByTagName('link');
	var selectEstilos = document.getElementById('selEstilos');
	var options = selectEstilos.options;
	for(var i=0; i<arrayLink.length; i++){
		if (arrayLink[i].getAttribute('rel') !== null &&
			arrayLink[i].getAttribute('rel').indexOf('stylesheet') != -1 &&
			arrayLink[i].getAttribute('media') != 'print'){
			if (arrayLink[i].getAttribute('title') !== null &&
				arrayLink[i].getAttribute('title').length > 0){
				options[options.length] = new Option(arrayLink[i].getAttribute('title'), arrayLink[i].getAttribute('title'));
			}
		}
	}
	if(defecto!== null && defecto !== "") selectEstilos.value = defecto;

}

window.addEventListener('load', function() {
	var estiloCookie = getCookie('estilo');
	console.log('Cookies');
	if(estiloCookie !== null && estiloCookie !== ""){
		console.log(estiloCookie);
		seleccionarEstilo(estiloCookie); 
	}

	listarEstilos(estiloCookie);

	var estilos = document.getElementById('selEstilos');
	estilos.onchange = function() {
		seleccionarEstilo(estilos.value);
		setCookie('estilo', estilos.value, 365);
	};

});