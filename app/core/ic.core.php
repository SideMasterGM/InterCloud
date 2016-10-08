<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			include ($_SERVER['DOCUMENT_ROOT']."/app/core/ic.const.php"); 
			include (PF_CORE_HEAD); 
		?>
	</head>
	<body class="external-page sb-l-c sb-r-c">
		<?php
			include (PF_CONNECT_SERVER);
			include ("app/controller/php/ic.config.class.php");

			$Config = new ConfigFile();

			if (file_exists(PF_CONFIG)){
				if ($error == true){
					$CodeError = @$TCB->connect_errno;
					$MessageError = @$TCB->connect_error;
					
					if ($CodeError == 1049){
						$ArrayError = explode("'", $MessageError);

						if (file_exists(PD_INSTALL)){
							include (PD_INSTALL_VIEW."/ic.InstallDesign.php");

							if ($ArrayError[0] == "Unknown database ")
								include (PD_GRAPHIC."/ic.message.unknowndb.php");
						} else {
							@exec("start notepad ".PF_CONFIG);
							header("Location: ./");
						}
					}

					if ($CodeError == 2002){ //Error de Host
						if (file_exists(PD_INSTALL)){
							include (PD_INSTALL_VIEW."/ic.InstallDesign.php");

							if ($ArrayError[0] == "Unknown database ")
								include (PD_GRAPHIC."/ic.message.unknowndb.php");
						} else {
							@exec("start notepad ".PF_CONFIG);
							header("Location: ./");
						}
					}
				} else {
					$URoot = $TCB->query("SELECT * FROM ".$X."root;");

					if (@$URoot->num_rows != 0){
						$RAdmin = $TCB->query("SELECT * FROM ".$X."admin;");

						if (@$RAdmin->num_rows > 0){
							$GetSessions = "SELECT * FROM ".$X."user_sessions WHERE ip='".$Config->getIpAddr()."' AND remember='1' ORDER BY id DESC LIMIT 1;";
							$RGetSession = $TCB->query($GetSessions);
							
							if (@$RGetSession->num_rows > 0){
								@$GameResult = $RGetSession->fetch_array(MYSQLI_ASSOC);
								
								if ($GameResult['stop'] == "/")
									include (PD_GRAPHIC."/ic.LoginDesign.php");
								else
									include (PD_GRAPHIC."/ic.ScreenLock.php");

							} else {
								include (PD_GRAPHIC."/ic.LoginDesign.php");
							}
						} else {
							include (PD_GRAPHIC."/ic.RunLogUser.php");
						}
					} else {
						include (PF_INSTALLDB);
						header("Location: ./");
					}
				}
			} else {
				if (file_exists(PD_INSTALL)){
					include (PD_INSTALL_VIEW."/ic.InstallDesign.php");
				} else {
					$Config->CFC(PF_CONFIG);
					@exec("start notepad ".PF_CONFIG);
					sleep(1);
					header("Location: ./");
				}
			}
		?>
	</body>
</html>