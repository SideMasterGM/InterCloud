<?php
	class InterCloud extends mysqli {
		public function __construct($host, $user, $pass, $db){
			@parent::__construct($host, $user, $pass, $db);
		}
	}

	$t = isset($fn) ? $fn : "../Config.tcb";
	$error = false;

	if (file_exists($t)){
		$ArrayFileConfig = file($t);
		
		$H = rtrim($ArrayFileConfig[0]);
		$U = rtrim($ArrayFileConfig[1]);
		$P = rtrim($ArrayFileConfig[2]);
		$D = rtrim($ArrayFileConfig[3]);
		$X = rtrim($ArrayFileConfig[4]);

		if (strlen($H) == 12){
			$H = substr($H, 3);
		}

		@$TCB = new InterCloud($H, $U, $P, $D);
		
		if (@$TCB->connect_error){
			$error = true;
		} else {
			$error = false;
			
			if ($X != "")
				$X .= "_";
			
			if (!@$TCB->query("SET NAMES 'utf8'"))
				$error = true;
			else
				$error = false;
		}

	} else {
		$error = true;
	}
?>