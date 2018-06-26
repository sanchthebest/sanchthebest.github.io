<?php 
include_once("Vista/Cabecera/Cabecera.php");
?>
  <div class="container-fluid">
    <div class="page-content-wrap">
   	  <div class="page-header">
         <h1 class="all-tittles">Lista de Instalaciones Realizadas <small></small></h1>
        </div>
        <hr>
           <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active"><a href="<?php echo "$raiz";?>Inicio/Instalacion">Nuevo Trabajo</a></li>
                      <li><a href="<?php echo "$raiz";?>Inicio/ListaInstalaciones">Listado de Instalaciones</a></li>
                      <li><a href="<?php echo "$raiz";?>Inicio/ListaSoportes">Lista de Soportes</a> </li>
                    </ol>
                </div>
            </div>
        </div> 
         <div>
       	 <h3 style="font-family: algerian;text-align: center;color: #455445;">INSTALACIONES REALIZADAS</h3>
       </div>
       <div id="listainstalaciones">
       	
       </div> 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
     <!-- ojo el modal para actualizar mi isntalacion -->
      
  <div class="modal fade" id="modalinstalaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">INSTALACIONES REALIZADAS</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" id="frmekipo"  role = "form">
              <input type="hidden" name="id" id="id">
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Cliente</label>
        <div class="col-sm-7">
        <input type="text" class="form-control" required="" name="cliente" id="cliente" placeholder="Cliente.....">
            </div>
            <div class="col-sm-3">
              <button class="btn btn-warning fa-fa-plus"  data-toggle="modal" data-target="#modalinstalacion">+</button>
            </div>
          </div>
          <div class="form-group">
           <label for="inputEmail3" class="col-sm-2 control-label">Tipo Trabajo</label>
           <div class="col-sm-7">
            <select class="" id="tipo" style="width: 100%; height: 30px; border-radius: 3px;">
             <option value="1">Instalacion</option>
             <option value="2">Soporte</option>
            </select>
           </div>
          </div>
          <div class="form-group">
           <label for="inputEmail3" class="col-sm-2 control-label">Equipos:</label>
           <div class="col-sm-7">
            <select class="" id="equipos" style="width: 100%; height: 30px; border-radius: 3px;">
            </select>
           </div>
          </div>
         <div class="form-group">
         <label for="serie" class="col-sm-2 control-label">Materiales</label>
         <div class="col-sm-4" id="mate">
         <select class="" id="materiales" name="materiales" style="width: 100%;height: 30px;border-radius: 3px;">
         </select>
         </div>
         <label class="col-sm-1 control-label">Cant.. </label>
         <div class="col-sm-2">
         <input type="number" class="form-control" name="cantidad" id="cantidad"  placeholder="0">
         </div>
         <div class="col-sm-3">
          <button class="btn btn-warning fa-fa-plus" onclick="CargaMateriales($('#materiales').val(),$('#cantidad').val());">+</button>
          </div>
         </div>
         <div class="form-group">
         <label for="tarjeta" class="col-sm-2 control-label">Fecha</label>
         <div class="col-sm-7">
         <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Tarjeta....">
         </div>
         </div>
         <div class="form-group">
         <label for="modelo" class="col-sm-2 control-label">OT</label>
         <div class="col-sm-7">
         <input type="text" class="form-control"  name="ot" id="ot" placeholder="Modelo...."> 
         </div>
         </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success">REGISTRAR</button>
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
listarInstalaciones();

function listarInstalaciones()
{
	alert("entra");
	var url = "<?php echo "$raiz";?>Inicio/ListaInstalacion";
    var tabla ="<table id='tablainstalacion' class='table table-bordered table-responsive'><thead><tr><th>Nro</th><th>Cliente</th><th>Trabajo</th><th>Equipo</th><th>Materiales</th><th>Cantidad</th><th>Fecha</th><th>OT</th><th>Acciones</th></tr></thead><tbody>";
    var nro =1 ;
	$.get(url,null,function(res){
	var lista = JSON.parse(res);
	for (var i = 0; i < lista.length; i++) {
         tabla+="<tr><td>"+nro+++"</td><td>"+lista[i].Cliente+"</td><td>"+lista[i].Trabajo+"</td><td>"+lista[i].Equipo+"</td><td>"+lista[i].Materiales+"</td><td>"+lista[i].Cantidad_Materiales+"</td><td>"+lista[i].Fecha+"</td><Td>"+lista[i].Ot+"</td><td><button class = 'btn btn-success' data-toggle = 'modal' data-target = '#modalinstalaciones' onclick ='ActuaEquipo("+lista[i].Id+"\,\""+lista[i].Codigo+"\",\""+lista[i].Chip+"\",\""+lista[i].Serie+"\",\""+lista[i].Tarjeta+"\",\""+lista[i].Modelo+"\")' ><span class='glyphicon glyphicon-pencil'></span></button>&nbsp<button class = 'btn btn-danger'><span class='fa fa-trash-o' onclick ='Elimina1("+lista[i].Id+")'></span></button></td></tr>";
	  }
      $("#listainstalaciones").html(tabla);
      $("#tablainstalacion").DataTable();
   });
}

function Editar(Clie,insta,equi,fecha,ot)
{
  $("#")
}


</script>