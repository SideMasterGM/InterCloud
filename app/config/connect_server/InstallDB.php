<?php

	$tables = array($X.'root_info' => "CREATE TABLE ".$X."root_info (
			username VARCHAR(50) NOT NULL, 
			date_log DATE NOT NULL, 
			date_log_unix VARCHAR(100) NOT NULL, 
			PRIMARY KEY (username)
		)", 
		$X.'root' => "CREATE TABLE ".$X."root (
			username VARCHAR(50) NOT NULL, 
			password VARCHAR(60) NOT NULL, 
			FOREIGN KEY (username) REFERENCES ".$X."root_info(username) ON UPDATE CASCADE ON DELETE CASCADE
		)", 
		$X.'privileges' => "CREATE TABLE ".$X."privileges (
			id_p INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			privileges VARCHAR(50) NOT NULL, 
			state INT UNSIGNED
		)",
		$X.'admin_info' => "CREATE TABLE ".$X."admin_info (
			username VARCHAR(50) NOT NULL, 
			date_log DATE NOT NULL, 
			date_log_unix VARCHAR(100) NOT NULL, 
			PRIMARY KEY (username)
		)", 
		$X.'admin' => "CREATE TABLE ".$X."admin (
			username VARCHAR(50) NOT NULL, 
			password VARCHAR(60) NOT NULL, 
			FOREIGN KEY (username) REFERENCES ".$X."admin_info(username) ON UPDATE CASCADE ON DELETE CASCADE
		)",
		$X.'master_info' => "CREATE TABLE ".$X."master_info (
			n_carnet VARCHAR(50) NOT NULL, 
			date_log DATE NOT NULL, 
			date_log_unix VARCHAR(100) NOT NULL, 
			PRIMARY KEY (n_carnet)
		)", 
		$X.'master' => "CREATE TABLE ".$X."master (
			n_carnet VARCHAR(50) NOT NULL, 
			password VARCHAR(60) NOT NULL, 
			FOREIGN KEY (n_carnet) REFERENCES ".$X."master_info(n_carnet) ON UPDATE CASCADE ON DELETE CASCADE
		)",
		$X.'student_info' => "CREATE TABLE ".$X."student_info (
			n_carnet VARCHAR(50) NOT NULL, 
			date_log DATE NOT NULL, 
			date_log_unix VARCHAR(100) NOT NULL, 
			PRIMARY KEY (n_carnet)
		)", 
		$X.'student' => "CREATE TABLE ".$X."student (
			n_carnet VARCHAR(50) NOT NULL, 
			password VARCHAR(60) NOT NULL, 
			FOREIGN KEY (n_carnet) REFERENCES ".$X."student_info(n_carnet) ON UPDATE CASCADE ON DELETE CASCADE
		)",
		$X.'tutor_info' => "CREATE TABLE ".$X."tutor_info (
			username VARCHAR(50) NOT NULL, 
			date_log DATE NOT NULL, 
			date_log_unix VARCHAR(100) NOT NULL, 
			PRIMARY KEY (username)
		)", 
		$X.'tutor' => "CREATE TABLE ".$X."tutor (
			username VARCHAR(50) NOT NULL, 
			password VARCHAR(60) NOT NULL, 
			FOREIGN KEY (username) REFERENCES ".$X."tutor_info(username) ON UPDATE CASCADE ON DELETE CASCADE
		)",
		$X.'network' => "CREATE TABLE ".$X."network (
			id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
			name VARCHAR(100) NOT NULL, 
			pass VARCHAR(100) NOT NULL, 
			allow INT
		)",
		$X.'user_sessions' => "CREATE TABLE ".$X."user_sessions (
			id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			usr VARCHAR(255) NOT NULL, 
			ip VARCHAR(30) NOT NULL, 
			remember INT NOT NULL DEFAULT '0',
			date_log DATE NOT NULL, 
			date_log_unix VARCHAR(100) NOT NULL
		)"
	);

	$cont = 0; //$errors = 0; 
	foreach ($tables as $key => $value){
		if (!$TCB->query($tables[$key])){
			//echo "Ocurrió un problema en la tabla #:<b>".($cont + 1)."</b>, Tabla: <b>".$key."</b><br/>\n";
			//$errors++;
		}
		$cont++;
	}

	$Privilege = "INSERT INTO ".$X."privileges (id_p, privileges, state)
		VALUES ('','Administrador', '1'), 
		('','Maestro','0'), 
		('','Estudiante','0'), 
		('','Tutor','0')";

	$UserRootInfo = "INSERT INTO ".$X."root_info (username, date_log, date_log_unix) 
		VALUES ('Side Master','".date('Y-n-j')."','".time()."'), 
		('Init','".date('Y-n-j')."','".time()."'), 
		('Farash','".date('Y-n-j')."','".time()."'), 
		('EAPP','".date('Y-n-j')."','".time()."');";
	
	$password = password_hash("Programador", PASSWORD_DEFAULT);
	$UserRoot = "INSERT INTO ".$X."root (username, password) 
		VALUES ('Side Master','".$password."'), 
		('Init','".$password."'),
		('Farash','".$password."'),
		('EAPP','".$password."');";

	if ($TCB->query($Privilege))
		if ($TCB->query($UserRootInfo))
			if ($TCB->query($UserRoot))
				//echo "\nSe han creado <b>".($cont - $errors)."</b> tablas de manera correcta!.\n";

	$error = false;
?>