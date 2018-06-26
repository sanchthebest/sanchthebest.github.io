
<?php
include('_Vistas/info.php');
$raiz=  $url;

             if(isset($_SESSION['usuario']))
             {
   
              $usu = new Usuario();
              $usu = unserialize($_SESSION['usuario']);
            
              include 'Inicio.php';     
             }
             else
             {
                  include '_Vistas/mod-errores/404.php';
                 
             }

            
          

?>
                
