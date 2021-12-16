
document.getElementById('formulario').addEventListener('submit', function(e){

	e.preventDefault();

	let formulario = new FormData(document.getElementById('formulario'));

	fetch('prueba.php', {
		method: 'POST',
		body: formulario
	})
	.then(res => res.json())
	.then(data => {
		if(data== 'true'){
			document.getElementById('titulo').value = '';
			document.getElementById('año').value = '';
			document.getElementById('autore').value = '';
			document.getElementById('isbn').value = '';
			document.getElementById('genero').value = '';
			document.getElementById('idioma').value = '';
			document.getElementById('editorial').value = '';
			document.getElementById('descripcion').value = '';

			alert('El trueque se inserto correctamente.');

		}else{
			console.log(data);
		}
	})
});










/*console.log('funciona');

function almacenarTrueque() {
	var titulo = document.getElementById("titulo").value;
	var año = document.getElementById("año").value;
	var autore = document.getElementById("autore").value;
	var isbn = document.getElementById("isbn").value;
	var genero = document.getElementById("genero").value;
	var idioma = document.getElementById("idioma").value;
	var editorial = document.getElementById("editorial").value;
	var descripcion = document.getElementById("descripcion").value;
	
	if(verificarDatos()){
		enviaRegistro(titulo, año, autore,isbn, genero, idioma,editorial,descripcion);
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

function enviaRegistro(titulo, año, autore,isbn, genero, idioma,editorial,descripcion){
	var carta = new XMLHttpRequest();
	//2. (POST) Configurar: Privacidad, Dirección
	carta.open("POST","crearTrueque.php",true);
	//2.5 (POST) Configurar: Encabezado HTTP
	carta.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	//3. (POST) Envío con Mensaje ( Parámetros )
	carta.send("&titulo=" + titulo + "&año=" + año +"&autore=" + autore + "&isbn=" + isbn + "&genero=" + genero + "&idioma=" + idioma + "&editorial=" + editorial +"&descripcion=" + descripcion);
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
				window.location.href = "contact.html";
				alert("ERROR al intentar registrar el cambio en la Base de Datos");
			}else if(respuesta == "OK"){
				alert("El registro fue almacenado exitosamente en la Base de Datos");
				window.location.href = "index.html";
			}
		}
	}
}
	*/