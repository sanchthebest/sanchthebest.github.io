<?php
include('_Vistas/info.php');
$raiz=  $url;
?>

<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Aqui Me Quedo</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
  <link rel="shortcut icon" href="<?php echo $raiz; ?>a.png">
        <!-- END META SECTION -->
         <!-- <meta name="theme-color" content="#1caf9a"> -->
                    <meta name="theme-color" content="#33414e">
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo $raiz; ?>_musoft/_css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        <div class="error-container">
            <div class="error-code">404</div>
            <div class="error-text">Pagina No Encontrada</div>
           <!--  <div class="error-subtext"> Tiene Que Iniciar sesion</div> -->
            <div class="error-actions">                                
                              
            </div>
            <div class="error-subtext">Es necesario Volver al login para ingresar al sistema.</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" placeholder="Enviar Posible Error..." class="form-control"/>
                        <div class="input-group-btn">
                            <a class="btn btn-primary" href="<?php echo $raiz; ?>Inicio/Login" ><span class="fa fa-search"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>                 
    </body>
</html>






