<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include ("app/core/head.php"); ?>
	</head>
	<body class="external-page sb-l-c sb-r-c">
		<?php
			$inst = "app/config/install";

			$fn = "app/config/Config.tcb";
			include ("app/config/connect_server/connect_server.php");

			if (file_exists($fn)){
				// echo "Uno";
				if ($error == true){
					// echo "Dos: ";
					$CodeError = @$TCB->connect_errno;
					$MessageError = @$TCB->connect_error;
					
					// if ($CodeError == 1045){
					// 	echo "Problema con la credencial: ".$MessageError;
					// }

					if ($CodeError == 1049){
						// echo "Tres";
						$ArrayError = explode("'", $MessageError);

						if (file_exists($inst)){
							// echo "Cuatro";
							include ("app/config/install/view/InstallDesign.php");

							if ($ArrayError[0] == "Unknown database "){
								include ("app/graphic/message.unknowndb.php");
							}
						} else {
							// echo "Cinco";
							@exec("start notepad ".$fn);
							header("Location: ./");
						}
					}

					if ($CodeError == 2002){ //Error de Host

						if (file_exists($inst)){
							// echo "Cuatro";
							include ("app/config/install/view/InstallDesign.php");

							if ($ArrayError[0] == "Unknown database "){
								include ("app/graphic/message.unknowndb.php");
							}
						} else {
							// echo "Seis";
							@exec("start notepad ".$fn);
							header("Location: ./");
						}

					}


				} else {
					// echo "Siete";
					$URoot = $TCB->query("SELECT * FROM ".$X."root;");

					if (@$URoot->num_rows != 0){
						$RAdmin = $TCB->query("SELECT * FROM ".$X."admin;");

						if (@$RAdmin->num_rows > 0){
							
							$GetSessions = "SELECT * FROM ".$X."user_sessions WHERE ip='".getIpAddr()."' AND remember='1' ORDER BY id DESC LIMIT 1;";
							$RGetSession = $TCB->query($GetSessions);
							
							if (@$RGetSession->num_rows > 0){
								@$GameResult = $RGetSession->fetch_array(MYSQLI_ASSOC);
								
								if ($GameResult['stop'] == "/"){
									include ("app/graphic/LoginDesign.php");
								} else {
									include ("app/graphic/ScreenLock.php");
								}
							} else {
								include ("app/graphic/LoginDesign.php");
							}
						} else {
							include ("app/graphic/RunLogUser.php");
						}
					} else {
						// echo "Ocho";
						include ("app/config/connect_server/InstallDB.php");
						header("Location: ./");
					}
				}
			} else {
				// echo "Nueve";
				if (file_exists($inst)){
					// echo "Diez";
					include ("app/config/install/view/InstallDesign.php");
				} else {
					// echo "Once";
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