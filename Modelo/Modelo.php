<?php 
include_once("Conexion.php");

class Cliente
{
   public $Id;
   public $Codigo;
   public $Nombre;
   public $Baja;

   public function InsertarCliente()
   { 
   	$cone = new Conexion();
   	$sql = "Insert into cliente values ('".$this->Id."','".$this->Codigo."','".$this->Nombre."','".$this->Baja."')";
    $cone->EjecutarSql($sql);
   }

   public function ActualizarCliente()
   {
   	$cone = new Conexion();
   	$sql = "update cliente set Codigo = '".$this->Codigo."',Nombre = '".$this->Nombre."' where Id = ".$this->Id;
   	$cone->EjecutarSql($sql);
   }
   
   public function EliminarCliente()
   {
    $cone = new Conexion();
    $sql = "update cliente set Baja = '0' where Id = ".$this->Id;
    $cone->EjecutarSql($sql);
   }

   public function ListadeClientes()
   {
    $cone = new Conexion();
    $sql = "select Id,Codigo,Nombre,Baja from cliente where Baja = 1";
    $tabla = $cone->Seleccionar($sql);
    $lista = array();
    $i = 0;
    while ($fila = mysql_fetch_assoc($tabla)) {
       $lista[$i] = Cliente::CrearCliente($fila);
       $i++;
    }
    return $lista;
   }
  
   public function CrearCliente($fila)
   {
    $cliente = new Cliente();
    $cliente->Id = $fila['Id'];
    $cliente->Codigo = $fila['Codigo'];
    $cliente->Nombre = $fila['Nombre'];
    $cliente->Baja = $fila['Baja'];
    return $cliente;
   }

}

class Usuario
{
	public $Id;
  public $Codigo;
	public $NomUsu;
  public $Estado;
	public $Pass;


	public function InsertarUsuario()
	{
       $cone = new Conexion();
       // $contra = sha1($this->Contraseña);
       $sql = "insert into usuario values ('".$this->Id."','".$this->Codigo."','".$this->NomUsu."','".$this->Estado."','".$this->Contraseña."')";
       $cone->EjecutarSql($sql);
	}


	public function ActualizarUsuario()
	{
		$cone = new Conexion();
		$sql = "update Usuario u set Codigo = '".$this->Codigo."', NomUsu = '".$this->NomUsu."', Estado = '".$this->Estado."' ,'".$this->Pass."' where u.Id = ".$this->Id;
		$cone->EjecutarSql($sql);
	}
   
   public function EliminarUsuarios()
   {
    $cone = new Conexion();
    $sql = "delete from Usuario where Id = ".$this->Id;
    $cone->EjecutarSql($sql);
   }

  public static function ListadeUsuarios()
  {
    $cone = new Conexion();
    $sql = "select * from usuario";
    $tabla = $cone->Seleccionar($sql);
    $lista = array();
    $i = 0;
    while ($fila = mysql_fetch_array($tabla)) {
       $lista[$i] = Usuario::CreaUsuario($fila);
       $i++;
    }
    return $lista;
  }
   
   public static function Verificar($usuario,$pass)
   {
    $cone = new Conexion();
    $pas = sha1($pass);
    $sql = "select * from usuario where NomUsu = '".$usuario."' and Pass = '".$pass."'";
    $tabla = $cone->Seleccionar($sql);
    if (mysql_num_rows($tabla) > 0) {
       $fila = mysql_fetch_array($tabla);
       return Usuario::CreaUsuario($fila);
    }
    else
    {
      return null;
    }

   }

  public static function CreaUsuario($fila)
  {
     $usuario = new Usuario();
     $usuario->Id = $fila['Id'];
     $usuario->Codigo = $fila['Codigo'];
     $usuario->NomUsu = $fila['NomUsu'];
     $usuario->Estado = $fila['Estado'];
     $usuario->Pass = $fila['Pass'];
    return $usuario;
  }
}

class Materiales
{
	public $Id;
	public $Codigo;
	public $Nombre;
	public $Stock;
  public $Baja;

	public function InsertarMaterial()
	{
		$cone = new Conexion();
		$sql = "Insert into Materiales values ('".$this->Id."','".$this->Codigo."','".$this->Nombre."',
		'".$this->Stock."','1')";
		$cone->EjecutarSql($sql);
	}

	public function ActualizarMaterial()
	{
		$cone = new Conexion();
		$sql = "Update Materiales set Codigo = '".$this->Codigo."', Nombre = '".$this->Nombre."',Stock = '".$this->Stock."' where Id = ".$this->Id;
    $cone->EjecutarSql($sql);
	}
  
  public function EliminaMaterial()
  {
    $cone = new Conexion();
    $sql = "delete from Materiales where Id = ".$this->Id;
    $cone->EjecutarSql($sql);
  }

  public static function ListarMateriales()
  {
    $cone = new Conexion();
    $sql = "select * from Materiales";
    $tabla = $cone->Seleccionar($sql);
    $lista = array();
    $i=0;
    while ($fila = mysql_fetch_array($tabla)) {
        $lista[$i] = Materiales::CrearMaterial($fila);
        $i++;
    }
    return $lista;
  } 
  public static function CrearMaterial($fila)
  {
    $Material = new Materiales();
    $Material->Id = $fila['Id'];
    $Material->Codigo = $fila['Codigo'];
    $Material->Nombre = $fila['Nombre'];
    $Material->Stock = $fila['Stock'];
    return $Material;
  }


}

class Equipo
{
	public $Id;
	public $Codigo;
	public $Chip;
	public $Serie;
	public $Tarjeta;
	public $Modelo;
  public $Baja;

    public function InsertarEquipo()
    {
    	$cone = new Conexion();
    	$sql = "Insert into Equipo values ('".$this->Id."','".$this->Codigo."','".$this->Chip."','".$this->Serie."','".$this->Tarjeta."','".$this->Modelo."','1')";
        $cone->EjecutarSql($sql);
    }

    public function ActualizarEquipo()
    {
    	$cone = new Conexion();
    	$sql = "Update Equipo set Codigo = '".$this->Codigo."', Chip = '".$this->Chip."',Serie ='".$this->Serie."',Tarjeta = '".$this->Tarjeta."', Modelo = '".$this->Modelo."' where Id = ".$this->Id;
      $cone->EjecutarSql($sql);

    }
    public function EliminaEquipo()
    {
      $cone = new Conexion();
      $sql = "delete from Equipo where Id =".$this->Id;
      $cone->EjecutarSql($sql);
    }

    public static function ListarEquiposx()
    { 
      $cone = new Conexion();
      $sql = "select * from Equipo";
      $tabla = $cone->Seleccionar($sql);
      $lista = array();
      $i = 0;
      while ($fila = mysql_fetch_array($tabla)) {
         $lista[$i] = Equipo::CrearEquipo($fila);
         $i++;
      }
      return $lista;
    }
    
    public static function CrearEquipo($fila)
    {
      $Equipo = new Equipo();
      $Equipo->Id = $fila['Id'];
      $Equipo->Codigo = $fila['Codigo'];
      $Equipo->Chip = $fila['Chip'];
      $Equipo->Serie = $fila['Serie'];
      $Equipo->Tarjeta =$fila['Tarjeta'];
      $Equipo->Modelo = $fila['Modelo'];
      return $Equipo;
    }

}
class Instalacion
{
  public $Nro;
  public $Cliente;
  public $Tipo;
  public $Equipo;
  public $Materiales;
  public $Cantidad;
  public $Fecha;
  public $Ot;



  public function InsertarDetalle()
  {
    $cone = new Conexion();
    $sql = "insert into DetalleTrabajo values ('".$this->Nro."','".$cone->SacaCliente($this->Cliente)."','".$this->Tipo."' ,'".$cone->SacaEquipo($this->Equipo)."','".$cone->Nroid($this->Materiales)."','".$this->Cantidad."','".$this->Fecha."','".$this->Ot."')";
    $cone->EjecutarSql($sql);
  }
  
  public static function ListarInstalaciones()
  {
    $cone = new Conexion();
    $sql = "select * from DetalleTrabajo where Trabajo = '1'";
    $tabla = $cone->Seleccionar($sql);
    $lista = array();
    $i = 0;
    while ($fila = mysql_fetch_array($tabla)) {
       $lista[$i] = Instalacion::CrearTrabajo($fila);
       $i++;
    }
    return $lista;
  }
   
  public static function ListarSoportes()
   {
    $cone = new Conexion();
    $sql = "select * from DetalleTrabajo where Trabajo = '2'";
    $tabla = $cone->Seleccionar($sql);
    $lista = array();
    $i = 0;
    while ($fila = mysql_fetch_array($tabla)) {
       $lista[$i] = Instalacion::CrearTrabajo($fila);
       $i++;
    }
    return $lista;
  }

  public static function CrearTrabajo($fila)
  {
    $Instalacion = new Instalacion();
    $Instalacion->Id = $fila["Id"];
    $Instalacion->Cliente = $fila["Cliente"];
    $Instalacion->Trabajo = $fila["Trabajo"];
    $Instalacion->Equipo = $fila["Equipo"];
    $Instalacion->Materiales = $fila["Materiales"];
    $Instalacion->Cantidad_Materiales = $fila["Cantidad_Materiales"];
    $Instalacion->Fecha = $fila["Fecha"];
    $Instalacion->Ot = $fila["Ot"];
    return $Instalacion;
  }

}

?>