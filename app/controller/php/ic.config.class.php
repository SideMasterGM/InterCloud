<?php
	class ConfigFile {

		public function CreateFile($fn, $data){
			touch($fn);
			chmod($fn, 0744);

			$MyFile = @fopen($fn, "w");
			fwrite($MyFile, $data['host'].PHP_EOL);
			fwrite($MyFile, $data['username'].PHP_EOL);
			fwrite($MyFile, $data['password'].PHP_EOL);
			fwrite($MyFile, $data['database'].PHP_EOL);
			fwrite($MyFile, $data['prefix']);

			fclose($MyFile);

			return;
		}

		public function ConfirmFile($fn){
			if (file_exists($fn)){
				if (!is_readable($fn) && !is_writable($fn)){
					$this->CreateFile($fn);
				} else {
					$error = false;
				}
			} else {
				$this->CreateFile();
			}
		}

	}
?>