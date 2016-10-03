<?php
	if (@chmod("../config/Config.tcb", 0744)){
		if (@unlink("../config/Config.tcb")){
			echo "OK";
		}
	}
?>