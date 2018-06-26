<?php 
include_once("Vista/Cabecera/Cabecera.php");
?>
  <div class="container-fluid">
  	 <div class="page-content-wrap">
  	 	<div class="container-fluid">
  	 		<div class="page-header">
             <h1 class="all-tittles">Red Go Instalacion<small></small></h1>
            </div>
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active"><a href="<?php echo "$raiz";?>Inicio/Instalaciones">Nuevo Trabajo</a></li>
                      <li><a href="<?php echo "$raiz";?>Inicio/ListaInstalaciones">Lista de Instalaciones</a></li>
                      <li> <a href="<?php echo "$raiz";?>Inicio/ListaSoportes"></a> Lista de Soportes</li>
                    </ol>
                </div>
            </div>
            <h3 style="text-align: center;">FORMULARIO DE REGISTRO DE INSTALACIONES</h3>
            <hr>

      <div class="row">
       <div class="col-xs-10 col-md-7" style="width: 80%;">IZUIERDA
     <div class="form-horizontal " style="width: 100%;">  
      <!-- <form role = "form" id="frmekipo" class="form-horizontal"> -->
       <input type="hidden" name="id" id="id">
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Cliente</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" required="" name="cliente" id="cliente" placeholder="Cliente.....">
            </div>
            <div class="col-sm-5">
              <button class="btn btn-warning fa-fa-plus"  data-toggle="modal" data-target="#modalinstalacion">+</button>
            </div>
          </div>
          <div class="form-group">
           <label for="inputEmail3" class="col-sm-2 control-label">Tipo Trabajo</label>
           <div class="col-sm-5">
            <select class="" id="tipo" style="width: 100%; height: 30px; border-radius: 3px;">
             <option value="1">Instalacion</option>
             <option value="2">Soporte</option>
            </select>
           </div>
          </div>
          <div class="form-group">
           <label for="inputEmail3" class="col-sm-2 control-label">Equipos:</label>
           <div class="col-sm-5">
            <select class="" id="equipos" style="width: 100%; height: 30px; border-radius: 3px;">
            </select>
           </div>
          </div>
         <div class="form-group">
         <label for="serie" class="col-sm-2 control-label">Materiales</label>
         <div class="col-sm-2" id="mate">
         <select class="" id="materiales" name="materiales" style="width: 100%;height: 30px;border-radius: 3px;">
           
         </select>
         </div>
         <label class="col-sm-1 control-label">Cantidad</label>
         <div class="col-sm-1">
         <input type="number" class="form-control" name="cantidad" id="cantidad"  placeholder="0">
         </div>
         <div class="col-sm-6">
          <button class="btn btn-warning fa-fa-plus" onclick="CargaMateriales($('#materiales').val(),$('#cantidad').val());">+</button>
          </div>
         </div>
         <div class="form-group">
         <label for="tarjeta" class="col-sm-2 control-label">Fecha</label>
         <div class="col-sm-5">
         <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Tarjeta....">
         </div>
         </div>
         <div class="form-group">
         <label for="modelo" class="col-sm-2 control-label">OT</label>
         <div class="col-sm-5">
         <input type="text" class="form-control"  name="ot" id="ot" placeholder="Modelo...."> 
         </div>
         </div>
        </div>
      <!-- </form> -->
      <br>
      <div class="form-group">
       <div class="col-sm-offset-4 col-sm-10">
         <button class="btn btn-success btn-lg" onclick="Agregax();">REGISTRAR</button>
          <!-- <button class="btn btn-success btn-lg" onclick="Agregarx();">REGISTRAR</button> -->
          </div>
        </div>
       </div>
       <div class="col-xs-5 col-md-2">
           <button class="btn btn-danger btn-block">Limpiar</button>
           <button class="btn btn-primary btn-block" type="button">
           Materiales<span class="badge" id="" value='10'></span>
          </button>
            <div id="lista">
            </div>
       </div>
     </div>
     <!-- ojo pruebas para el select que asco de team -->
  	 </div>
  	</div>
  </div>

 <!-- modal para mostrar la lista de clientes -->
  <div class="modal fade" id="modalinstalacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="width: 55%;">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Formulario de Clientes</h4>
      </div>
       <div id="listaclientes">
       </div>
      <div class="modal-footer">
      </div>
    </div>
    </div>
   </div>
     
<!--    <select name="au" id="auxi"> me la pelas
     <option value = "kak"></option>
     <option value = "kak">A</option>
     <option value = "kak">B</option>
   </select> -->
   <input type="hidden" name="auxi1" id="auxi1">
   <input type="hidden" name="auxi2" id="auxi2">
<?php
include_once("Vista/Pie/Pie.php"); 
?>
<script type="text/javascript">
LisEquipos();
SeleccionaClientes();
CargaComboMateriales();
function LisEquipos()
{
	var url = "<?php echo "$raiz";?>Inicio/Listare";
	var items = "";
	$.get(url,null,function(res){
	var lista = JSON.parse(res);
    for (var i = 0; i < lista.length; i++) {
    	items+="<option id ='a'>"+lista[i].Codigo+"</option>";
       }
    $("#equipos").html(items);
	});
}
function Agarrarcliente(nombre)
{
   alert(nombre);
   $("#cliente").val(nombre);
}
var lista = [,];
// var i = 1;
function CargaMateriales(nombre,cantidad)
{
   var a = nombre;
   var b = cantidad;
  // ojo falta el diseño
   lista.push(a,b);
   var item = "<ul class ='list-group' id ='lista'>";
    for (var i = 1; i < lista.length; i++)
    {
      item +="<li class = 'list-group-item' onclick = 'Hola();'><span class='badge'>"+lista[i +1]+"</span>"+lista[i]+"</li></ul>"; 
      i++;
    }
    $("#lista").html(item);
}
function CargaComboMateriales()
{
  var url = "<?php echo "$raiz";?>Inicio/ListaMaterial";
  var items ="";
  $.get(url,null,function(res){
  var lista = JSON.parse(res);
    for (var i = 0; i < lista.length; i++) {
      items+="<option>"+lista[i].Nombre+"</option>";
       }
    $("#materiales").html(items);
  });
}
function Agregax()
{
  var url = "<?php echo "$raiz";?>Acciones/RegistraDetalle";
  var a;
  var b;
  for (var i = 1; i < lista.length; i++)
  {
    a = lista[i];
    b = lista[i+1];
    $("#auxi1").val(lista[i+1]);
    $("#auxi2").val(lista[i]);
    var obj = {id:$("#id").val(),cliente:$("#cliente").val(),tipo:$("#tipo").val(),equipos:$("#equipos").val(),materiales:$("#auxi2").val(),cantidad:$("#auxi1").val(),fecha:$("#fecha").val(),ot:$("#ot").val()};
    $.post(url,obj,function(res)
    {
    // alert(res);
    if (res == 'ok')
    {
      toastr.success("Registro de manera exitosa");
    }
    else
    {
      toastr.error( res +" No se pudo registrar");
    }
    });
    i++;
  }
}


</script>