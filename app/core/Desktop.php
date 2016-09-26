<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include ("app/core/head.php"); ?>
	</head>
		<?php
			if (@$_SESSION['p'] == "root")
				include ("app/Desktop/Root/main.php");
			else if (@$_SESSION['p'] == "admin")
				include ("app/Desktop/Administrador/main.php");
			else if (@$_SESSION['p'] == "master")
				include ("app/Desktop/Master/main.php");
			else if (@$_SESSION['p'] == "student")
				include ("app/Desktop/Estudiante/main.php");
			else if (@$_SESSION['p'] == "tutor")
				include ("app/Desktop/Tutor/main.php");
		?>
</html>
