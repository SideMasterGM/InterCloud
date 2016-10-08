<?php
	include ($_SERVER['DOCUMENT_ROOT']."/app/core/ic.const.php");
	$fn = PF_CONFIG;

	CreateFile($fn);
	ConfirmFile($fn);

	function CreateFile($fn){
		touch($fn);
		chmod($fn, 0744);

		$MyFile = @fopen($fn, "w");
		fwrite($MyFile, $_POST['host'].PHP_EOL);
		fwrite($MyFile, $_POST['username'].PHP_EOL);
		fwrite($MyFile, $_POST['password'].PHP_EOL);
		fwrite($MyFile, $_POST['database'].PHP_EOL);
		fwrite($MyFile, $_POST['prefix']);

		fclose($MyFile);

		return;
	}

	function ConfirmFile($fn){
		if (file_exists($fn)){
			if (!is_readable($fn) && !is_writable($fn)){
				CreateFile($fn);
			} else {
				$error = false;
			}
		} else {
			CreateFile($fn);
		}
	}

	include ("../connect_server/ic.connect_server.php");
	include ("../connect_server/ic.InstallDB.php");

	if ($error == false)
		echo "OK";
	else if ($error == true)
		echo "Error";

?>