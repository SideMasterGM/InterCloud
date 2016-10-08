<?php
	/*Se incluye el fichero que contiene las constantes, listas para ser llamadas*/
	include ($_SERVER['DOCUMENT_ROOT']."/app/core/ic.const.php");

	/*Se incluye una clase que contiene los métodos necesarios para realizar las operaciones de configuración*/
	include (PD_CONTROLLER_PHP."/ic.config.class.php");
	
	$Config = new ConfigFile();
	$Config->CreateFile(PF_CONFIG, $_POST);
	$Config->ConfirmFile(PF_CONFIG);
	
	/*Se hace la conexión al servidor y se crean las tablas en la base de datos*/
	include (PF_CONNECT_SERVER);
	include (PF_INSTALLDB);

	if ($error == false)
		echo "OK";
	else if ($error == true)
		echo "Error";

?>