function almacenarTrueque() {
	var titulo = document.getElementById("titulo").value;
	var año = document.getElementById("año").value;
	var autor = document.getElementById("autor").value;
	var isbn = document.getElementById("isbn").value;
	var genero = document.getElementById("genero").value;
	var idioma = document.getElementById("idioma").value;
	var editorial = document.getElementById("editorial").value;
	var descripcion = document.getElementById("descripcion").value;
	
	if(verificar()){
		enviaRegistro(titulo, año, autor,isbn, genero, idioma,editorial,descripcion);
	}
}

//METODOS

function verificar(){
	var titulo = document.getElementById("titulo").value;
	var año = document.getElementById("año").value;
	var autor = document.getElementById("autor").value;
	var isbn = document.getElementById("isbn").value;
	var genero = document.getElementById("genero").value;
	var idioma = document.getElementById("idioma").value;
	var editorial = document.getElementById("editorial").value;
	var descripcion = document.getElementById("descripcion").value;


	document.getElementById("error").innerHTML = "";
	
	if(titulo.length == 0 || titulo.length>40){
		
		document.getElementById("error").innerHTML = "Por favor digite un valor correcto para el nombre del titulo, debe ser menor de 40 caracteres.\n";
		return false;
	}

	else if(año.length == 0 || año.length>4){
		document.getElementById("error").innerHTML = "Por favor digite un valor correcto para el año, deben ser 4 dígitos.\n";
		return false;
	}

	else if(autor.length == 0 || autor.length>40){
		document.getElementById("error").innerHTML = "Por favor digite un valor correcto para el autor, deben ser menor de 40 caracteres.\n";
		return false;
	}

	else if(isbn.length == 0 || isbn.length>13){
		document.getElementById("error").innerHTML = "Por favor digite un valor correcto para el ISBN, deben ser 13 caracteres\n";
		return false;
	}

	else if(genero.length == 0){
		document.getElementById("error").innerHTML = "Por favor digite un valor correcto para el genero.\n";
		return false;
	}

	else if(idioma.length == 0 || idioma.length >15){
		document.getElementById("error").innerHTML = "Por favor digite un valor correcto para el idioma, debe ser menor que 13 caracteres.";
		return false;
	}

	else if(editorial.length == 0 || editorial.length >40){
		document.getElementById("error").innerHTML = "Por favor digite un valor correcto para la editorial, debe ser menor que 40 caracteres.";
		return false;
	}

	else if(descripcion.length == 0 || descripcion.length >80){
		document.getElementById("error").innerHTML = "Por favor rellene una descripción, debe ser menor que 80 caracteres.";
		return false;
	}
	return true;
}

function enviaRegistro(titulo, año, autor,isbn, genero, idioma,editorial,descripcion){
	
	var carta = new XMLHttpRequest();
	//2. (POST) Configurar: Privacidad, Dirección
	carta.open("POST","PHP/crearTrueque.php",true);
	//2.5 (POST) Configurar: Encabezado HTTP
	carta.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	//3. (POST) Envío con Mensaje ( Parámetros )
	carta.send("titulo=" + titulo + "&año=" + año +"&autor=" + autor + "&isbn=" + isbn + "&genero=" + genero + "&idioma=" + idioma + "&editorial=" + editorial +"&descripcion=" + descripcion);
	//Recibir respuesta del servidor - Atributos de XMLHttpRequest
	//1. Moniterar y reaccionar cambios al readyState con el atributo onreadystatechange
	carta.onreadystatechange = function() {
		
		//2. Monitorear atributos:
		//	2.1. readyState: Es el estado del objeto XMLHttpRequest: 4 es recibido
		//	2.2. status: Es la recepción del mensaje por el servidor: 200 es OK
		if(carta.readyState == 4 && carta.status == 200){
			// 3. Respuesta recibida en el atributo responseText
			var respuesta = carta.responseText;

			if(respuesta == "ERROR"){
				console.log("entre a onread11y");
				window.location.href = "crearTrueque.html";
				alert("ERROR al intentar registrar el cambio en la Base de Datos");
			}else if(respuesta == "OK"){
				console.log("entre a onready");
				alert("El registro fue almacenado exitosamente en la Base de Datos!");
				window.location.href = "treques-mostrar.php";
			}
		}
	}
}
	