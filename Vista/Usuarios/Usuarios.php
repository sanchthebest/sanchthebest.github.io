<?php 
include_once("Vista/Cabecera/Cabecera.php");
?>
<div class="container-fluid">
 <div class="page-content-wrap">
 	<div class="container-fluid">
 		 <div class="page-header">
         <h1 class="all-tittles">Red Go Usuarios<small></small></h1>
        </div>
        	<hr>
      <div class="container-fluid">
        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalcliente" onclick="Nuevo();" ><span class="fa fa-plus"> Nuevo Usuario</span></button>
      </div>

  <!-- ojo de aqui parte para el modal de registro de usuarios -->
    <div class="modal fade" id="modalcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
     <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Formulario de Clientes</h4>
      </div>
      <div class="modal-body">
     <form class="form-horizontal" id="frmusuario"  role = "form">
       <div class="form-group">
        <input type="hidden" id="id" name="id">
        <label for="inputEmail3" class="col-sm-2 control-label">Codigo:</label>
         <div class="col-sm-9">
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo....">
       </div>
        </div>
       <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Usuario:</label>
         <div class="col-sm-9">
          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre.....">
         </div>
        </div>
       <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Estado</label>
         <div class="col-sm-9">
          <select style="width: 100%;height: 30px;border-radius: 3px;" id="estado" name="estado">
          	<option value="Activo">Activo</option>
          	<option value="Inactivo">Inactivo</option>
          </select>
         </div>
        </div>
        <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
         <div class="col-sm-9">
          <input type="password" class="form-control" id="pass" name="pass" placeholder="Password.....">
         </div>
        </div>
        <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Conf. Pass</label>
         <div class="col-sm-9">
          <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Password.....">
         </div>
        </div>
   </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-info btn-block col-md-5" onclick="AgregarUsuario();"><b>REGISTRAR</b></button>
      </div>
    </div>
    </div>
   </div>
       <hr>
       <h3 style="font-family: Algerian; color: blue; text-align: center;">LISTA DE USUARIOS REGISTRADOS</h3>
       <div class="" id="listausuarios">
       	
       </div>



 	</div>
 </div>
	
</div>

<?php
include_once("Vista/Pie/Pie.php"); 
?>
<script type="text/javascript">
	ListarUsers();

	function ActuaUser(id,codi,user,estado)
  	{
      $("#id").val(id);
      $("#codigo").val(codi);
      $("#usuario").val(user);
      $("#estado").val(estado);
	}

	function Nuevo()
	{
		$("#id").val("");
		$("#codigo").val("");
		$("#usuario").val();

	}
</script>