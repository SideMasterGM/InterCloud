<?php
	#Capture the user and IP address in the start session.
	#Add the datas in a table.
	#Indentify the datas in the login.php, try captured.

	#Creo la función para extraer la IP, a partir de aquí se estarán agregando a una clase de seguridad.

	$IpAddr = getIpAddr();

	$Resp = $IC->query("SELECT * FROM ".$X."control_user WHERE ip='".$IpAddr."' usr='".$un."' LIMIT 1 ORDER BY id DESC;");
	if ($Resp->num_rows > 0){
		if ($Resp->fetch_array(MYSQLI_ASSOC)['count'] == 3){
			
		}
	}

	function getIpAddr(){
		#Verificación IP de la variable global de servidor HTTP_CLIENT_IP
		#En caso de no estar vacía, retorna esa dirección IP.

		#En caso que HTTP_X_FORWARDED_FOR no esté vacía se retorna la dirección IP.

        if (!empty(@$_SERVER['HTTP_CLIENT_IP']))
            return @$_SERVER['HTTP_CLIENT_IP'];
        else if (!empty(@$_SERVER['HTTP_X_FORWARDED_FOR']))
            return @$_SERVER['HTTP_X_FORWARDED_FOR'];

        #Si ha llegado hasta acá, re retorna la dirección IP que contiene REMOTE_ADDR.
        return @$_SERVER['REMOTE_ADDR'];
    }
?>