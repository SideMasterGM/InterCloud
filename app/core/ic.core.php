<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include ("app/core/ic.head.php"); ?>
	</head>
	<body class="external-page sb-l-c sb-r-c">
		<?php
			$inst = "app/config/install";

			$fn = "app/config/Config.tcb";
			include ("app/config/connect_server/ic.connect_server.php");

			if (file_exists($fn)){
				if ($error == true){
					$CodeError = @$TCB->connect_errno;
					$MessageError = @$TCB->connect_error;
					
					if ($CodeError == 1049){
						$ArrayError = explode("'", $MessageError);

						if (file_exists($inst)){
							include ("app/config/install/view/ic.InstallDesign.php");

							if ($ArrayError[0] == "Unknown database ")
								include ("app/graphic/ic.message.unknowndb.php");
						} else {
							@exec("start notepad ".$fn);
							header("Location: ./");
						}
					}

					if ($CodeError == 2002){ //Error de Host
						if (file_exists($inst)){
							include ("app/config/install/view/ic.InstallDesign.php");

							if ($ArrayError[0] == "Unknown database ")
								include ("app/graphic/ic.message.unknowndb.php");
						} else {
							@exec("start notepad ".$fn);
							header("Location: ./");
						}
					}
				} else {
					$URoot = $TCB->query("SELECT * FROM ".$X."root;");

					if (@$URoot->num_rows != 0){
						$RAdmin = $TCB->query("SELECT * FROM ".$X."admin;");

						if (@$RAdmin->num_rows > 0){
							$GetSessions = "SELECT * FROM ".$X."user_sessions WHERE ip='".getIpAddr()."' AND remember='1' ORDER BY id DESC LIMIT 1;";
							$RGetSession = $TCB->query($GetSessions);
							
							if (@$RGetSession->num_rows > 0){
								@$GameResult = $RGetSession->fetch_array(MYSQLI_ASSOC);
								
								if ($GameResult['stop'] == "/")
									include ("app/graphic/ic.LoginDesign.php");
								else
									include ("app/graphic/ic.ScreenLock.php");

							} else {
								include ("app/graphic/ic.LoginDesign.php");
							}
						} else {
							include ("app/graphic/ic.RunLogUser.php");
						}
					} else {
						include ("app/config/connect_server/ic.InstallDB.php");
						header("Location: ./");
					}
				}
			} else {
				if (file_exists($inst)){
					include ("app/config/install/view/ic.InstallDesign.php");
				} else {
					CFC($fn);
					@exec("start notepad ".$fn);
					sleep(1);
					header("Location: ./");
				}
			}

			function CFC($fn){
				@touch($fn);
				@chmod($fn, 0744);

				$rf = @fopen($fn, "w");
				fwrite($rf, "Host".PHP_EOL);
				fwrite($rf, "Nombre de usuario".PHP_EOL);
				fwrite($rf, "Contraseña".PHP_EOL);
				fwrite($rf, "Nombre de la base de datos".PHP_EOL);
				fwrite($rf, "Prefijo");

				fclose($rf);

				return;
			}

			function getIpAddr(){
		        if (!empty(@$_SERVER['HTTP_CLIENT_IP']))
		            return @$_SERVER['HTTP_CLIENT_IP'];
		        else if (!empty(@$_SERVER['HTTP_X_FORWARDED_FOR']))
		            return @$_SERVER['HTTP_X_FORWARDED_FOR'];
		        return @$_SERVER['REMOTE_ADDR'];
		    }
			
		?>
	</body>
</html>