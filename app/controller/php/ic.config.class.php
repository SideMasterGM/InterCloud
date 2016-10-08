<?php
	#Author: Jerson Martínez (Side Master)

	class ConfigFile {

		public function CreateFile($fn, $data){
			/*Se crea el fichero*/
			touch($fn);

			/*Se le asignan permisos al fichero
			0-rwx-r-x-r-x*/
			chmod($fn, 0744);

			/*Puntero de tipo fichero, $MyFile apunta al fichero*/
			$MyFile = @fopen($fn, "w");

			/*Se tiene un modo escritura, se escriben
			los datos que me enviaron del formulario.*/
			fwrite($MyFile, $data['host'].PHP_EOL);
			fwrite($MyFile, $data['username'].PHP_EOL);
			fwrite($MyFile, $data['password'].PHP_EOL);
			fwrite($MyFile, $data['database'].PHP_EOL);
			fwrite($MyFile, $data['prefix']);

			/*Se cierra el fichero*/
			fclose($MyFile);

			return;
		}

		public function ConfirmFile($fn){
			/*Se verifica que el fichero exista*/
			if (file_exists($fn)){
				/*Si no se puede leer o no se puede escribir
				entonces que intenten crear el fichero nuevamente.*/
				if (!is_readable($fn) && !is_writable($fn)){
					$this->CreateFile($fn);
				} else {
					$error = false;
				}
			} else {
				$this->CreateFile();
			}

			/*Si todo va bien, entonces $error tiene un valor falso,
			indicando que no hay error.*/
		}

	}
?>