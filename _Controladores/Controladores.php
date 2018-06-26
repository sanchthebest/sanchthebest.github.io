<?php
session_start();
$raiz= "http://".$_SERVER['SERVER_NAME']."/musoft.com/";
include_once("_Modelo/Modelo.php");	

class InicioCtrl
{
	public function __construct()
	{
		$metodo = $_SERVER['REQUEST_METHOD']; //post o get
		switch ($metodo) {
			case 'GET':
			$this->Get();
			break;
			case 'POST':
			$this->Post();
			break;

		}
	}

	public function Get()
	{
		$action = $_GET["action"];
		switch ($action) {
			case '':
			include_once("_Vistas/mod-login/Login.php");
			break;

		}
		
	}

	public function Post()
	{
		$action = $_GET["action"];
		switch ($action) {

			
		}
	}
}
class PrincipalCtrl
{
	public function __construct()
	{
		$metodo = $_SERVER['REQUEST_METHOD']; //post o get
		switch ($metodo) {
			case 'GET':
			$this->Get();
			break;
			case 'POST':
			$this->Post();
			break;

		}
	}

	public function Get()
	{
		$action = $_GET["action"];
		switch ($action) {
			case '':
			include_once("_Vistas/mod-login/Login.php");
			break;
			case 'Login':
			include_once("_Vistas/mod-login/Login.php");
			break;

			case 'Panel':
			include_once("_Vistas/mod-panel/Ini.php");
			break;
			case 'Enfermedades':
			include_once("_Vistas/mod-enfermedades/Ini.php");
			break;
			case 'Sintomas':
			include_once("_Vistas/mod-sintomas/Ini.php");
			break;
			case 'Tratamiento':
			include_once("_Vistas/mod-tratamiento/Ini.php");
			break;
			case 'Deducir':
			include_once("_Vistas/mod-buscar-sintomas/Ini.php");
			break;

			case '404':
			include_once("_Vistas/404.php");
			break;

		}
		
	}

	public function Post()
	{
		$action = $_GET["action"];
		switch ($action) {
			
		}
	}
}
class CuentaCtrl
{
	public function __construct()
	{
		$metodo = $_SERVER['REQUEST_METHOD']; //post o get
		switch ($metodo) {
			case 'GET':
			$this->Get();
			break;
			case 'POST':
			$this->Post();
			break;

		}
	}

	public function Get()
	{
		$action = $_GET["action"];
		switch ($action) {

			case 'Salir':
			session_destroy();
			header('Location:'.$GLOBALS['raiz'].'');
			break;

			case 'Ingresar':
			if (isset($_SESSION['usuario'])) 
			{
				header('Location:'.$GLOBALS['raiz'].'Cuenta/Ingresar');			
			}
			else
			{
				include_once("_Vistas/mod-login/Login.php");	
			}
			break;

			case 'ListaEnfermedades':
			$lista = Enfermedades::ListaEnfermedades();
			echo json_encode($lista);
			break;
			case 'ListaSintomas':
			$lista = Sintomas::ListaSintomas();
			echo json_encode($lista);
			break;
			case 'ListaTratamiento':
			$lista = Tratamientos::Listatratamientos();
			echo json_encode($lista);
			break;

			case 'ListaDecirSintomas':
			$lista = Deducir::Listadeducir();
			echo json_encode($lista);
			break;

			case 'ListaelMaximoDeduci':
			$lista = Deducir::ELquemasserepite();
			echo json_encode($lista);
			break;
			case 'sabercantindaddeenfermedadensintoma':
			$lista = Sintomas::Cantidadderepetisionessintomas();
			echo json_encode($lista);
			break;





			
		}

	}



	public function Post()
	{
		$action = $_GET["action"];
		switch ($action) {
			case 'Ingresar':

			$usuario = $_POST["usuario"];
			$password = $_POST["password"];
			$tipo = "1";
			$mensaje;	
			$usu = Usuario::Autenticar($usuario,$password,$tipo);
			if($usu != null)
			{ 


				$_SESSION['usuario'] = serialize($usu);

				$usdd = new Usuario();
				
				$usdd = unserialize($_SESSION['usuario']);
				$mensaje = "OK";	
				// header('Location:'.$GLOBALS['raiz'].'Inicio/Panel');	
			}
			else
			{
				// header('Location:'.$GLOBALS['raiz'].'Inicio/Login');
				$mensaje = "NO";	
			}
			echo $mensaje;
			break;

			case 'RegistrarEnfermedad':
			$mensaje;
			$obj = new Enfermedades;		
			$obj->nombre = $_POST["nombre"];
			$obj->descripcion = $_POST["descripcion"];
			$obj->Insertar();

			$mensaje = "OK";
			echo $mensaje;
			break;

			case 'RegistrarSintoma':
			$mensaje;
			$obj = new Sintomas;		
			$obj->nombre = $_POST["nombre"];
			$obj->descripcion = $_POST["descripcion"];
			$obj->enfermedad = $_POST["enfermedad"];
			$obj->Insertar();

			$mensaje = "OK";
			echo $mensaje;
			break;

			case 'BuscarSintoma':
			$nombre = $_POST["nombre"];	
			$lista = Sintomas::Listatodoslossintomas($nombre);
			echo json_encode($lista);
			break;


			case 'RegistrarTratamiento':
			$mensaje;
			$obj = new Tratamientos;		
			$obj->nombre = $_POST["nombre"];
			$obj->descripcion = $_POST["descripcion"];
			$obj->enfermedad = $_POST["enfermedad"];
			$obj->Insertar();

			$mensaje = "OK";
			echo $mensaje;
			break;

            

			case 'BuscarTratamiento':
			$nombre = $_POST["nombre"];	
			$lista = Tratamientos::Listatodoslostratamientos($nombre);
			echo json_encode($lista);
			break;

			// ---------------------------- Deducir Enfermedad ---------

			case 'AgregarDeducir':

			$sintoma = $_POST["sintoma"];
			$enfermedad = $_POST["enfermedad"];
			$mensaje;
			if (Deducir::ValidarYaREGISTRADO($sintoma,$enfermedad)==false) {

				$obj = new Deducir;		
				$obj->sintoma = $_POST["sintoma"];
				$obj->enfermedad = $_POST["enfermedad"];
				$obj->Insertar();
				$mensaje = "OK";
			}
			else
			{
				$mensaje = "Sintoma ya Ingresado, Ingrese Otro";
			}

			echo $mensaje;
			break;


			case 'EliminarSintomaUni':
			$mensaje;
			$obj = new Deducir;		
			$obj->id = $_POST["id"];
			$obj->EliminarSintoma();
			$mensaje = "OK";
			echo $mensaje;
			break;
			case 'Eliminartododeducir':
			$mensaje;
			$obj = new Deducir;		
			$obj->Eliminartodo();
			$mensaje = "OK";
			echo $mensaje;
			break;

            
		
			

		}

	}

}



?>