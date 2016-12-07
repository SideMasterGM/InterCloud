<div class="wrap">
  <h1 id="h1">Matricula</h1>
  <form class="form-horizontal">
    <div class="form-group">
      <label for="inputRecibo" class="col-sm-2 control-label">Nº Recibo</label>
      <div class="col-xs-6">
        <input type="text" class="form-control" id="inputRecibo" placeholder="00-000000-000-00">
      </div>
    </div>
    <div class="form-group">
      <label for="inputCarnet" class="col-sm-2 control-label">Nº Carnet</label>
      <div class="col-xs-5">
        <input type="text" class="form-control" id="inputCarnet" placeholder="16-00000-0">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" id="generar" class="btn btn-success">Generar</button>
      </div>
    </div>
    <div class="form-group">
      <label for="inputGrado" class="col-sm-2 control-label">Grado</label>
      <div class="col-xs-6">
        <select class="form-control">
          <option>1er Año</option>
          <option>2do Año</option>
          <option>3er Año</option>
          <option>4to Año</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputTurno" class="col-sm-2 control-label">Turno</label>
      <div class="col-xs-6">
        <select class="form-control">
          <option>Matutino</option>
          <option>Vespertino</option>
          <option>Dominical</option>
          <option>Sabatino</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputGrupo" class="col-sm-2 control-label">Grupo</label>
      <div class="col-xs-6">
        <select class="form-control">
          <option>A</option>
          <option>B</option>
          <option>C</option>
          <option>D</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputAnioLectivo" class="col-sm-2 control-label">Año Lectivo</label>
      <div class="col-xs-6">
        <input type="date" class="form-control" id="inputAnioLectivo" placeholder="Año Lectivo">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Matricular</button>
      </div>
    </div>
  </form>
</div>