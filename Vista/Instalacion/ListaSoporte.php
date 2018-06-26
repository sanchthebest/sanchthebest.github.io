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
                      <li class=""><a href="<?php echo "$raiz";?>Inicio/Instalacion">Nuevo Trabajo</a></li>
                      <li><a href="<?php echo "$raiz";?>Inicio/ListaInstalaciones">Listado de Instalaciones</a></li>
                      <li class="active"><a href="<?php echo "$raiz";?>Inicio/ListaSoportes">Lista de Soportes</a> </li>
                    </ol>
                </div>
            </div>
        </div> 
       <div>
       	 <h3 style="font-family: algerian;text-align: center;color: #455445;">SOPORTES REALIZADOS</h3>
       </div>
       <div id="listainstalaciones">
       	
       </div> 


    </div>
  	
  </div>
<?php 
include_once("Vista/Pie/Pie.php");
?>
<script type="text/javascript">
	listarSoportes();


function listarSoportes()
{
	alert("entra");
	var url = "<?php echo "$raiz";?>Inicio/ListaSoporte";
    var tabla ="<table id='tablasoporte' class='table table-bordered table-responsive'><thead><tr><th>Nro</th><th>Cliente</th><th>Trabajo</th><th>Equipo</th><th>Materiales</th><th>Cantidad</th><th>Fecha</th><th>OT</th><th>Acciones</th></tr></thead><tbody>";
    var nro =1 ;
	$.get(url,null,function(res){
	var lista = JSON.parse(res);
	for (var i = 0; i < lista.length; i++) {
         tabla+="<tr><td>"+nro+++"</td><td>"+lista[i].Cliente+"</td><td>"+lista[i].Trabajo+"</td><td>"+lista[i].Equipo+"</td><td>"+lista[i].Materiales+"</td><td>"+lista[i].Cantidad_Materiales+"</td><td>"+lista[i].Fecha+"</td><Td>"+lista[i].Ot+"</td><td><button class = 'btn btn-success' data-toggle = 'modal' data-target = '#modalequipo' onclick ='ActuaEquipo("+lista[i].Id+"\,\""+lista[i].Codigo+"\",\""+lista[i].Chip+"\",\""+lista[i].Serie+"\",\""+lista[i].Tarjeta+"\",\""+lista[i].Modelo+"\")' ><span class='glyphicon glyphicon-pencil'></span></button>&nbsp<button class = 'btn btn-danger'><span class='fa fa-trash-o' onclick ='Elimina1("+lista[i].Id+")'></span></button></td></tr>";
	  }
      $("#listainstalaciones").html(tabla);
      $("#tablasoporte").DataTable();
   });
}
</script>