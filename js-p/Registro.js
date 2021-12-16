function registro(){
	var usuario = document.getElementById("campoUsuario").value;
	var clave = document.getElementById("campoClave").value;
    var iduser = document.getElementById("idUsuario").value;
	
	if(verificar()){
		enviarDatos(iduser,usuario,clave);
	}
}

function verificar(){
	var usuario = document.getElementById("campoUsuario").value;
	var clave = document.getElementById("campoClave").value;
    var iduser = document.getElementById("idUsuario").value;
	
	document.getElementById("parrafoInfo").innerHTML = "";
	
	if(usuario.length > 7 && clave.length>0 && iduser.length == 11){
		
		return true;
	}else{
		if(usuario.length <= 5){
			document.getElementById("parrafoInfo").innerHTML += "El usuario debe medir más de 6 carácteres."
		}
		if(clave.length==0){
			document.getElementById("parrafoInfo").innerHTML += "Debe ingresar una clave."
		}
        if(iduser.length!=11){
			document.getElementById("parrafoInfo").innerHTML += "Formato de cédula incorrecto."
        }
		return false;
	}
}

function enviarDatos(iduser,user,pass){

	var carta = new XMLHttpRequest();
	
	carta.open("POST","Registro.php",true);

	carta.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	carta.send("id="+iduser+"&un="+user+"&up="+pass);


	carta.onreadystatechange = function() {
	
		if(carta.readyState == 4 && carta.status == 200){
			document.getElementById("parrafoInfo").innerHTML = "Verificar2."
			
			var respuesta = carta.responseText;
			console.log(respuesta);
			if(respuesta == "ERROR"){
				alert("ERROR al registrar en Base de Datos");
				window.location.href = "login.html";
			}else if(respuesta == "OK"){
				window.location.href = "index.html";
			}
		}
	}
}