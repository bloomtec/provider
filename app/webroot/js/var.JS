function emailCheck(emailStr) {

	var x = document.forms["contact-form"]["data[Email][name]"].value;
	//var x = document.forms["contact-form"]["name"].value;
	if (x == null || x == "") {
		alert("Por favor introduzca un nombre de contacto.");
		return false;
	}
	var x = document.forms["contact-form"]["data[Email][lastname]"].value;
	//var x = document.forms["contact-form"]["lastname"].value;
	if (x == null || x == "") {
		alert("Por favor introduce un apellido.");
		return false;
	}
	var x = document.forms["contact-form"]["data[Email][phone]"].value;
	//var x = document.forms["contact-form"]["phone"].value;
	if (x == null || x == "") {
		alert("Por favor introduzca un telefono de contacto.");
		return false;
	}
	var x = document.forms["contact-form"]["data[Email][cel]"].value;
	//var x = document.forms["contact-form"]["cel"].value;
	if (x == null || x == "") {
		alert("Por favor introduzca un celular de contacto.");
		return false;
	}
	var x = document.forms["contact-form"]["data[Email][empresa]"].value;
	//var x = document.forms["contact-form"]["empresa"].value;
	if (x == null || x == "") {
		alert("Por favor introduzca nombre de empresa.");
		return false;
	}
	var x = document.forms["contact-form"]["data[Email][cargo]"].value;
	//var x = document.forms["contact-form"]["cargo"].value;
	if (x == null || x == "") {
		alert("Por favor introduzca un cargo.");
		return false;
	}
	var x = document.forms["contact-form"]["data[Email][pais]"].value;
	//var x = document.forms["contact-form"]["pais"].value;
	if (x == null || x == "") {
		alert("Por favor introduzca un pais de ubicación.");
		return false;
	}
	var x = document.forms["contact-form"]["data[Email][city]"].value;
	//var x = document.forms["contact-form"]["city"].value;
	if (x == null || x == "") {
		alert("Por favor introduzca ciudad de contacto.");
		return false;
	}
	var x = document.forms["contact-form"]["data[Email][email]"].value;
	//var x = document.forms["contact-form"]["email"].value;
	if (x == null || x == "") {
		alert("Por favor introduzca un correo de contacto.");
		return false;
	}
	var x = document.forms["contact-form"]["data[Email][sub]"].value;
	//var x = document.forms["contact-form"]["sub"].value;
	if (x == null || x == "") {
		alert("Por favor introduzca un asunto.");
		return false;
	}
	var x = document.forms["contact-form"]["data[Email][text]"].value;
	//var x = document.forms["contact-form"]["text"].value;
	if (x == null || x == "") {
		alert("Por favor introduzca un mensaje.");
		return false;
	}

	var checkTLD = 1;

	var knownDomsPat = /^(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum)$/;

	var emailPat = /^(.+)@(.+)$/;

	var specialChars = "\\(\\)><@,;:\\\\\\\"\\.\\[\\]";

	var validChars = "\[^\\s" + specialChars + "\]";

	var quotedUser = "(\"[^\"]*\")";

	var ipDomainPat = /^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;

	var atom = validChars + '+';

	var word = "(" + atom + "|" + quotedUser + ")";

	var userPat = new RegExp("^" + word + "(\\." + word + ")*$");

	var domainPat = new RegExp("^" + atom + "(\\." + atom + ")*$");

	var matchArray = emailStr.match(emailPat);

	if (matchArray == null) {

		alert("La dirección de correo no aparece o es incorrecta");

		return false;

	}

	var user = matchArray[1];

	var domain = matchArray[2];

	for ( i = 0; i < user.length; i++) {

		if (user.charCodeAt(i) > 127) {

			alert("La dirección de correo contiene caracteres no validos.");

			return false;

		}

	}

	for ( i = 0; i < domain.length; i++) {

		if (domain.charCodeAt(i) > 127) {

			alert("El dominio de la dirección introducida contiene caracteres no validos.");

			return false;

		}

	}

	if (user.match(userPat) == null) {

		alert("La dirección de correo parece incorrecta, por favor compruebalo.");

		return false;

	}

	var IPArray = domain.match(ipDomainPat);

	if (IPArray != null) {

		for (var i = 1; i <= 4; i++) {

			if (IPArray[i] > 255) {

				alert("La dirección IPInternet Protocol de destino no es correcta!");

				return false;

			}

		}

		return true;

	}

	var atomPat = new RegExp("^" + atom + "$");

	var domArr = domain.split(".");

	var len = domArr.length;

	for ( i = 0; i < len; i++) {

		if (domArr[i].search(atomPat) == -1) {

			alert("La dirección de correo parece incorrecta, por favor compruebalo, incluyendo el uso incorrecto de signos de puntuación, comas , o puntos [.] al final de la dirección.");

			return false;

		}

	}

	if (checkTLD && domArr[domArr.length - 1].length != 2 && domArr[domArr.length - 1].search(knownDomsPat) == -1) {

		alert("Tu dirección de correo debe terminar en un dominio o dos letras " + "país.");

		return false;

	}

	if (len < 2) {

		alert("Falta el nombre del host en tu dirección de correo - compruebalo. O debes de haber añadido un espacio en blanco al final de la dirección - corrije el error e intentalo de nuevo.");

		return false;

	}

	return true;

}