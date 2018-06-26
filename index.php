<?php


include_once("_Controladores/Controladores.php");
$controlador = $_GET["controlador"];

switch ($controlador) 
{
	case '':
	$InicioCtrl = new InicioCtrl();
	break;
	case 'Inicio':
	$PrincipalCtrl = new PrincipalCtrl();
	break;
	# code...
	case 'Acciones':
	$CuentaCtrl = new CuentaCtrl();
	break;
	default:
	# code...
	break;
}


?>