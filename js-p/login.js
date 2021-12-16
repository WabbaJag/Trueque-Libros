

function ingresar(){
	//console.log("Ingresar");
	var usuario = document.getElementById("campoUsuario");
	var clave = document.getElementById("campoClave");

	console.log("U:"+usuario.value+"\nP:"+clave.value);
	enviarDatosLogin(usuario.value,clave.value);
}


function enviarDatosLogin(user,pass){
	console.log("ENVIAR:"+user+"--"+pass);
	//Enviar datos - Funciones de XMLHttpRequest
	//1. Crear: Comprar el sobre
	var carta = new XMLHttpRequest();
	//2. Configurar: Privacidad, Dirección y Mensaje
	carta.open("GET","login.php?un="+user+"&up="+pass,true);
	//3. Envío: 
	carta.send(null);

	//Recibir respuesta del servidor - Atributos de XMLHttpRequest
	carta.onreadystatechange = function() {
		if(carta.readyState == 4 && carta.status == 200){

			parrafoInfo.setAttribute("class","parrafoError");
			parrafoInfo.setAttribute("data-categoría","info");
			var mensaje = "";
			
			switch(carta.responseText){
				case "ERROR":
					mensaje = "Error de Conexión";
				break;
				case "NOCLAVE":
					mensaje = "Clave incorrecta";
				break;
				case "NOUSUARIO":
					mensaje = "El usuario no se encuentra";
				break;
				case "OK":
					window.location.href = "index.html";
				break;
			}

			document.getElementById("parrafoInfo").innerHTML = mensaje;
		}
	}
}

function verificar(){
	var usuarioNombre = document.getElementById("campoUsuario").value;
	
	var parrafoInfo = document.getElementById("parrafoInfo");
	var botonIngresar = document.getElementById("botonLogin");

	if(usuarioNombre.length == 0){
		document.getElementById("parrafoInfo").innerHTML = "";
		parrafoInfo.removeAttribute("class");
		botonIngresar.style.visibility = "visible";
	}

	if(usuarioNombre.length >= 8){
		document.getElementById("parrafoInfo").innerHTML = "Usuario OK";
		parrafoInfo.setAttribute("class","parrafoOK");
		console.log(parrafoInfo.getAttribute("class"));
		botonIngresar.style.visibility = "visible";
	}

	if(parrafoInfo.dataset.categoría == "info"){
		parrafoInfo.classList.add("parrafoSI");
	}

	}