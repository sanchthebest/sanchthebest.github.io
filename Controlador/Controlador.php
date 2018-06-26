<?php 
session_start();
$raiz= "http://".$_SERVER['SERVER_NAME'].":8080/RedGo/";
include_once("Modelo/Modelo.php");	
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
		$accion = $_GET['action'];
		switch ($accion) {
			case '':
			 include_once("Vista/Login/Login.php");
				break;
			// case 'ListaEquipos':
   //      $lista = Equipo::ListarEquiposx();
   //      echo json_encode($lista);
   //      break;
		
		}
	}

	public function Post()
	{

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
        $accion = $_GET['action'];
        switch ($accion) {
          case 'Salir':
           session_destroy();
           header('Location:'.$GLOBALS['raiz'].'');
            break;
        	case '':
        		include_once('Vista/Login/Login.php');
        		break;
        	case 'Login':
        		include_once('Vista/Login/Login.php');
        		break;
        	case 'Panel':
        		include_once('Vista/Panel/Panel.php');
        		break;
        	case 'Equipo':
        		include_once('Vista/Equipo/Equipo.php');
        		break;
           case 'ListadeEquipos':
            include_once("Vista/Equipo/ListadeEquipos.php");
            break;
          case 'Material':
            include_once ("Vista/Material/Material.php");
            break;
        	case 'Clientes':
        		include_once('Vista/Clientes/Clientes.php');
        		break;
          case 'Usuarios':
            include_once('Vista/Usuarios/Usuarios.php');
            break;
          case 'Soporte':
            include_once('Vista/Soporte/Soporte.php');
          case 'Instalacion':
            include_once('Vista/Instalacion/Instalacion.php');
            break;
          case 'mesajes':
            include_once('Vista/Instalacion/mesajes.php');
            break;

          case 'ListaInstalaciones':
            include_once('Vista/Instalacion/ListaInstalaciones.php');
            break;
          case 'ListaSoportes':
            include_once('Vista/Instalacion/ListaSoporte.php');
            break;
            break;

           
          case 'ListaEquipos':
            $lista = Equipo::Listar2();
            break;
          case 'ListaEquiCantidad':
            $lista = Equipo::ListarEquiposy();
            echo json_encode($lista);
            break;
          case 'Listare':
            $lista = Equipo::ListarEquiposx();
             echo json_encode($lista);
            # code...
            break;
          case 'ListaMaterial':
            $lista = Materiales::ListarMateriales();
            echo json_encode($lista);
            break;
          case 'ListarClientes':
            $lista = Cliente::ListadeClientes();
             echo json_encode($lista);
            break;
          case 'ListarUsuarios':
            $lista = Usuario::ListadeUsuarios();
            echo json_encode($lista);
            break;

          case 'ListaInstalacion':
            $lista = Instalacion::ListarInstalaciones();
            echo json_encode($lista);
            break;
          case 'ListaSoporte':
            $lista = Instalacion::ListarSoportes();
            echo json_encode($lista);
            break;
        	default:
        		# code...
        		break;
        }
	}
	public function Post()
	{

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
        $metod = $_SERVER['REQUEST_METHOD'];
        switch ($metod) {
          case 'Salir':
            session_destroy();
            break;
          case 'ListaEquipos':
           $lista = Equipo::Listar2();
           echo json_encode($lista);
            break;
          // case 'ListaEquipos':
          //  $lista = Equipo::Listar2();
          //   echo "string";
          //   break;
          default:
            # code...
            break;
        }
   }

   public function Post()
   {
   	$accion = $_GET['action'];
   	switch ($accion) {
      case 'Ingresar':
         $msj;
         $user = $_POST['usuario'];
         $pass = $_POST['password'];
         $usuario = Usuario::Verificar($user,$pass);
        if ($usuario != null) {
           $_SESSION['usuario'] = serialize($usuario);
          $usdd = new Usuario();
          $usdd = unserialize($_SESSION['usuario']);
           $msj = 'ok';  
          }
        else{
          // session_start();
          //  $_SESSION['ingreso']='YES';
          //  $_SESSION['nombre']=$usuario[2];
          $msj = 'N';
        }
        echo $msj;
      	break;
      case 'RegistraAdministrador':
        $msj;
      	$persona = new Persona();
      	Llenar($persona);
      	if ($persona->Id<=0) {
      		$persona->InsertarPersona();
      	}
      	else{
      		$persona->ActualizarPersona();
      	}
      	$Adm = new Administrador();
      	$Adm->Id = $_POST['id'];
      	$Adm->Codigo = $_POST['codigo'];
      	$Adm->NomUsu = $_POST['usuario'];
      	$Adm->TipoUsu = $_POST['tipousu'];
      	$Adm->Estado = $_POST['estado'];
      	if ($Adm->Id<=0) {
      		$Adm->InsertarAdministrador();
      		$msj = 'ok';
      	}
      	else{
      		$Adm->ActualizarAdministrador();
      		$msj= 'ok';
      	}
         
      	$msj = 'ok';
      	echo $msj;
      	break;

        case 'RegistraUsuario':
         $msj;
         $Usuario = new Usuario();
         $Usuario->Id = $_POST["id"];
         $Usuario->Codigo =$_POST["codigo"];
         $Usuario->NomUsu = $_POST["usuario"];
         $Usuario->Estado = $_POST["estado"];
         $Usuario->Contraseña = $_POST["pass"];
         if ($Usuario->Id<=0) {
              $Usuario->InsertarUsuario();
              $msj = 'ok';
          } 
          else{
            $Usuario->ActualizarUsuario();
            $msj = 'ok';
          }
          echo $msj;
        break;
        case 'EliminaUsers':
          $msj;
          $usuario = new Usuario();
          $usuario->Id = $_POST['id'];
          $usuario->EliminarUsuarios();
          $msj = "ok";
          echo $msj; 
          break;
        case 'RegistraCliente':
          $msj;
          $Cliente = new Cliente();
          $Cliente->Id = $_POST["id"];
          $Cliente->Codigo = $_POST["codigo"];
          $Cliente->Nombre = $_POST["nombre"];
          $Cliente->Baja = $_POST["baja"];
          if ($Cliente->Id<=0) {
            $Cliente->InsertarCliente();
            $msj = "ok";
          }
          else{
            $Cliente->ActualizarCliente();
            $msj = "ok";
          }
          echo $msj;
          break;
        case 'EliminarCliente':
          $msj;
          $cliente = new Cliente();
          $cliente->Id = $_POST["id"];
          $cliente->EliminarCliente();
          $msj = "ok";
          echo $msj;
          break;
        case 'RegistraEquipo':
        $msj;
        $Equipo = new Equipo();
        $Equipo->Id = $_POST["id"];
        $Equipo->Codigo = $_POST["codigo"];
        $Equipo->Chip = $_POST["chip"];
        $Equipo->Serie = $_POST["serie"];
        $Equipo->Tarjeta = $_POST["tarjeta"];
        $Equipo->Modelo = $_POST["modelo"];
        if ($Equipo->Id<=0) {
          
        $Equipo->InsertarEquipo();
        $msj = "ok";
        }
        else{
          $Equipo->ActualizarEquipo();
        $msj = 'ok';
        }
        echo $msj;
        break;
        case 'EliminarEquipo':
        $msj;
        $Equipo = new Equipo();
        $Equipo->Id = $_POST["id"];
        $Equipo->EliminaEquipo();
        $msj = 'ok';
        echo $msj;
         break;

        case 'RegistraMaterial':
        $msj;
        $Material = new Materiales();
        $Material->Id = $_POST["id"];
        $Material->Codigo = $_POST["codigo"];
        $Material->Nombre = $_POST["nombre"];
        $Material->Stock  = $_POST["stock"];
        if ($Material->Id<=0) {
          $Material->InsertarMaterial();
          $msj = 'ok';
        }
        else
        {
          $Material->ActualizarMaterial();
        $msj = 'ok';
        }
        echo $msj;
          break;
        case 'EliminarMaterial':
          $msj;
          $Material = new Materiales();
          $Material->Id = $_POST["id"];
          $Material->EliminaMaterial();
          $msj = 'ok';
          echo $msj;
          break;

         case 'Salir':
           
           break;

        case 'RegistraDetalle':
          $msj;
          $Instalacion = new Instalacion();
          $Instalacion->Nro = $_POST["id"];
          $Instalacion->Cliente = $_POST["cliente"];
          $Instalacion->Tipo = $_POST["tipo"];
          $Instalacion->Equipo = $_POST["equipos"];
          $Instalacion->CantiEquipo = $_POST["cantidadeq"];
          $Instalacion->Materiales = $_POST["materiales"];
          $Instalacion->Cantidad = $_POST["cantidad"];
          $Instalacion->Fecha = $_POST["fecha"];
          $Instalacion->Ot = $_POST["ot"];
          $Instalacion->InsertarDetalle();
          $msj = 'ok';
          echo $msj;
          break;
      	}
   }
}
?>