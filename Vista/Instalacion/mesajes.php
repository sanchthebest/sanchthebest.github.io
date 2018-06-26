<?php 
include_once("Vista/Cabecera/Cabecera.php");
?>
 <div class="container-fluid">
 	<button onclick="mates();">hola</button>
   <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalcliente" onclick="mates();" ><span class="fa fa-plus"> Nuevo Cliente</span></button>
 	 
    <hr>
    <br>
   <div class="row">
    <div class="col-xs-5 col-md-5">.col-xs-6 .col-md-4</div>
    <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
    <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
   </div>
    
     <div class="row">
     <div class="col-md-6">
     <div class="form-horizontal " style="width: 100%;">  
      <!-- <form role = "form" id="frmekipo" class="form-horizontal"> -->
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
           <div class="col-sm-4">
            <select class="" id="equipos" style="width: 100%;height: 30px;border-radius: 3px;">
            </select>
           </div>
         <label class="col-sm-1 control-label">Cantidad</label>
         <div class="col-sm-2">
         <input type="number" class="form-control" min="1" name="cantidadeq" id="cantidadeq"  placeholder="0">
         </div>
         <div class="col-sm-3">
          <button class="btn btn-warning fa-fa-plus" onclick="CargaEquipos($('#equipos').val(),$('#cantidadeq').val());">+</button>
          </div>
         </div>

         <div class="form-group">
         <label for="serie" class="col-sm-2 control-label">Materiales</label>
         <div class="col-sm-4" id="mate">
         <select class="" id="materiales" name="materiales" style="width: 100%;height: 30px;border-radius: 3px;">
           
         </select>
         </div>
         <label class="col-sm-1 control-label">Cantidad</label>
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
     <div class="col-md-3">.col-md-4</div>
     <div class="col-md-3">.col-md-4</div>
    </div>

 </div>


<!-- ojo para el modal -->
 <div class="modal fade" id="modalcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
     <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Formulario de Clientes</h4>
      </div>
      <div class="modal-body">
       <ul class="list-group" id="lista"></ul>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default btn-info" data-dismiss="modal">Cancelar</button> -->
      </div>
    </div>
    </div>
   </div>


<?php 
 include_once("Vista/Pie/Pie.php");
 ?>

 <script type="text/javascript">
  // mates();
function mates()
{
   var url = raiz +"Inicio/ListaMaterial";
   $.get(url,null,function(res){
   var item = "<ul class ='list-group' id ='lista'>";
   var lista = JSON.parse(res)
   var nro = 1;
   for (var i = 0; i < lista.length; i++) {
       item +="<li class = list-group-item onclick ='hola("+lista[i].Stock+")'><span class='badge'>"+lista[i].Stock+"</span>"+lista[i].Nombre+"</li></ul>"; 
     }
    $("#lista").html(item);

  });
}

function hola(sto)
{
	alert(sto);
}


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
function Agarrarcliente(codi)
{
   alert(codi);
   $("#cliente").val(codi);
}
var lista = [,];
function CargaMateriales(nombre,cantidad)
{
   var a = nombre;
   var b = cantidad;
  // ojo falta el diseño
   lista.push(a,b);
   var item = "<ul class ='list-group' id ='lista'>";
    for (var i = 1; i < lista.length; i++)
    {
      item  +="<li class = 'list-group-item'><span class='badge'>"+lista[i +1]+"</span>"+lista[i]+"</li></ul>"; 
      alert(lista[i]);
      alert(lista[i + 1]);
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
  alert("entra");
  var url = "<?php echo "$raiz";?>Acciones/RegistraDetalle";
  var obj = {id:$("#id").val(),cliente:$("#cliente").val(),tipo:$("#tipo").val(),equipos:$("#equipos").val(),materiales:$("#materiales").val(),cantidad:$("#cantidad").val(),fecha:$("#fecha").val(),ot:$("#ot").val()};
  $.post(url,obj,function(res){
   alert(res);
   if (res == 'ok'){
     toastr.success("Registro de manera exitosa");
   }
   else{
    toastr.error( res +" No se pudo registrar");
   }
  });
}

 </script>


