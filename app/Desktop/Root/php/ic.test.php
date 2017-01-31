<div class="wrap">
  <h1 id="h1" style="text-align: center">Matricula</h1>
  <form class="form-horizontal" method="post" action="rb.mat.php">
    <div class="form-group">
      <label for="inputNombre" class="col-sm-2 control-label">Nombre Completo</label>
      <div class="col-xs-6">
        <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre Completo">
      </div>
    </div>
    <div class="form-group">
      <label for="inputDireccion" class="col-sm-2 control-label">Direccion</label>
      <div class="col-xs-6">
        <input type="text" name="direccion" class="form-control" id="inputDireccion" placeholder="Chinandega, Frente Al Colegio M.B">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-sm-2 control-label">Email</label>
      <div class="col-xs-6">
        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="help@gmail.com">
      </div>
    </div>
    <div class="form-group">
      <label for="inputNacionalidad" class="col-sm-2 control-label">Nacionalidad</label>
      <div class="col-xs-6">
        <select name="nacionalidad" class="form-control">
          <?php 
            $query = "SELECT * FROM countries";
            $select_countries = mysqli_query($IC, $query);
          
            if (!$select_categories){
              die("QUERY FAILED" . mysqli_error($IC));
            }
          
            while($row = mysqli_fetch_assoc($select_categories)){
              $id = $row['id'];
              $title = $row['title'];
          ?>
          <option value="<?php echo $id; ?>"><?php echo utf8_encode($title); ?></option>
          <?php
              }
          ?> 
        </select> 
      </div>
    </div> -->
    <div class="form-group">
      <label for="inputCedula" class="col-sm-2 control-label">Cedula</label>
      <div class="col-xs-6">
        <input type="text" name="cedula" class="form-control" id="inputCedula" placeholder="081-000000-0000F">
      </div>
    </div>
    <div class="form-group">
      <label for="inputFecha" class="col-sm-2 control-label">Fecha De Nacimiento</label>
      <div class="col-xs-6">
        <input type="text" name="fecha" class="form-control" id="inputFecha" placeholder="">
      </div>
    </div>
    <div class="form-group">
      <label id="unique" class="col-sm-2 control-label">Sexo</label>
      <div id="unique2" class="checkbox-custom">
          <input type="checkbox" id="UniqueID" class="UniqueID">
          <label for="UniqueID">Hombre</label>
          <input type="checkbox" id="UniqueID2">
          <label for="UniqueID2">Mujer</label>
      </div>
    </div>
    <div class="form-group">
      <label for="inputTelefono" class="col-sm-2 control-label">Telefono</label>
      <div class="col-xs-6">
        <input type="text" name="phone" class="form-control" id="inputTelefono" placeholder="0000-0000">
      </div>
    </div>
    <div class="form-group">
      <label for="inputTelefono2" class="col-sm-2 control-label">Telefono 2</label>
      <div class="col-xs-6">
        <input type="text" name="phone1" class="form-control" id="inputTelefono2" placeholder="0000-0000">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="submit">Siguiente</button>
      </div>
    </div>
  </form>
</div>