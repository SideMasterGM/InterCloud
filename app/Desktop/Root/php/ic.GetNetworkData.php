<?php
	$fn = "../../../config/Config.tcb";
	include ("../../../config/connect_server/ic.connect_server.php");

	$R = $IC->query("SELECT * FROM ".$X."network ORDER BY id DESC LIMIT 1;")->fetch_array();

	?>
		<div class="form-group">
	      <label class="col-sm-4 control-label">Autenticación:</label>
	      <div class="col-sm-30">
	        <p class="form-control-static">WPA2 - Personal</p>
	      </div>
	    </div>

	    <div class="form-group">
	      <label class="col-sm-4 control-label">Modo:</label>
	      <div class="col-sm-30">
	        <p class="form-control-static DataAllow">
	        	Allow / 
	        	<?php 
	        		if ($R['allow'] == 0){
	        			echo "No habilitada";
	        		} else {
	        			echo "Habilitada";
	        		}
	        	?>
	        </p>
	      </div>
	    </div>

	    <div class="form-group">
	      <label class="col-sm-4 control-label">Nombre de la red:</label>
	      <div class="col-sm-30">
	        <p class="form-control-static NameNet"><?php echo $R['name']; ?></p>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="col-sm-4 control-label">Clave personal:</label>
	      <div class="col-sm-30">
	        <p class="form-control-static KeyPersonal"><?php echo $R['pass']; ?></p>
	      </div>
	    </div>
	<?php
?>