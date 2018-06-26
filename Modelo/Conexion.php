<?php 
class Conexion
{
  public $server;
  public $usuario;
  public $pass;
  public $basedatos;

  public function __construct()
  {
    $this->server = "Localhost";
    $this->usuario = "root";
    $this->pass = "";
    $this->basedatos = "redgo";

  }

  public function EjecutarSql($sql)
  {
    $cone = mysql_connect($this->server,$this->usuario,$this->pass);
    if (!$cone) {
      die("No se puede conectar con la base de datos".mysql_error());
    }
    mysql_select_db($this->basedatos,$cone);
    if (!mysql_query($sql,$cone)) {
      echo "<h2>$sql</h2>";

      die("No se puede ejecutar la consulta".mysql_error());
    }
    mysql_close($cone);
  }

  
  public function Seleccionar($sql)
  {
    $cone = mysql_connect($this->server,$this->usuario,$this->pass);
    if (!$cone) 
    {
      die("No se puede conectar con el serivdor");
    }
    mysql_select_db($this->basedatos,$cone);
    $tabla = mysql_query($sql,$cone);
    if ($tabla == false) 
    {
       die("No se puede seleccionar".mysql_error());
    }
    mysql_close($cone);
    return $tabla;
  }
  public function Nroid($mate)
  {
    $con = mysql_connect($this->server,$this->usuario,$this->pass);
    if (!$con) {
      die("No se pudo conectar con el servidor Verifique");
    }
    mysql_select_db($this->basedatos,$con);
    $sql = "Select Id from Materiales where Nombre = '".$mate."' ";
    $id = mysql_result(mysql_query($sql), 0,0);
    if ($id == false) {
    echo "<h2>$sql</h2>";
    die("ffsf");
    }
    mysql_close($con);
    return $id;
  }

  public function SacaCliente($clie)
  {
    $con = mysql_connect($this->server,$this->usuario,$this->pass);
    if (!$con) {
      die("No se pudo conectar con el servidor Verifique");
    }
    mysql_select_db($this->basedatos,$con);
    $sql = "Select Id from Cliente where Nombre = '".$clie."' ";
    $id = mysql_result(mysql_query($sql), 0,0);
    if ($id == false) {
    die("XXXX");
    }
    mysql_close($con);
    return $id;
  }

  public function SacaEquipo($equi)
  {
    $con = mysql_connect($this->server,$this->usuario,$this->pass);
    if (!$con) {
      die("No se pudo conectar con el servidor Verifique");
    }
    mysql_select_db($this->basedatos,$con);
    $sql = "Select Id from Equipo where Codigo = '".$equi."' ";
    $id = mysql_result(mysql_query($sql), 0,0);
    if ($id == false) {
    die("XXXX");
    }
    mysql_close($con);
    return $id;
  }

  function Llave($a)
  {
    $con = mysql_connect($this->server,$this->usuario,$this->pass);
    if (!$con) {
      die("No se pudo conectar con el servidor Verifique");
    }
    mysql_select_db($this->basedatos,$con);
    $sql = "select Nro from bloque where Nombre = '".$a."'";
     $nro = mysql_result(mysql_query($sql), 0,0);
    if ($nro == false) {
    die("XXXX");
    }
    mysql_close($con);
    return $nro;

  }

}

 ?>
