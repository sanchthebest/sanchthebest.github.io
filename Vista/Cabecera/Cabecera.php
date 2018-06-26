<?php
include('Vista/Info.php');
$raiz = $url;
if (isset($_SESSION['usuario'])) {
   $usu = new Usuario();
   $usu = unserialize($_SESSION['usuario']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>RED GO</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <link rel="shortcut icon" href="<?php echo $raiz; ?>a.png">
  <!-- END META SECTION -->
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo "$raiz"?>Css/_css/bootstrap.min.css"> -->
   <!-- <link rel="stylesheet" type="text/css" href="<?php echo "$raiz"?>Css/_css/dataTables.bootstrap.min.css"> -->
  <meta name="theme-color" content="#33414e">
  <!-- CSS INCLUDE -->        
  <link rel="stylesheet" type="text/css" id="theme" href="<?php echo $raiz;?>Css/_css/theme-blue.css"/>

  <!-- <script type="text/javascript" src ="<?php echo $raiz;?>Boostrap/Js.js"></script> -->
  <script type="text/javascript" src ="<?php echo "$raiz";?>Css/Js/Js.js"></script>
  <STYLE TYPE="text/CSS">
  </STYLE>
</head>
<body>
<div class="page-container">
	  <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html", style="color: blue">RED GO</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                    <!-- ojo esta es la parte de sssion de mi pagina -->
                            <div class="profile-data">
                            <?php 
                                if (isset($_SESSION['usuario']))
                                {
                                $usu = new Usuario();
                                $usu = unserialize($_SESSION['usuario']);
                             ?>
                           <div class="profile-data-name">Bienvenido : <?php echo $usu->usuario;?></div>
                           <div class="profile-data-title">Web Developer/Designer</div>
                           </div>
                           <?php 
                            }
                            ?>
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>


                    <li class="xn-title">Menu</li>
                    <li class="active">
                        <a href="<?php echo "$raiz";?>Inicio/Panel"><span class="fa fa-home"></span> <span class="xn-text">Inicio</span></a>                        
                    </li>                    
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-pencil"></span> <span class="xn-text">Registros</span></a>
                        <ul>
                            <li><a href="<?php echo "$raiz";?>Inicio/Usuarios"><span class="fa fa-user"></span> Usuarios</a></li>
                            <li><a href="<?php echo "$raiz";?>Inicio/Clientes"><span class="fa fa-users"></span>Clientes</a></li>
                            <li><a href="<?php echo "$raiz";?>/Inicio/mesajes"><span class="fa fa-comments"></span> Messages</a></li>                      
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-desktop"></span> <span class="xn-text">Equipos</span></a>
                        <ul>
                            <li><a href="<?php echo "$raiz";?>Inicio/Equipo"><span class="fa fa-laptop"></span>Nuevo Equipo</a></li>
                            <li><a href="<?php echo "$raiz";?>Inicio/Material"><span class="fa fa-fw fa-wrench"></span> Nuevo Material</a></li>
                            
                        </ul>
                    </li>
                    <li class="xn-title">Trabajos</li>
                    <li class="">
                        <a href="<?php echo "$raiz";?>Inicio/Instalacion"><span class="fa fa-cogs"></span> <span class="xn-text">Instalacion</span></a>                        
                    </li>                    
                                       
                    <li>
                        <a href="<?php echo "$raiz";?>Inicio/Soporte"><span class="fa fa-map-marker"></span> <span class="xn-text">Soporte</span></a>
                    </li> 
                    <li class="xn-title">Trabajos</li>   
                     <li class="">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Realizados</span></a>                        
                    </li>                    
                                       
                    <li>
                        <a href="maps.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Almacen Disponible</span></a>
                    </li> 
                       <li class="xn-openable">
                        <a href="#"><span class="fa fa-desktop"></span> <span class="xn-text">Equipos</span></a>
                        <ul>
                            <li><a href="<?php echo "$raiz";?>Inicio/Equipo"><span class="fa fa-laptop"></span>Nuevo Equipo</a></li>
                            <li><a href="<?php echo "$raiz";?>Inicio/Material"><span class="fa fa-fw fa-wrench"></span> Nuevo Material</a></li>
                            
                        </ul>
                    </li>              
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
             <!-- PAGE CONTENT -->
        <div class="page-content">
          <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <li class="xn-icon-button">
              <a class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            </li>
            <li class="xn-search">
              <form role="form">
                <input type="text" name="search" placeholder="Buscar..."/>
              </form>
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
                   <a class="btn btn-success btn-lg" href="<?php echo $raiz; ?>Inicio/Salir">Si</a>
                   <button class="btn btn-default btn-lg mb-control-close">No</button>
                 </div>  
               </div>
             </div>
           </div>
         </div>
        
        <?php 
        
        // else
        // {
        //   // echo "string";
        // }
        ?>  
      

         <!-- END MESSAGE BOX-->
<!-- </div> ojos este div es el final que va a pie -->