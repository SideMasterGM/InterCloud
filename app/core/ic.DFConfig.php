<?php
	#Se incluye el fichero de constantes.
	include ($_SERVER['DOCUMENT_ROOT']."/".explode("/", $_SERVER['REQUEST_URI'])[1]."/app/core/ic.const.php");

	#Cambiamos el modo a rwx-r---r--
	if (@chmod("../config/Config.tcb", 0744)){
		#Se elimina el fichero de configuración
		if (@unlink(PF_CONFIG)){
			echo "OK"; //En caso de que se haya eliminado con éxito, se devuelve OK.
		}
		//En caso contrario no pasa nada.
	}
?>