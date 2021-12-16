function solicitarLogout(){
	var carta = new XMLHttpRequest();

	carta.open("GET","logout.php",true);

	carta.send(null);

	carta.onreadystatechange = function() {
		if(carta.readyState == 4 && carta.status == 200){
			
			switch(carta.responseText){
				case "OK":
					alert('Su sesion ha sido cerrada. Será redirigido!')
					window.location.href = "login.html";
				break;
			}
		}
	}
}