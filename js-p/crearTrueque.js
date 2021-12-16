

function almacenarTrueque() {
	var titulo = document.getElementById("titulo").value;
	var autore = document.getElementById("autore").value;
	var año = document.getElementById("año").value;
	var editorial = document.getElementById("editorial").value;
	var descripcion = document.getElementById("descripcion").value;
	var mensaje = document.getElementById("mensaje").value;

	
	if(verificarDatos()){
		enviaRegistro(titulo,autore,año,editorial,descripcion,mensaje);
	}
}

//METODOS

function verificarDatos(){
	var titulo = document.getElementById("titulo").value;
	
	if(titulo.trim().length == ' '){
		alert('Por favor digite un valor correcto para el nombre del titulo');
		return false;
	}

	return true;
}

function enviaRegistro(titulo,autore,año,editorial,descripcion,mensaje){
	var carta = new XMLHttpRequest();
	//2. (POST) Configurar: Privacidad, Dirección
	carta.open("POST","crearTrueque.php",true);
	//2.5 (POST) Configurar: Encabezado HTTP
	carta.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	//3. (POST) Envío con Mensaje ( Parámetros )
	carta.send("titulo=" + titulo + "&autore=" + autore + "&año=" + año + "&editorial=" + editorial +"&descripcion=" + descripcion +"&mensaje=" + mensaje );
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
				alert("ERROR al intentar registrar el cambio en la Base de Datos");
			}else if(respuesta == "OK"){
				alert("El registro fue almacenado exitosamente en la Base de Datos");
				window.location.href = "index.html";
			}
		}
	}
}
	