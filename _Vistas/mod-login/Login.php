<?php
include('_Vistas/info.php');
$raiz=  $url;
?>

<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>        
    <!-- META SECTION -->
    <title>Login</title>            
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo $raiz;?>a.png" type="image/x-icon" />
    <!-- END META SECTION -->
    <!--  <meta name="theme-color" content="#656d78 "> -->
    <meta name="theme-color" content="#33414e">
    <!-- CSS INCLUDE -->        
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo $raiz; ?>_musoft/_css/theme-blue.css"/>
    <!-- EOF CSS INCLUDE -->                                    
</head>
<body>
    <div class="login-container">
        <div class="login-box animated fadeInDown">
            <div class="login-logo">
            </div>
            <div class="login-body">
                <div class="login-title"> 

                    <div class="input-group">

                       <span class="glyphicon glyphicon-align-center"></span><strong> Acceso</strong> al Sistema</div>
                   </div>  
                   <div class="form-horizontal"  >
                    <div class="form-group">
                        <div class="col-md-12">

                         <div class="input-group">
                            <span class="input-group-addon"> <span class="fa fa-user"></span></span>
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario"/>
                        </div>   
                    </div>
                </div>  
                <div class="form-group">
                   <div class="col-md-12">

                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Clave"/>
                    </div>            

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <button class="btn btn-info btn-block" onclick = "validar()">ACCEDER</button>
                </div>
            </div>

        </div>
    </div>

    <div class="login-footer">
        <div class="pull-left">
            &copy; 2017 Hard-Ip
        </div>

    </div>
</div>

</div>

<!-- START PRELOADS -->
<audio id="audio-alert" src="<?php echo $raiz;?>_musoft/_audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="<?php echo $raiz;?>_musoft/_audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->                  
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/bootstrap/bootstrap.min.js"></script>        

<!-- START THIS PAGE PLUGINS-->        
<script type='text/javascript' src='<?php echo $raiz;?>_musoft/_js/plugins/icheck/icheck.min.js'></script>        
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/morris/morris.min.js"></script>       
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='<?php echo $raiz;?>_musoft/_lugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='<?php echo $raiz;?>_musoft/_js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
<script type='text/javascript' src='<?php echo $raiz;?>_musoft/_js/plugins/bootstrap/bootstrap-datepicker.js'></script>          
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/owl/owl.carousel.min.js"></script>             
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/moment.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins.js"></script>        
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/actions.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/demo_dashboard.js"></script>
<script type="text/javascript">

    function validar()
    {
     var usuario = $("#usuario").val();
     var password = $("#password").val();
     if (usuario =="") {
        toastr.error("Ingrese Usuario");
    }
    else
    {
     if (password =="") {
        toastr.error("Ingrese Password");
    }
    else
    {
        var url = "<?php echo $raiz?>Acciones/Ingresar";
        var obj = {usuario:usuario,password:password};
        $.post(url,obj,function(msj){

          if (msj == "OK") 
          {
              document.location = "<?php echo $raiz; ?>Inicio/Panel";

          }
          else
          {
             toastr.error(msj , "Usuario o Password no Registrado");
         }

     });
    }
}

}
</script>
</body>
</html>







