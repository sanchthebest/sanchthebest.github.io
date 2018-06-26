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
      <!-- diseño para el formulario -->
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
            <select onchange="CargaComboSerie($('#serie'));" class="" id="equipos" name="equipos" style="width: 100%;height: 30px;border-radius: 3px;">
            </select>
           </div>
         <label class="col-sm-1 control-label">Cantidad</label>
         <div class="col-sm-2">
         <input type="number" class="form-control" min="1" name="cantidadeq" id="cantidadeq"  placeholder="0">
         </div>

         </div>

         <!--  -->

         <div class="form-group" id="frmserie"> <!-- style="display:none;"> -->
            <label class="col-sm-2 control-label">Serie</label>
            <div class="col-sm-4">
              <select class="" id="serie" name="serie" style="width: 100%;height: 30px;border-radius: 3px;">
              </select>
            </div>
            <div class="col-sm-3">
              <button class="btn btn-warning fa-fa-plus" onclick="CargaEquipos($('#equipos').val(),$('#serie').val());">+</button>
            </div>
         </div>

         <!--  -->
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
     <div class="col-md-3">
        <button class="btn btn-danger btn-block" onclick="limpiarlista()">Limpiar</button>
           <button class="btn btn-primary btn-block" type="button">
           Materiales<span class="badge" id="" value='10'></span>
          </button>
            <div id="lista">
            </div>
     </div>
     <div class="col-md-3">
         <button class="btn btn-danger btn-block" onclick="limpiarlista2()">Limpiar</button>
           <button class="btn btn-primary btn-block" type="button">
           Equipos<span class="badge" id="" value='10'></span>
          </button>
            <div id="lista2">
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
   <input type="text" name="auxi1" id="auxi1">
   <input type="text" name="auxi2" id="auxi2">

   <input type="text" name="auxi3" id="auxi3">
   <input type="text" name="auxi4" id="auxi4">
<?php
include_once("Vista/Pie/Pie.php"); 
?>
<script type="text/javascript">
LisEquipos();
SeleccionaClientes();
CargaComboMateriales();
function CargaComboSerie(Equipo)
{
  var url = "<?php echo "$raiz";?>Inicio/Listare";
  var items = "<option>Seleccionar</option>";

  document.getElementById("frmserie").style.display = "block";

  $.get(url,null,function(res)
  {

    var lista = JSON.parse(res);
    for (var i = 0; i < lista.length; i++)
    {
      if (lista[i].Codigo != 0 && lista[i].Codigo == $("#equipos").val() && lista[i].Baja != 0)
      {
        items+="<option id='a'>"+lista[i].Serie+"</option>";
      }
    }
    $("#serie").html(items);
  });
}
function LisEquipos()
{
  var url = "<?php echo "$raiz";?>Inicio/ListaEquiCantidad";
  var items = "<option>Seleccionar</option>";
  $.get(url,null,function(res){
  var lista = JSON.parse(res);
    for (var i = 0; i < lista.length; i++)
    {
      if (lista[i].Codigo != 0)
      {
        items+="<option id='a' onclick='CargaComboSerie();'>"+lista[i].Codigo+"</option>";
      }
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
var item;

function CargaMateriales(nombre,cantidad)
{
   var ban = false;
   var a = nombre;
   var b = cantidad;
   var url = "<?php echo "$raiz";?>Inicio/ListaMaterial";
    $.get(url,null,function(res)
    {
      var listaux = JSON.parse(res);
      for (var i = 0; i < listaux.length; i++)
      {
        if (nombre == listaux[i].Nombre)
        {
          var ca = listaux[i].Stock;
          var cb = cantidad;
          var abc = ca - cb;
          if (abc < 0)
          {
            toastr.info("Cantidad mayor: " + cantidad + " > " + listaux[i].Stock);
          }
          else
          {
            if (lista.length == 1)
            {
              lista.push(a,b);
            }
            else
            {
              if (lista.includes(a) == true)
              {
                alert(a + " --- Ya existe");
              }
              else
              {
                lista.push(a,b);
              }
            }
            item = "<ul class ='list-group' id ='lista' name='lista'>";
            for (var i = 1; i < lista.length; i++)
            {
              item +='<li id="' + lista[i] + '" class= "list-group-item" onclick="BorrarDeLista1(id);"><span class="badge">'+lista[i+1]+'</span>'+lista[i]+'</li></ul>'; 
              i++;
            }
            $("#lista").html(item);
          }
        }
      }
    });
}

function BorrarDeLista1(nombre)
{
  $('#'+nombre).remove();
  lista.remove(nombre);
}
function BorrarDeLista2(nombre)
{
  $('#'+nombre).remove();
  lista2.remove(nombre);
}
function CargaComboMateriales()
{
  var url = "<?php echo "$raiz";?>Inicio/ListaMaterial";
  var items ="<option>Seleccionar</option>";
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
  if (lista.length == 1 && lista2.length == 1)
  {
    alert("entra LISTA Y LISTA2 = 0");
    $("#auxi1").val("");
    $("#auxi2").val("");
    $("#auxi3").val("");
    $("#auxi4").val("");
    var obj = {id:$("#id").val(),cliente:$("#cliente").val(),tipo:$("#tipo").val(),equipos:$("#auxi4").val(),cantidadeq:$("#auxi3").val(),materiales:$("#auxi2").val(),cantidad:$("#auxi1").val(),fecha:$("#fecha").val(),ot:$("#ot").val()};
        $.post(url,obj,function(res)
        {
          if (res == 'ok')
          {
            toastr.success("Registro de manera exitosa");
          }
          else
          {
            toastr.error( res +" No se pudo registrar");
          }
        });
  }
  else if (lista2.length == lista.length)
  {
      alert("entra LISTA = LISTA2");
      for (var i = 1; i < lista.length; i++)
      {
        $("#auxi1").val(lista[i+1]);
        $("#auxi2").val(lista[i]);

        $("#auxi3").val(lista2[i+1]);
        $("#auxi4").val(lista2[i]);

        var obj = {id:$("#id").val(),cliente:$("#cliente").val(),tipo:$("#tipo").val(),equipos:$("#auxi4").val(),cantidadeq:$("#auxi3").val(),materiales:$("#auxi2").val(),cantidad:$("#auxi1").val(),fecha:$("#fecha").val(),ot:$("#ot").val()};

        $.post(url,obj,function(res)
        {
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
  else if (lista2.length  == 1)
  {
    alert("entra LISTA2 = 1");
      $("#auxi3").val("");
      $("#auxi4").val("");
      for (var i = 1; i < lista.length; i++)
      {
        a = lista[i];
        b = lista[i+1];
        $("#auxi1").val(lista[i+1]);
        $("#auxi2").val(lista[i]);
        var obj = {id:$("#id").val(),cliente:$("#cliente").val(),tipo:$("#tipo").val(),equipos:$("#auxi4").val(),cantidadeq:$("#auxi3").val(),materiales:$("#auxi2").val(),cantidad:$("#auxi1").val(),fecha:$("#fecha").val(),ot:$("#ot").val()};

        $.post(url,obj,function(res)
        {
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
  else if (lista.length == 1)
  {
    alert("entra LISTA = 1");
      $("#auxi1").val("");
      $("#auxi2").val("");
      for (var i = 1; i < lista2.length; i++)
      {
        $("#auxi3").val(lista2[i+1]);
        $("#auxi4").val(lista2[i]);
        var obj = {id:$("#id").val(),cliente:$("#cliente").val(),tipo:$("#tipo").val(),equipos:$("#auxi4").val(),cantidadeq:$("#auxi3").val(),materiales:$("#auxi2").val(),cantidad:$("#auxi1").val(),fecha:$("#fecha").val(),ot:$("#ot").val()};

        $.post(url,obj,function(res)
        {
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
  else if (lista.length > lista2.length)
  {
      alert("entra LISTA > LISTA2");
      for (var i = 1; i < lista.length; i++)
      {
        $("#auxi1").val(lista[i+1]);
        $("#auxi2").val(lista[i]);
        if (i >= lista2.length)
        {
          $("#auxi3").val("");
          $("#auxi4").val("");
        }
        else
        {
          $("#auxi3").val(lista2[i+1]);
          $("#auxi4").val(lista2[i]);
        }
        var obj = {id:$("#id").val(),cliente:$("#cliente").val(),tipo:$("#tipo").val(),equipos:$("#auxi4").val(),cantidadeq:$("#auxi3").val(),materiales:$("#auxi2").val(),cantidad:$("#auxi1").val(),fecha:$("#fecha").val(),ot:$("#ot").val()};
        $.post(url,obj,function(res)
        {
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
  else if (lista2.length > lista.length)
  {
      alert("entra LISTA2 > LISTA");
      for (var i = 1; i < lista2.length; i++)
      {
        $("#auxi3").val(lista2[i+1]);
        $("#auxi4").val(lista2[i]);
        if (i >= lista2.length)
        {
          $("#auxi1").val("");
          $("#auxi2").val("");
        }
        else
        {
          $("#auxi1").val(lista[i+1]);
          $("#auxi2").val(lista[i]);
        }
        var obj = {id:$("#id").val(),cliente:$("#cliente").val(),tipo:$("#tipo").val(),equipos:$("#auxi4").val(),cantidadeq:$("#auxi3").val(),materiales:$("#auxi2").val(),cantidad:$("#auxi1").val(),fecha:$("#fecha").val(),ot:$("#ot").val()};
        $.post(url,obj,function(res)
        {
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

/*  for (var i = 1; i < lista.length; i++)
  {
    a = lista[i];
    b = lista[i+1];
    $("#auxi1").val(lista[i+1]);
    $("#auxi2").val(lista[i]);
    c = lista2[i];
    d = lista2[i + 1];
    alert(a);
    alert(b);
    $("#auxi3").val(lista2[i+1]);
    $("#auxi4").val(lista2[i]);
    
    var obj = {id:$("#id").val(),cliente:$("#cliente").val(),tipo:$("#tipo").val(),equipos:$("#auxi4").val(),cantidadeq:$("#auxi3").val(),materiales:$("#auxi2").val(),cantidad:$("#auxi1").val(),fecha:$("#fecha").val(),ot:$("#ot").val()};

    $.post(url,obj,function(res)
    {
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
  }*/
}
//añadi nombre a la lista, funcion limpiarlista() al boton limpiar
function limpiarlista()
{
  lista = [,];
  item = "<ul class ='list-group' id ='lista' name='lista'>";
  $("#lista").html(item);
}
var lista2 = [,];
var item2;
/*function CargaEquipos(nombre, cantidad)
{
   var ban = false;
   var a = nombre;
   var b = cantidad;
   
   if (lista2.length == 1)
   {
      lista2.push(a,b);
   }
   else
   {
      if (lista2.includes(a) == true)
      {
        alert(a + " --- Ya existe");
      }
      else
      {
        lista2.push(a,b);
      }
   }
   item2 = "<ul class ='list-group' id ='lista2' name='lista2'>";
   for (var i = 1; i < lista2.length; i++)
   {
      item2 +='<li id="' + lista2[i] + '" class= "list-group-item" onclick="BorrarDeLista2(id);"><span class="badge">'+lista2[i+1]+'</span>'+lista2[i]+'</li></ul>'; 
      i++;
   }
   $("#lista2").html(item2);
}*/
function CargaEquipos(nombre, serie)
{
   var ban = false;
   var a = nombre;
   var b = serie;
   
   if (lista2.length == 1)
   {
      lista2.push(a,b);
   }
   else
   {
      if (lista2.includes(b) == true)
      {
        alert(b + " --- Ya existe");
      }
      else
      {
        lista2.push(a,b);
      }
   }
   item2 = "<ul class ='list-group' id ='lista2' name='lista2'>";
   for (var i = 1; i < lista2.length; i++)
   {
      item2 +='<li id="' + lista2[i] + '" class= "list-group-item" onclick="BorrarDeLista2(id);"><span class="badge">'+lista2[i+1]+'</span>'+lista2[i]+'</li></ul>'; 
      i++;
   }
   $("#lista2").html(item2);
}
function limpiarlista2()
{
  lista2 = [,];
  item2 = "<ul class ='list-group' id ='lista2' name='lista2'>";
  $("#lista2").html(item2);
}

</script>