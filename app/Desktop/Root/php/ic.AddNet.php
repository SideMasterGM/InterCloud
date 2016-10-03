<?php
	$fn = "../../../config/Config.tcb";
	include ("../../../config/connect_server/ic.connect_server.php");

	if ($TCB->query("SELECT * FROM ".$X."network WHERE name='".$_POST['netname']."' AND pass='".$_POST['keypass']."';")->num_rows > 0){
		//Nathing...
	} else {
		$Q = "INSERT INTO ".$X."network (id, name, pass, allow) VALUES ('','".$_POST['netname']."','".$_POST['keypass']."', '0');";

		if ($TCB->query($Q))
			echo "OK";
	}

?>