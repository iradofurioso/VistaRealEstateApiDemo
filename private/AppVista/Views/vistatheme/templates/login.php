<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>LOGIN | Vista - Real Estate API DEMO</title>
    <meta name="description" content="Vista Real Estate API DEMO">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Carlos Eduardo da Silva - carlosedasilva@gmail.com">
    
    <link href="<?php echo $url; ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>assets/vendor/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="<?php echo $url; ?>assets/app/css/styles.css" rel="stylesheet">

    <script>
        var appUrl = '<?php echo $url; ?>';
    </script>

  </head>

  <body>

    <!-- BEGIN: Container -->
    <div class="container-fluid">

        <!-- BEGIN: row -->
        <div class="row" style="margin-top:200px;">
        
            <div class="col-md-4">
            </div>

            <div class="col-md-4 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vista Real Estate - Entrar no Sistema</h3>
                        
                        <!-- BEGIN: Mensagem de erro -->
                        <?php if($msg!=''): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $msg; ?>
                            </div>
                        <?php endif; ?>
                        <!-- END: Mensagem de erro -->
                        
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo $url; ?>auth/login" method="post" accept-charset="UTF-8" role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="admin@admin.com" name="email" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <br>
                            <small style="color:#BDBDBD;">
                                Login: admin@admin.com 
                                <br> 
                                Senha: admin
                            </small>
                            <br>
                            <br>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Entrar">
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            </div>
        </div>
        <!-- END: row -->

    </div>
    <!-- END: Container -->

</body>

<script src="<?php echo $url; ?>assets/vendor/jquery/dist/jquery.js"></script>
<script src="<?php echo $url; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>assets/app/js/Core/Boot.js"></script>

</html>