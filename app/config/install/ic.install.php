<?php
	$fn = "../Config.tcb";

	if (file_exists($fn)){
		if (!is_readable($fn) && !is_writable($fn)){
			CreateFile($fn);
		}
	} else {
		CreateFile($fn);
	}

	function ReadFileNow($fn){
		$i = 0;
		$gestor = @fopen($fn, "r");
		if ($gestor) {
			$Lines = array();
		    while (($búfer = fgets($gestor, 4096)) !== false) {
		        $Lines[$i] = trim($búfer);
		    	$i++;
		    }
		    if (!feof($gestor)) {
		        echo "Error: fallo inesperado de fgets()\n"; 
		    }
		    @fclose($gestor);
		}
		return @$Lines;
	}

	function CreateFile($fn){
		@touch($fn);
		@chmod($fn, 0777);

		return;
	}
?>