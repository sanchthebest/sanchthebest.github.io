<?php
include('_Vistas/info.php');
$raiz=  $url;
?>

<!DOCTYPE html>
<html lang="en">
<head>        
  <!-- META SECTION -->
  <title>Musoft</title>            
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <link rel="shortcut icon" href="<?php echo $raiz; ?>a.png">
  <!-- END META SECTION -->
  <!-- <meta name="theme-color" content="#1caf9a"> -->
  <meta name="theme-color" content="#33414e">
  <!-- CSS INCLUDE -->        
  <link rel="stylesheet" type="text/css" id="theme" href="<?php echo $raiz;?>_musoft/_css/theme-blue.css"/>
  <STYLE TYPE="text/CSS">


  </STYLE>
  
  <!-- EOF CSS INCLUDE --> 
</head>
<body>
  <!-- START PAGE CONTAINER -->
  <div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
      <!-- START X-NAVIGATION -->
      <ul class="x-navigation">
        <li class="xn-logo">
          <a>Musoft</a>
          <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
          <a  class="profile-mini">
            <img src="<?php echo $raiz; ?>_musoft/_assets/images/a.png" alt="John Doe"/>
          </a>
          <div class="profile">
            <div class="profile-image">
              <img src="<?php echo $raiz; ?>_musoft/_assets/images/a.png" alt="John Doe"/>
            </div>
            <div class="profile-data">

             <?php
             if(isset($_SESSION['usuario']))
             {
              $usu = new Usuario();
              $usu = unserialize($_SESSION['usuario']);
              ?>
              <div class="profile-data-name">Bienvenido : <?php echo $usu->usuario;?></div>
              <div class="profile-data-name"></div>
            </li>
            <?php
          }
          else
          {
            ?>            
            <div class="profile-controls">
              <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
              <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
            </div>
          </div>                                                                        
        </li>
        <?php
      }
      ?> 
      <li class="xn-title">Menu</li>
      <li class="xn-openable">
        <a href="<?php echo $raiz;?>Inicio/Panel">
          <span class="fa fa-search"></span><span class="xn-text">Buscar - Enfermedad</span></a>                      
        </li>  
              <li class="xn-openable">
        <a href="<?php echo $raiz;?>Inicio/Deducir">
          <span class="fa fa-search"></span><span class="xn-text">Buscar - Sintoma</span></a>                      
        </li>  
      
        <li lass="xn-openable">
          <a href="<?php echo $raiz;?>Inicio/Enfermedades"><span class="fa fa-list"></span> <span class="xn-text">Registro Enfermedades</span></a>                        
        </li>           
        <li lass="xn-openable">
          <a href="<?php echo $raiz;?>Inicio/Sintomas">
            <span class="fa fa-list-alt"></span> <span class="xn-text">Registro Sintomas</span></a></li>
            <li lass="xn-openable">
              <a href="<?php echo $raiz;?>Inicio/Tratamiento">
                <span class="fa fa-list-ul"></span> <span class="xn-text">Tratamiento </span></a></li>
              </ul>
              <!-- END X-NAVIGATION -->
            </div>
            <!-- PAGE CONTENT -->
            <div class="page-content">
              <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <li class="xn-icon-button">
                  <a class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <li class="xn-icon-button pull-right">
                  <a data-placement="bottom" data-original-title="Salir" data-toggle="tooltip" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                </li> 
              </ul>
              <!-- MESSAGE BOX-->
              <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                <div class="mb-container">
                  <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Cerrar <strong>Sesion</strong>?</div>
                    <div class="mb-content">
                      <p>Estas seguro <?php echo $usu->usuario;?> de salir del sistema?</p>                    
                      <p>Presione si para salir</p>
                    </div>
                    <div class="mb-footer">
                      <div class="pull-right">
                       <a class="btn btn-success btn-lg" href="<?php echo $raiz; ?>Acciones/Salir">Si</a>
                       <button class="btn btn-default btn-lg mb-control-close">No</button>
                     </div>  
                   </div>
                 </div>
               </div>
             </div>
             <!-- END MESSAGE BOX-->

