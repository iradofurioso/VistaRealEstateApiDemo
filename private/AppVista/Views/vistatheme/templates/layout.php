<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Vista - Real Estate API DEMO</title>
    <meta name="description" content="Vista Real Estate API DEMO">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Carlos Eduardo da Silva - carlosedasilva@gmail.com">
    
    <link href="<?php echo $url; ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>assets/vendor/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="<?php echo $url; ?>assets/vendor/pace-js/themes/blue/pace-theme-loading-bar.css" rel="stylesheet">
    <link href="<?php echo $url; ?>assets/app/css/styles.css" rel="stylesheet">

    <link href="<?php echo $url; ?>assets/app/img/ico.png" rel="shortcut icon" type="image/x-icon">

    <script>
        var appUrl = '<?php echo $url; ?>';
    </script>

  </head>

  <body>



<!-- BEGGIN: Top menu -->
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><i class="fas fa-home"></i> Real Estate</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?php echo $url; ?>auth/logout">Sair</a>
    </li>
  </ul>
</nav>
<!-- END: Top menu -->


<!-- BEGIN: Container -->
<div class="container-fluid">

    <!-- BEGIN: row -->
  <div class="row">

    <!-- BEGIN: Sidemenu -->
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
          <a class="nav-link" href="javascript:void(0);" onclick="triggerRequest('Dashboard/index','#vista-container');">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="javascript:void(0);" onclick="triggerRequest('City/index','#vista-container');">
                <i class="far fa-map"></i>
                Cidades
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);" onclick="triggerRequest('Neighborhood/index','#vista-container');">
                <i class="fas fa-map-marker-alt"></i> 
                Bairros
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- END: Sidemenu -->


    <!-- BEGIN: Main -->
    <main role="main" id="vista-container" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <!-- Content loads here -->
    </main>
    <!-- END: Main -->
    
  </div>
  <!-- END: row -->

</div>
<!-- END: Container -->


<script src="<?php echo $url; ?>assets/vendor/jquery/dist/jquery.js"></script>
<script src="<?php echo $url; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/jquery-form/dist/jquery.form.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/pace-js/pace.min.js"></script>
<script src="<?php echo $url; ?>assets/app/js/Core/Boot.js"></script>

<script>			
    $(window).on('load', function() { 
      Pace.restart();
      triggerRequest('Dashboard/index','#vista-container');
    });
</script>

</html>