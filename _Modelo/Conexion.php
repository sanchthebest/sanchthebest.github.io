<?php
class Conexion
{
	public $server;
	public $usuario;
	public $pass;
	public $db;

	public function __construct()
	{
		$this->server = "localhost";
		$this->usuario = "root";
		$this->pass = "";
		$this->db = "Uno";
	}

	public function EjecutarSql($sql)
	{
		$con = mysql_connect($this->server,$this->usuario,$this->pass);
		if (!$con) 
		{			
			die("No se tiene acceso al servidor".mysql_error());
		}
		mysql_select_db($this->db, $con);
		if (!mysql_query($sql,$con))
		{
			die("No se puede ejecutar la consulta".mysql_error());
		}
		mysql_close($con);
	}
	public function Select($sql)	
	{
		$con = mysql_connect($this->server,$this->usuario,$this->pass);
		if (!$con) 
		{			
			die("No se tiene acceso al servidor".mysql_error());
		}
		mysql_select_db($this->db, $con);
		$tabla = mysql_query($sql,$con);
		if ($tabla == false)
		{
			die("No se pude seleccionar datos".mysql_error());
		}
		mysql_close($con);
		return $tabla;
	}
}

?>