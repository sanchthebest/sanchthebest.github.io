<?php 
include_once("Vista/Cabecera/Cabecera.php");
?>
<div class="container-fluid">
 <div class="page-content-wrap">
 	<div class="container-fluid">
 		 <div class="page-header">
         <h1 class="all-tittles">Registro de Materiales <small></small></h1>
        </div>
 	</div>
 	<hr>
    <div class="row">
         <div class="col-md-2">                        
             <a href="#" class="tile tile-info" data-toggle="modal" data-target="#modalmaterial" onclick="Nuevo();" >
                              Nuevo
            <p>Material</p>                            
             <div class="informer informer-default dir-tr"><span class="fa fa-briefcase"></span></div>
                </a>                        
            </div>
      
     	<div class="col-md-8" id="ubicacion1"> 

		</div>  

	<div class="col-md-9"> 
     <div class="panel panel-info">
       <div class="panel-body">
        <div class="table-responsive">
         <div id="ubicacion">
          </div>
        </div>
       </div>  
    </div>
  </div>
   
     </div>               
 <!-- ojo de aqui para mi modal que asco -->
<div class="modal fade" id="modalmaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Formulario de Materiales</h4>
      </div>
      <div class="modal-body">
   <form class="form-horizontal" id="frmmaterial"  role = "form">
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
        </div>
      <div class="form-group">
       <label for="inputPassword3" class="col-sm-2 control-label">Stock</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock..">
       </div>
     </div>
   </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default btn-info" data-dismiss="modal">Cancelar</button> -->
      <button type="button" class="btn btn-warning btn-block col-md-5" onclick="AgregarMaterial();"><b>REGISTRAR</b></button>
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
	
ListadeMateriales();
function ListadeMateriales()
{
	var url = "<?php echo "$raiz";?>Inicio/ListaMaterial";
	$.get(url,null,function(msj){
    var lista = JSON.parse(msj);
    var tabla = "<table id='tablamaterial' class='table  table-responsive'><thead><tr><th>Nro</th><th>Codigo</th><th>Nombre</th><th>Stock</th><th>Acciones</th></tr></thead><tbody>";
    var nro = 0;
    for (var i = 0; i < lista.length; i++)
    {
      if (lista[i].Codigo != 0) 
      {
        nro++;
       tabla+= "<tr><td>"+lista[i].Id+"</td><td>"+lista[i].Codigo+"</td><td>"+lista[i].Nombre+"</td><td>"+lista[i].Stock+"</td><td><button class = 'btn btn-success' data-toggle = 'modal' data-target = '#modalmaterial' onclick ='EditaMaterial("+lista[i].Id+"\,\""+lista[i].Codigo+"\",\""+lista[i].Nombre+"\",\""+lista[i].Stock+"\")' ><span class='glyphicon glyphicon-pencil'></span></button>&nbsp<button class = 'btn btn-danger'><span class='fa fa-trash-o' onclick ='EliminaE("+lista[i].Id+")'></span></button></td></tr>";
      }
    }
    tabla+="<div class='col-md-15'><div class='widget widget-primary widget-no-subtitle'><div class='widget-big-int'><span class='num-count'>"+nro+"</span></div>                            <div class='widget-subtitle'>Materiales Disponibles</div><div class='widget-controls'><a href='#' class='widget-control-left'><span class='fa fa-cloud'></span></a></div></div></div></tbody></table>";

   
     $("#ubicacion").html(tabla);
     $("#tablamaterial").DataTable();
	});
}

function EditaMaterial(id,codigo,nombre,stock)
{
   $("#id").val(id);
   $("#codigo").val(codigo);
   $("#nombre").val(nombre);
   $("#stock").val(stock);

}

function Nuevo()
{
   $("#id").val("");
   $("#codigo").val("");
   $("#nombre").val("");
   $("#stock").val("");
}

function AgregarMaterial1()
{
  var frm = $("#frmmaterial").serialize();
  var url = "<?php echo "$raiz";?>Acciones/RegistraMaterial";
  // var url = raiz +"Acciones/RegistraMaterial";
  $.post(url,frm,function(res){
      if (res == 'ok') {
        toastr.success("Registro de manera Exitosa");
        Limpiar();
        ListadeMateriales();
      }
      else{
        toastr.error(res + "No se pudo registrar");
      }
  });
}


</script>