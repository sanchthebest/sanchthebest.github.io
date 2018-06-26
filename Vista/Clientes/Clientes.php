<?php
include_once("Vista/Cabecera/Cabecera.php"); 
?>
  <div class="container-fluid">
<div class="page-content-wrap">
    <div class="container-fluid">
	    <div class="page-header">
         <h1 class="all-tittles">Red Go Clientes<small></small></h1>
        </div>
        	<hr>
      <div class="container-fluid">
        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalcliente" onclick="Nuevo1();" ><span class="fa fa-plus"> Nuevo Cliente</span></button>
      </div>
     <hr>
     <div class="">
     <h3>LISTA DE CLIENTES REGISTRADOS</h3>
     </div>
       <hr>
    <div id="listaclientes">
      
    </div>



    <!-- ojo esta parte es para el modal -->
    <div class="modal fade" id="modalcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
     <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Formulario de Clientes</h4>
      </div>
      <div class="modal-body">
     <form class="form-horizontal" id="frmcliente"  role = "form">
       <div class="form-group">
        <input type="hidden" id="id" name="id">
        <label for="inputEmail3" class="col-sm-2 control-label">Codigo:</label>
         <div class="col-sm-9">
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo....">
       </div>
        </div>
       <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Nombre</label>
         <div class="col-sm-9">
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre.....">
         </div>
         <input type="hidden" name="baja" id="baja" value="1">
        </div>
   </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default btn-info" data-dismiss="modal">Cancelar</button> -->
      <button type="button" class="btn btn-info btn-block col-md-5" onclick="Agregarclientes();"><b>REGISTRAR</b></button>
      </div>
    </div>
    </div>
   </div>

    </div>
</div>
  </div>
<?php
include_once("Vista/Pie/Pie.php"); 
?>
<script type="text/javascript">
  
ListarClientes();
function ListarClientes()
{
  var url = "<?php echo "$raiz";?>Inicio/ListarClientes";
  $.get(url,null,function(res){
  var tabla = "<table id='tablaclientes' class='table table-bordered '><thead><tr><th>Id</th><th>Codigo</th><th>Nombre</th><th>Estado</th><th>Acciones</th></tr></thead><tbody>";
  var lista = JSON.parse(res)
  var nro = 1;
  for (var i = 0; i < lista.length; i++) {
    tabla+="<tr><td>"+nro+++"</td><td>"+lista[i].Codigo+"</td><td>"+lista[i].Nombre+"</td><td>"+lista[i].Baja+"</td><td><button class = 'btn btn-success' data-toggle = 'modal' data-target = '#modalcliente' onclick ='ActuaCliente("+lista[i].Id+"\,\""+lista[i].Codigo+"\",\""+lista[i].Nombre+"\",\""+lista[i].Baja+"\")' ><span class='glyphicon glyphicon-pencil'></span>Editar</button>&nbsp<button class = 'btn btn-danger'><span class='glyphicon glyphicon-remove' onclick ='EliminaCliente("+lista[i].Id+")'></span>Eliminar</button></td></tr>";
    }
    $("#listaclientes").html(tabla);
    $("#tablaclientes").DataTable();

  });
}

function ActuaCliente(id,codi,nombre,estado)
{
   $("#id").val(id);
   $("#codigo").val(codi);
   $("#nombre").val(nombre);
   $("#estado").val(estado);
}
 
function Nuevo1()
{
   $("#id").val("");
   $("#codigo").val("");
   $("#nombre").val("");
   $("#estado").val("");
}
</script>