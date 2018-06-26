<?php
include_once("Vista/Cabecera/Cabecera.php"); 
?>
  <div class="container-fluid">
<div class="page-content-wrap">
    <div class="container-fluid">
	    <div class="page-header">
         <h1 class="all-tittles">Registro de Equipos <small></small></h1>
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
        <div class="container-fluid">
	 	<h2 style="color: red; text-align: center;" >FORMULARIO DE REGISTRO</h2>
	 </div>
   <!-- <div class="container-fluid"> -->
     <form role = "form" id="frmekipo" class="form-horizontal">
      <input type="hidden" name="id" id="id">
        <div class="form-group">
           <label for="inputEmail3" class="col-sm-2 control-label">Codigo</label>
             <div class="col-sm-5">
            <input type="text" class="form-control" required="" name="codigo" id="codigo" placeholder="Codigo.....">
            </div>
         </div>
       <div class="form-group">
         <label for="chip" class="col-sm-2 control-label">Chip</label>
        <div class="col-sm-5">
         <input type="text" class="form-control" name="chip" id="chip" placeholder="Chip....">
         </div>
       </div>
       <div class="form-group">
         <label for="serie" class="col-sm-2 control-label">Serie</label>
        <div class="col-sm-5">
         <input type="text" class="form-control" name="serie" id="serie"  placeholder="Serie....">
         </div>
       </div>
       <div class="form-group">
         <label for="tarjeta" class="col-sm-2 control-label">Tarjeta</label>
        <div class="col-sm-5">
         <input type="text" class="form-control" name="tarjeta" id="tarjeta"  placeholder="Tarjeta....">
         </div>
       </div>
        <div class="form-group">
         <label for="modelo" class="col-sm-2 control-label">Modelo</label>
        <div class="col-sm-5">
         <input type="text" class="form-control"  name="modelo" id="modelo" placeholder="Modelo....">
         </div>
       </div>
        <!-- <input type="submit" name=""> -->
      </form>
      <br>
      <div class="form-group">
       <div class="col-sm-offset-4 col-sm-10">
         <button class="btn btn-success btn-lg" onclick="AgregarEquipo();">REGISTRAR</button>
          <button class="btn btn-success btn-lg" onclick="Agregarx();">REGISTRAR</button>
          </div>
        </div>

    </div>
</div>
  </div>

<?php
include_once("Vista/Pie/Pie.php"); 
?>