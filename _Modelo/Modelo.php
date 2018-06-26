<?php
include_once("Conexion.php");
/**
* 
*/

class Deducir
{
	public $id;
	public $sintoma;
	public $enfermedad;

	public function Insertar()
	{
		$con = new Conexion();
		$sql = "Insert into deducir (sintoma,enfermedad) values ('".$this->sintoma."','".$this->enfermedad."')";
		$con->EjecutarSql($sql);
	}

		function EliminarSintoma()
	{
		$con = new Conexion();
		$sql = "delete from deducir where id = '".$this->id."' ";
		$con->EjecutarSql($sql);
	}
			function Eliminartodo()
	{
		$con = new Conexion();
		$sql = "delete from deducir  ";
		$con->EjecutarSql($sql);
	}
	public static function Listadeducir()
	{
		$con = new Conexion();
		$sql = "Select * from deducir ";
		$tabla = $con->Select($sql);
		$lista = array();
		$i = 0;
		while ($fila = mysql_fetch_array($tabla)) 
		{
			$lista[$i] = Deducir::Crear($fila);
			$i++;
		}
		return $lista;
	}

	public static function Crear($fila)
	{
		$obj = new Deducir();
		$obj->id = $fila["id"];
		$obj->sintoma = $fila["sintoma"];
		$obj->enfermedad = $fila["enfermedad"];

		return $obj;
	}


	public static function ValidarYaREGISTRADO($sintoma,$enfermedad)
	{
		$con = new Conexion();
		$sql = "Select * from deducir where sintoma = '".$sintoma."' and enfermedad = '".$enfermedad."' ";
		$tabla = $con->Select($sql);
		
		if (mysql_num_rows($tabla) > 0) {
			return true;
		}
		else
		{
			return false;
		}
	}


		public static function ELquemasserepite()
	{
		$con = new Conexion();
		$sql = "Select right(enfermedad,25) as enfermedad, count(1) as veces from deducir group by right(enfermedad,25) order by 1 desc ";
		$tabla = $con->Select($sql);
		$lista = array();
		$i = 0;
		while ($fila = mysql_fetch_array($tabla)) 
		{
			$lista[$i] = Deducir::Crear2($fila);
			$i++;
		}
		return $lista;
	}

		public static function Crear2($fila)
	{
		$obj = new Deducir();

		$obj->enfermedad = $fila["enfermedad"];
		$obj->veces = $fila["veces"];

		return $obj;
	}



}

class Enfermedades
{
	public $id;
	public $nombre;
	public $descripcion;

	public function Insertar()
	{
		$con = new Conexion();
		$sql = "Insert into enfermedad(nombre,descripcion) values ('".$this->nombre."','".$this->descripcion."')";
		$con->EjecutarSql($sql);
	}
	public static function ListaEnfermedades()
	{
		$con = new Conexion();
		$sql = "Select * from enfermedad ";
		$tabla = $con->Select($sql);
		$lista = array();
		$i = 0;
		while ($fila = mysql_fetch_array($tabla)) 
		{
			$lista[$i] = Enfermedades::Crear($fila);
			$i++;
		}
		return $lista;
	}

	public static function Crear($fila)
	{
		$obj = new Enfermedades();
		$obj->id = $fila["id"];
		$obj->nombre = $fila["nombre"];
		$obj->descripcion = $fila["descripcion"];

		return $obj;
	}
}
class Sintomas
{
	public $id;
	public $nombre;
	public $descripcion;
	public $enfermedad;

	public function Insertar()
	{
		$con = new Conexion();
		$sql = "Insert into sintoma (nombre,descripcion,enfermedad) values ('".$this->nombre."','".$this->descripcion."','".$this->enfermedad."')";
		$con->EjecutarSql($sql);
	}
	public static function ListaSintomas()
	{
		$con = new Conexion();
		$sql = "Select * from sintoma  ";
		$tabla = $con->Select($sql);
		$lista = array();
		$i = 0;
		while ($fila = mysql_fetch_array($tabla)) 
		{
			$lista[$i] = Sintomas::Crear($fila);
			$i++;
		}
		return $lista;
	}

		public static function Listatodoslossintomas($nombre)
	{
		$con = new Conexion();
		$sql = "Select * from sintoma where enfermedad = '".$nombre."' ";
		$tabla = $con->Select($sql);
		$lista = array();
		$i = 0;
		while ($fila = mysql_fetch_array($tabla)) 
		{
			$lista[$i] = Sintomas::Crear($fila);
			$i++;
		}
		return $lista;
	}

		public static function Cantidadderepetisionessintomas()
	{
		$con = new Conexion();
		$sql = "Select right(enfermedad,25) as enfermedad, count(1) as veces from sintoma group by right(enfermedad,25) order by 1 desc ";
		$tabla = $con->Select($sql);
		$lista = array();
		$i = 0;
		while ($fila = mysql_fetch_array($tabla)) 
		{
			$lista[$i] = Sintomas::Crear2($fila);
			$i++;
		}
		return $lista;
	}


	public static function Crear($fila)
	{
		$obj = new Sintomas();
		$obj->id = $fila["id"];
		$obj->nombre = $fila["nombre"];
		$obj->descripcion = $fila["descripcion"];
		$obj->enfermedad = $fila["enfermedad"];

		return $obj;
	}

		public static function Crear2($fila)
	{
		$obj = new Sintomas();

		$obj->enfermedad = $fila["enfermedad"];
		$obj->veces = $fila["veces"];

		return $obj;
	}



}
class Tratamientos
{
	public $id;
	public $nombre;
	public $descripcion;
	public $enfermedad;

	public function Insertar()
	{
		$con = new Conexion();	
		$sql = "Insert into tratamiento (nombre,descripcion,enfermedad) values ('".$this->nombre."','".$this->descripcion."','".$this->enfermedad."')";
		$con->EjecutarSql($sql);
	}
	public static function Listatratamientos()
	{
		$con = new Conexion();
		$sql = "Select * from tratamiento  ";
		$tabla = $con->Select($sql);
		$lista = array();
		$i = 0;
		while ($fila = mysql_fetch_array($tabla)) 
		{
			$lista[$i] = Tratamientos::Crear($fila);
			$i++;
		}
		return $lista;
	}


		public static function Listatodoslostratamientos($nombre)
	{
		$con = new Conexion();
		$sql = "Select * from tratamiento where enfermedad = '".$nombre."' ";
		$tabla = $con->Select($sql);
		$lista = array();
		$i = 0;
		while ($fila = mysql_fetch_array($tabla)) 
		{
			$lista[$i] = Tratamientos::Crear($fila);
			$i++;
		}
		return $lista;
	}


	public static function Crear($fila)
	{
		$obj = new Tratamientos();
		$obj->id = $fila["id"];
		$obj->nombre = $fila["nombre"];
		$obj->descripcion = $fila["descripcion"];
		$obj->enfermedad = $fila["enfermedad"];

		return $obj;
	}
}






class Usuario
{
	public $id;
	public $nombre;
	public $correo;
	public $usuario;
	public $password;
	public $tipo; 

	public function Insertar()
	{
		$con = new Conexion();
		$sql = "Insert into usuarios (correo,usuario,password,tipo) values ('".$this->correo."','".$this->usuario."','".$this->password."','".$this->tipo."')";
		$con->EjecutarSql($sql);
	}


	public static function Crear($fila)
	{
		$obj = new Usuario();
		$obj->id = $fila["id"];
		$obj->correo = $fila["correo"];
		$obj->usuario = $fila["usuario"];
		$obj->password = $fila["password"];		
		$obj->tipo = $fila["tipo"];			
		return $obj;
	}
	public static function Grilla()
	{
		$con = new Conexion();
		$sql = "Select * from usuarios order by id desc";
		$tabla = $con->Select($sql);
		$lista = array();
		$i = 0;
		while ($fila = mysql_fetch_array($tabla)) 
		{
			$lista[$i] = Usuario::Crear($fila);
			$i++;
		}
		return $lista;
	}
	public static function Cid()
	{
		$con = new Conexion();
		$sql = "SELECT count(id) as total FROM `usuarios`";
		$tabla = $con->Select($sql);
		$lista = array();
		$i = 0;
		while ($fila = mysql_fetch_array($tabla)) 
		{
			$lista[$i] = Usuario::Crear($fila);
			$i++;
		}
		return $lista;
	}


	public static function Verificar($correo)
	{
		$con = new Conexion();
		$sql = "Select * from usuarios where correo = '".$correo."' ";
		$tabla = $con->Select($sql);
		
		if (mysql_num_rows($tabla) > 0) {
			return true;
		}
		else
		{
			return false;
		}
	}
	public static function Autenticar($usuario,$password,$tipo)
	{
		$con = new Conexion();
		$sql = "Select * from usuarios where usuario = '".$usuario."' and password = '".$password."' and tipo = '".$tipo."'";
		$tabla = $con->Select($sql);
		
		if (mysql_num_rows($tabla) > 0) {
			$fila=mysql_fetch_array($tabla);
			return Usuario::Crear($fila);
		}
		else
		{
			return null;
		}
	}
	

}




?>
