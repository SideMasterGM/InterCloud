<?php include ("app/controller/php/CalcDate.php"); ?>

<!-- Start: Main -->
  <div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- begin canvas animation bg -->
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>

      <!-- Begin: Content -->
      <section id="content">

        <div class="admin-form theme-info mw600" style="margin-top: 13%;" id="login">
          <div class="row mb15 table-layout">

            <div class="col-xs-6 pln">
              <a href="dashboard.html" title="InterCloud Logo">
                <img src="app/controller/src/logo/logo.png" title="InterCloud Logo" class="img-responsive w250">
              </a>
            </div>

            <div class="col-xs-6 text-right va-b pr5">
              <div class="login-links">
                <a href="#" class="" onclick="javascript: ChangeUser();" title="Escribir un usuario diferente">Acceder con otro usuario</a>
              </div>

            </div>

          </div>
          <div class="panel panel-info heading-border br-n">

            <!-- end .form-header section -->
            <form id="FormSessionActive">
              <div class="panel-body bg-light pn">

                <div class="row table-layout">
                  <div class="col-xs-3 p20 pv15 va-m br-r bg-light">
                    <img class="br-a bw4 br-grey img-responsive center-block" src="app/controller/src/plugins/assets/img/avatars/SM.JPG" title="AdminDesigns Logo">
                  </div>
                  <div class="col-xs-9 p20 pv15 va-m bg-light">

                    <h3 class="mb5"><?php echo @$GameResult['usr']; ?>
                      <small> - Logueado hace 
                        <b> <?php echo nicetime(date("Y-m-d H:i", $GameResult['date_log_unix'])); ?> </b>
                    </h3>

                    <?php 
                        include ("app/controller/php/KnowPrivilege.php");                      
                    ?>

                    <p class="text-muted"> <?php echo $Privilege; ?> </p>

                    <div class="section mt25">
                      <label for="password" class="field prepend-icon">
                        <input type="password" name="password" id="password" class="gui-input" placeholder="Escribir contraseña" autofocus/>
                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                  </div>
                </div>
              </div>
              <!-- end .form-body section -->
              <input type="hidden" name="">
            </form>
          </div>
          <button type="submit" class="button btn-info pull-right" id="LockSession">Acceder ahora</button>
        </div>

      </section>
      <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

  </div>
  <!-- End: Main -->


<?php include ("app/core/foot.php"); ?>