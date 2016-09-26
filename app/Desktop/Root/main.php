<body class="dashboard-page">
  <?php include ("php/panels.php"); ?>

  <div id="main">
    <?php include ("php/headers.php"); ?>

    <aside id="sidebar_left" class="nano nano-light affix">
      <div class="sidebar-left-content nano-content">
        <?php include ("php/sidebar-header.php"); ?>
        <?php include ("php/sidebar_menu.php"); ?>
      </div>
    </aside>

    <section id="content_wrapper">
      <?php include ("php/Topbar-Dropdown.php"); ?>      
      <?php include ("php/content_main.php"); ?>

      <footer id="content-footer" class="affix">
        <?php include ("php/footer.php"); ?>
      </footer>
    </section>
  </div>

  <?php include ("php/foot_js.php"); ?>
</body>