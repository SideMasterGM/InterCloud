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
              <a href="dashboard.html" title="Return to Dashboard">
                <img src="app/controller/src/logo/logo.png" title="InterCloud Logo" class="img-responsive w250">
              </a>
            </div>

            <div class="col-xs-6 text-right va-b pr5">
              <div class="login-links">
                <a href="#" class="" title="False Credentials">Not Michael Rowls?</a>
              </div>

            </div>

          </div>
          <div class="panel panel-info heading-border br-n">

            <!-- end .form-header section -->
            <form method="post" action="http://admindesigns.com/" id="contact">
              <div class="panel-body bg-light pn">

                <div class="row table-layout">
                  <div class="col-xs-3 p20 pv15 va-m br-r bg-light">
                    <img class="br-a bw4 br-grey img-responsive center-block" src="assets/img/avatars/3.jpg" title="AdminDesigns Logo">
                  </div>
                  <div class="col-xs-9 p20 pv15 va-m bg-light">

                    <h3 class="mb5"> Michael Rowls
                      <small> - logged out for
                        <b> 5 hours </b>
                    </h3>
                    <p class="text-muted">michaelrowls@company.com</p>

                    <div class="section mt25">
                      <label for="password" class="field prepend-icon">
                        <input type="text" name="password" id="password" class="gui-input" placeholder="Enter password">
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

            </form>
          </div>
          <button type="submit" class="button btn-info pull-right">Unlock</button>
        </div>

      </section>
      <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

  </div>
  <!-- End: Main -->


<?php include ("app/core/foot.php"); ?>