<?php
	class ConfigFile {

		public function CreateFile($fn, $_POST[]){
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


	}
?>