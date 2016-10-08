<?php
	//Author: Jerson Martínez (Side Master)
	//PD = Path Directory
	//PF = Path File

	$Path = @$_SERVER['DOCUMENT_ROOT'];

	define ("PD_INDEX", $Path."/");
	define ("PD_APP", $Path."/app");

	define ("PD_CONFIG", $Path."/app/config");
		define ("PD_CONNECT_SERVER", $Path."/app/config/connect_server/");
			define ("PF_CONNECT_SERVER", $Path."/app/config/connect_server/ic.connect_server.php");
			define ("PF_INSTALLDB", $Path."/app/config/connect_server/ic.InstallDB.php");
		define ("PF_CONFIG", $Path."/app/config/Config.tcb");

	define ("PD_CONTROLLER", $Path."/app/controller");
		define ("PD_CONTROLLER_JS", $Path."/app/controller/js");
		define ("PD_CONTROLLER_PHP", $Path."/app/controller/php");
	
	define ("PD_CORE", "/app/core");
		define ("PD_CORE_SERVICES", $Path."/app/core/Services");
		
		define ("PF_CORE", $Path."/app/core/ic.core.php");
		define ("PF_DESKTOP", $Path."/app/core/ic.desktop.php");
		
	define ("PD_DESKTOP", $Path."/app/Desktop");
	define ("PD_GRAPHIC", $Path."/app/graphic");
	define ("PD_SRC", $Path."/app/src");
?>