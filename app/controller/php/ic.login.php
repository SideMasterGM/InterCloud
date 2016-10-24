<?php
	$Val = false;
	$un = trim($_POST['username']);
	$pw = trim($_POST['password']);
	$tb = trim($_POST['privilege']);

	if (isset($_POST['remember']))
		$rm = 1;

	$password_crypt = password_hash($pw, PASSWORD_DEFAULT);
	if (!get_magic_quotes_gpc())
		$un = addslashes($un);

	#Importar constantes.
	$Local = $_SERVER['DOCUMENT_ROOT']."/".explode("/", $_SERVER['REQUEST_URI'])[1]."/app/core/ic.const.php";

	if (!file_exists($Local))
		$Local = $_SERVER['DOCUMENT_ROOT']."/app/core/ic.const.php";
	
	include ($Local);
	include (PF_CONNECT_SERVER);
	include (PD_CONTROLLER_PHP."/ic.security.php");

	$un = $IC->real_escape_string($un);

	if ($tb == ""){
		$Val = false;
	} else {
		$Query = "SELECT * FROM ".$X.$tb." WHERE username='".$un."';";
		$R = $IC->query($Query);
		
		@session_start();
		while (@$Check = $R->fetch_array(MYSQLI_ASSOC)){
			if (password_verify($pw, $Check['password'])){
				@$_SESSION['login'] = true;
				@$_SESSION['p'] = $tb;
				@$_SESSION['username'] = $un;
				$Val = true;
			}
		}
	}

	if ($Val == true){
		$InSession = "INSERT INTO ".$X."user_sessions (id, usr, ip, remember, stop, date_log, date_log_unix) VALUES ('','".@$_SESSION['username']."','".getIpAddr()."','".@$rm."', '','".date('Y-n-j')."','".time()."');";
		if ($IC->query($InSession)){
			echo "OK";
		}
	} else {
		echo "Error";
	}
	
	function getIpAddr(){
        if (!empty(@$_SERVER['HTTP_CLIENT_IP']))
            return @$_SERVER['HTTP_CLIENT_IP'];
        else if (!empty(@$_SERVER['HTTP_X_FORWARDED_FOR']))
            return @$_SERVER['HTTP_X_FORWARDED_FOR'];
        return @$_SERVER['REMOTE_ADDR'];
    }
?>