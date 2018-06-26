<?php
include_once("Vista/Cabecera/Cabecera.php"); 
?>
 <div class="container-fluid">
 	<div class="page-content-wrap">
 		<div class="container-fluid">
 			 <div class="page-header">
         <h1 class="all-tittles">Lista de Equipos<small></small></h1>
        </div>
        	<hr>
         <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active"><a href="<?php echo "$raiz";?>Inicio/Equipo">Nuevo Equipo</a></li>
                      <li><a href="<?php echo "$raiz";?>Inicio/ListadeEquipos">Listado de Equipos</a></li>
                      <li>Ayuda</li>
                    </ol>
                </div>
            </div>
        </div> 
          <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#a">Agregar</button>
        <!-- ojo desde aqui viene mi tabla -->
      <div class="w3-panel w3-card-24 w3-light-grey">
 
     <!-- ojo desde aqui viene para mi listaen tabla de ayudas -->
      <div id="listaequipos">
        
      </div>
 		</div>
  <!-- ojo de aqui viene la pantalla parami modal -->
<div class="modal fade" id="modalequipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Formulario de Equipos</h4>
      </div>
      <div class="modal-body">
   <form class="form-horizontal" id="frmekipo"  role = "form">
       <div class="form-group">
        <input type="hidden" id="id" name="id">
        <label for="inputEmail3" class="col-sm-2 control-label">Codigo:</label>
         <div class="col-sm-9">
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo....">
       </div>
        </div>
       <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Chip</label>
         <div class="col-sm-9">
         <input type="text" class="form-control" id="chip" name="chip" placeholder="Chip.....">
         </div>
        </div>
      <div class="form-group">
       <label for="inputPassword3" class="col-sm-2 control-label">Serie</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="serie" name="serie" placeholder="Serie..">
       </div>
     </div>
     <div class="form-group">
       <label for="inputPassword3" class="col-sm-2 control-label">Tarjeta</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="tarjeta" name="tarjeta" placeholder="Tarjeta..">
       </div>
     </div>
     <div class="form-group">
       <label for="inputPassword3" class="col-sm-2 control-label">Modelo</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo..">
       </div>
     </div>
   </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default btn-info" data-dismiss="modal">Cancelar</button> -->
      <button type="button" class="btn btn-warning btn-block col-md-5" onclick="AgregarEquipo();"><b>REGISTRAR</b></button>
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

  //   });}
  ListadeEquipos();
  // listanombrecantidad();
  // Listary();
  // listarAulasx();
 function listanombrecantidad()
 {
  var url = "<?php echo "$raiz";?>Inicio/ListaEquiCantidad";
  $.get(url,null,function(res)
  {
    alert(res);
    var tabla="<table id='tablaequipos' class='table table-bordered '><thead><tr><th>Nro</th><th>Codigo</th><th>Cantidad</th></tr></thead><tbody>";
    var lista = JSON.parse(res);
    var iaux = 1;
    for (var i = 0; i < lista.length; i++)
    {
      if (lista[i].Codigo != 0) 
      {
        tabla+="<tr><td>"+ iaux++ +"</td><td>"+lista[i].Codigo+"</td><td>"+ lista[i].Modelo+"</td></tr>";
      }
    }
      $("#listaequipos").html(tabla);
      $("#tablaequipos").DataTable();
 });
}
  function ListadeEquipos()
  {
    var url = "<?php echo "$raiz";?>Inicio/Listare";
    $.get(url,null,function(res){
      alert("Entra lista de equipos");
      alert(res);
    var tabla="<table id='tablaequipos' class='table table-bordered '><thead><tr><th>Id</th><th>Codigo</th><th>Chip</th><th>Serie</th><th>Tarjeta</th><th>Modelo</th><th>Acciones</th></tr></thead><tbody>";
    var lista = JSON.parse(res);
    for (var i = 0; i < lista.length; i++)
    {
      if (lista[i].Codigo != 0 && lista[i].Baja != 0) 
      {
        tabla+="<tr><td>"+lista[i].Id+"</td><td>"+lista[i].Codigo+"</td><td>"+lista[i].Chip+"</td><td>"+lista[i].Serie+"</td><td>"+lista[i].Tarjeta+"</td><td>"+lista[i].Modelo+"</td><td><button class = 'btn btn-success' data-toggle = 'modal' data-target = '#modalequipo' onclick ='ActuaEquipo("+lista[i].Id+"\,\""+lista[i].Codigo+"\",\""+lista[i].Chip+"\",\""+lista[i].Serie+"\",\""+lista[i].Tarjeta+"\",\""+lista[i].Modelo+"\")' ><span class='glyphicon glyphicon-pencil'></span>Editar</button>&nbsp<button class = 'btn btn-danger'><span class='glyphicon glyphicon-remove' onclick ='Elimina1("+lista[i].Id+")'></span>Eliminar</button></td></tr>";
      }
    }

      $("#listaequipos").html(tabla);
      $("#tablaequipos").DataTable();
    });
  }
   
  function ActuaEquipo(id,codi,chip,serie,tarje,modelo)
  {
     $("#id").val(id);
     $("#codigo").val(codi);
     $("#chip").val(chip);
     $("#serie").val(serie);
     $("#tarjeta").val(tarje);
     $("#modelo").val(modelo);
  }


    // function Listary()
    // {
    //     var table = $("#tabla").DataTable({
    //       "ajax":{
    //         "method":"Get",
    //         "url":"<?php echo "$raiz"; ?>Inicio/ListaEquipos"
    //       },
    //      "columns":[
    //      {"data":"Id"},
    //      {"data":"Codigo"},
    //      {"data":"Chip"},
    //      {"data":"Serie"},
    //      {"data":"Tarjeta"},
    //      {"data":"Modelo"},
    //      {"defaultContent": "<button class='editar btn btn-success' data-toggle='modal' data-target='#exampleModal'><span class='glyphicon glyphicon-pencil'></span></button>&nbsp<button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button>"}
    //      ],
    //      // "language":Idioma

    //  });
    //  }

  function aler()
  {
    alert("hola mami");
  }

</script>