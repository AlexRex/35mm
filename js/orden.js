function sortUnorderedList(ul, sortDescending, type) {
	if (typeof ul == "string")
		ul = document.getElementById(ul);

	var lis = ul.getElementsByTagName("LI");

	var vals = [];

	for (var i = 0, l = lis.length; i < l; i++) {
		vals.push(lis[i]);
	}



	if (type == "Nombre") {
		vals.sort(function(a, b) {
			// console.log(a.children[2].innerHTML+" "+b.children[2].innerHTML);
			if (a.children[1].innerHTML > b.children[1].innerHTML) {
				return 1;
			}
			if (a.children[1].innerHTML < b.children[1].innerHTML) {
				return -1;
			}
			// a must be equal to b
			return 0;
		});

		document.getElementById("ordenNombre").value = "Descendente";
		if (sortDescending) {
			//paises.reverse();
			vals.reverse();
			document.getElementById("ordenNombre").value = "Ascendente";
		}
	}

	if (type == "Pais") {
		vals.sort(function(a, b) {
			// console.log(a.children[2].innerHTML+" "+b.children[2].innerHTML);
			if (a.children[2].innerHTML > b.children[2].innerHTML) {
				return 1;
			}
			if (a.children[2].innerHTML < b.children[2].innerHTML) {
				return -1;
			}
			// a must be equal to b
			return 0;
		});

		document.getElementById("ordenPais").value = "Descendente";
		if (sortDescending) {
			//paises.reverse();
			vals.reverse();
			document.getElementById("ordenPais").value = "Ascendente";
		}
	}

	if (type == "Fecha") {
		vals.sort(function(a, b) {

			var aa = a.children[3].innerHTML.split('/').reverse().join(),
				bb = b.children[3].innerHTML.split('/').reverse().join();
			return aa < bb ? -1 : (aa > bb ? 1 : 0);
		});

		document.getElementById("ordenFecha").value = "Descendente";
		if (sortDescending) {
			//paises.reverse();
			vals.reverse();
			document.getElementById("ordenFecha").value = "Ascendente";
		}
	}



	for (var d = 0, a = lis.length; d < a; d++) {
		ul.appendChild(vals[d]);
		//console.log(vals[d].innerHTML);
	}

}

window.addEventListener('load', function() {
	var descNombre = false;
	var descPais = false;
	var descFecha = false;
	document.getElementById("ordenNombre").onclick = function() {
		sortUnorderedList("listaResultado", descNombre, "Nombre");
		descNombre = !descNombre;
		return false;
	};
	document.getElementById("ordenPais").onclick = function() {
		sortUnorderedList("listaResultado", descPais, "Pais");
		descPais = !descPais;
		return false;
	};
	document.getElementById("ordenFecha").onclick = function() {
		sortUnorderedList("listaResultado", descFecha, "Fecha");
		descFecha = !descFecha;
		return false;
	};
});



