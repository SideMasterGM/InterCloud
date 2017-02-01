<?php
	$fn = "../../../config/Config.tcb";
	include ("../../../config/connect_server/ic.connect_server.php");

	class Services {
		var $NetworkState;
		var $MySQLState;
		var $ApacheState;

		#Hace referencia a la conexión al servidor.
		public $IC;
		public $X;

		function Load($IC, $X){
			$this->IC = $IC; #Se asigna una referencia que conecta con el servidor.
			$this->X  = $X;  #Se asigna el prefijo de tablas.

			$GetData = $this->IC->query("SELECT name, state FROM ".$X."services;");

			if ($GetData->num_rows > 0){
				$data = [];

				while ($GD = $GetData->fetch_array(MYSQLI_ASSOC))
					$data += [$GD['name'] => $GD['state']];

				$this->NetworkState = $data['Network'];
				$this->MySQLState 	= $data['MySQL'];
				$this->ApacheState 	= $data['Apache'];
			} else {
				echo "No hay datos";
			}
		}

		function Prueba(){
			return $this->IC;
		}

		// function State($svc, $state){
		// 	if ($svc == "Apache"){
		// 		echo "Se ha escrito Apache";
		// 		$this->ApacheState = $state;
		// 	} else if ($svc == "Network"){
		// 		echo "Se ha escrito Network";
		// 		$this->NetworkState = $state;
		// 	} else if ($svc == "MySQL"){
		// 		echo "Se ha escrito MySQL";
		// 		$this->MySQLState = $state;
		// 	} else {
		// 		echo "Error en la lectura del servicio";
		// 	}
		// }
	}

	class Network extends Services {
		function Add($name, $pass){

		}

		function Delete($id){

		}

		function History($order){

		}

		function OnHistory($id){

		}

		function ShowDetail(){

		}

		function OnMain($state){

		}
	}

	class SMySQL extends Services {
		function StateAssign($state){

			#Aún no he podido pasar la conexión a distintos métodos que son derivados...

			$windows = new Services();
			if ($windows->IC){
				echo "Si hay";
			} else {
				echo "No hay";
			}

			$this->MySQLState = $state;
		}
	}

	class SApache extends Services {
		function StateAssign($state){
			$this->ApacheState = $state;
		}
	}

	$Services 	= new Services();
	$SApache 	= new SApache();

	#Se cargan los datos registrados
	$Services->Load($IC, $X);

	//echo $Services->MySQLState;
	
	$SMySQL 	= new SMySQL();
	$SMySQL->StateAssign($_GET['state']);
	//echo $SMySQL->MySQLState;	
	//echo "Estado nuevo: ".$SMySQL->MySQLState;

	//$Services->State($_GET['svc'], $_GET['state']);

?>