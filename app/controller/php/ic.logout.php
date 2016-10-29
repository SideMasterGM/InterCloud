<?php
	@session_start();

	include ($_SERVER['DOCUMENT_ROOT']."/".explode("/", $_SERVER['REQUEST_URI'])[1]."/app/core/ic.const.php");

	$Q = "INSERT INTO ".$_SESSION['prefix']."control_logout (id, usr, ip, date_log, date_log_unix) VALUES ('','".$_SESSION['username']."','".."','','');";

	@session_destroy();
	header("Location: ".PD_INDEX);
?>