<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			#Inclusión de constantes que contienen las rutas de acceso.
			include ($_SERVER['DOCUMENT_ROOT']."/app/core/ic.const.php"); 

			#Se agrega el head del core, utilizando la constante PF_CORE_HEAD.
			include (PF_CORE_HEAD); 
		?>
	</head>
	<body class="external-page sb-l-c sb-r-c">
		<?php

			#Se incluye el fichero de conexión, siguiendo la clase ConfigFile.
			include (PF_CONNECT_SERVER);
			include (PD_CONTROLLER_PHP."/ic.config.class.php");

			$Config = new ConfigFile(); #Instancia de la clase ConfigFile

			#Verificación de la existencia del fichero de configuración. 
			if (file_exists(PF_CONFIG)){

				#Verificar si existen errores, la variable error es originaria de 
				# el fichero de conexión.
				if ($error == true){
					$CodeError = @$TCB->connect_errno;
					$MessageError = @$TCB->connect_error;
					
					#Código de error 1049: La base de datos desconocida.
					if ($CodeError == 1049){
						$ArrayError = explode("'", $MessageError);

						#Verificación de la existencia del directorio install/
						if (file_exists(PD_INSTALL)){

							#Instalación en modo gráfico
							include (PD_INSTALL_VIEW."/ic.InstallDesign.php");

							#Ventana modal que anuncia el problema.
							if ($ArrayError[0] == "Unknown database ")
								include (PD_GRAPHIC."/ic.message.unknowndb.php");
						} else {
							#Instalación manual en modo texto.
							@exec("start notepad ".PF_CONFIG);
							header("Location: ./");
						}
					}

					#Código de error 2002: Host desconocido
					if ($CodeError == 2002){

						#Se hacen las misma verificaciones que en la condicional
						#anterior, elección de instalación en modo gráfico o texto.
						if (file_exists(PD_INSTALL)){
							include (PD_INSTALL_VIEW."/ic.InstallDesign.php");

							#Este punto incompleto, debe crear una ventana modal que
							#anuncie el problema con respecto al código de error.
							if ($ArrayError[0] == "Unknown database ")
								include (PD_GRAPHIC."/ic.message.unknowndb.php");
						} else {
							@exec("start notepad ".PF_CONFIG);
							header("Location: ./");
						}
					}
				} else {
					#En caso de haber llegado hasta acá siginifica que el fichero de
					#configuración no existe.

					#Consulta todos los datos de la tabla con el privilegio root.
					$URoot = $TCB->query("SELECT * FROM ".$X."root;");

					#En caso de hayan filas.
					if (@$URoot->num_rows != 0){

						#Consulta todos los datos de la tabla con el privilegio admin.
						$RAdmin = $TCB->query("SELECT * FROM ".$X."admin;");

						#En caso de que hayan registros.
						if (@$RAdmin->num_rows > 0){

							#Cadena que contiene una consulta de base de datos que será ejecutada 
							#en la próxima intrucción.
							$GetSessions = "SELECT * FROM ".$X."user_sessions WHERE ip='".$Config->getIpAddr()."' AND remember='1' ORDER BY id DESC LIMIT 1;";

							#Consulta todos los datos de la tabla user_sessions donde la 
							#la dirección IP es igual a la actual y con la sesión en memoria, ordenándolo por
							#el atributo ID de forma descendente, limitando los datos a 1 registro.
							$RGetSession = $TCB->query($GetSessions);
							
							#Verificar si existe el registro.
							if (@$RGetSession->num_rows > 0){

								#Extraer columnas de las filas por medio de los atributos, 
								#con un array asociativo.
								@$GameResult = $RGetSession->fetch_array(MYSQLI_ASSOC);
								
								#Se verifica la columna stop de la fila obtenida si es igual a /.
								#El simbolo (/) en esta columna significa que se ha cerrado la sesión recordada.
								if ($GameResult['stop'] == "/")
									include (PD_GRAPHIC."/ic.LoginDesign.php");
								else
									include (PD_GRAPHIC."/ic.ScreenLock.php");
								#En caso de no tener (/) significa que aún sigue el usuario recordado en la máuqina.

							} else {
								#No hay sesión recordada. Por lo tanto, se muestra la vista del formulario de login.
								include (PD_GRAPHIC."/ic.LoginDesign.php");
							}
						} else {
							#En caso de que no haya registro de administrador, se muestra un formulario
							#donde puede registrar el primero. Esto será solo una vez.
							include (PD_GRAPHIC."/ic.RunLogUser.php");
						}
					} else {
						#En caso de que no exista el usuario Root, se mostrará nuevamente el 
						#formulario de instalación, de esta forma, los datos de usuario Root se registrarán.
						include (PF_INSTALLDB);
						header("Location: ./");
					}
				}
			} else {
				#El fichero de instalación no existe y se verifica el directorio install/
				if (file_exists(PD_INSTALL)){
					#Si este existe, se muestra la instalación en modo gráfico.
					include (PD_INSTALL_VIEW."/ic.InstallDesign.php");
				} else {
					#El fichero y el directorio no existen, la instalación 
					#procede a hacerse manualmente en modo texto.

					#Se crea el fichero Config.tcb y se guardan datos por defecto.
					$Config->CFC(PF_CONFIG);

					#Ejecuta el fichero para reemplazar el contenido inútil por la configuración.
					@exec("start notepad ".PF_CONFIG);

					#Se duerme por 1 segundo y recarga la raíz.
					sleep(1);
					header("Location: ./");
				}
			}
		?>
	</body>
</html>