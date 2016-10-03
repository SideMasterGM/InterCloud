<?php
	$fn = "../../config/Config.tcb";
	include ("../../config/connect_server/ic.connect_server.php");

	$UN = $_POST['tmp_username'];
	$PW = $_POST['tmp_password'];

	$PW = password_hash($PW, PASSWORD_DEFAULT);

	$AdminInfo = "INSERT INTO ".$X."admin_info (username, date_log, date_log_unix) VALUES ('".$UN."','".date('Y-n-j')."','".time()."');";

	$Admin = "INSERT INTO ".$X."admin (username, password) VALUES ('".$UN."','".$PW."');";

	if ($TCB->query($AdminInfo)){
		if ($TCB->query($Admin)){
			echo "OK";
		}
	}
?>