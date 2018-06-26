
var raiz = 'http://localhost:8080/RedGo/';

function Validar()
{
	var user = $("#usuario").val();
	var pas =  $("#password").val();
	if (user != "" & pas != "") 
	{
        var url = raiz +"Acciones/Ingresar";
        var objeto ={usuario:user,password:pas};
        $.post(url,objeto,function(res){
          if (res == 'ok') {
          	toastr.success("Bienvenido "+ user);
          	document.location = raiz +"Inicio/Panel";
          }
          else{
          alert(res);
          	toastr.error(res +" Error pro favor verifica");
          }
        });
	}
	else{
		toastr.error("Datos no completados por favor verifica");
	}
}

function AgregarUsuario()
{
  var frm = $("#frmusuario").serialize();
  var url = raiz +"Acciones/RegistraUsuario";
  var a = $("#pass").val();
  var b = $("#pass1").val();
  alert(a);
  alert(b);
   if (a == b) 
   {
    $.post(url,frm,function(res){
    if (res == 'ok') {
      toastr.success("Registro de manera Exitosa");
      ListarUsers();
    }
    else{
      toastr.error(res + "No se pudo registrar Verifica");
    }
   });
  }
  else{

    toastr.error("Las contraseñas no coinciden por favor verifica");
  }

}
function ListarUsers()
{
  var url = raiz +"Inicio/ListarUsuarios";
  $.get(url,null,function(res){
  var tabla = "<table id='tablausuarios' class='table table-bordered table-responsive'><thead><tr><th>Id</th><th>Codigo</th><th>Usuario</th><th>Estado</th><th>Acciones</th></tr></thead><tbody>";
  var lista = JSON.parse(res);
  var nro =1;
  for (var i = 0; i < lista.length; i++) {
   tabla+="<tr><td>"+nro+++"</td><td>"+lista[i].Codigo+"</td><td>"+lista[i].NomUsu+"</td><td>"+lista[i].Estado+"</td><td><button class = 'btn btn-success' data-toggle = 'modal' data-target = '#modalcliente' onclick ='ActuaUser("+lista[i].Id+"\,\""+lista[i].Codigo+"\",\""+lista[i].NomUsu+"\",\""+lista[i].Estado+"\")' ><span class='glyphicon glyphicon-pencil'></span>Editar</button>&nbsp<button class = 'btn btn-danger'><span class='glyphicon glyphicon-remove' onclick ='EliminaUser("+lista[i].Id+")'></span>Eliminar</button></td></tr>";
  } 
   $("#listausuarios").html(tabla);
   $("#tablausuarios").DataTable();
  });
}

function EliminaUser(id)
{
  $("#id").val(id);
  var url = raiz +"Acciones/EliminaUsers";
  var obj ={id:$("#id").val()}
  var bandera = confirm("Esta Seguro de Eliminar Este Usuario?");
  if (bandera == true) {
   $.post(url,obj,function(res){
    if (res == 'ok') {
     toastr.success("Datos Eliminados de Manera Correcta");
     Limpiar();
     ListarUsers();
    }
    else{
      toastr.error(res +"Error no se pudo Eliminar");
    }
   });
  }
  else{

  }
}

function AgregarEquipo()
{
	var frm = $('#frmekipo').serialize();
	alert(frm);
	var url = raiz +"Acciones/RegistraEquipo";
	alert(url);
	$.post(url,frm,function(msj){
		alert(msj);
		if (msj == "ok") {
			toastr.success("Registro de manera exitosa");
			// listar();
			Limpiar();
			ListadeEquipos();
		}
		else{
			toastr.error(msj + "No se pudo registrar");
		}
	});
}

function Elimina1(id)
{
	// alert("entra");
	$("#id").val(id);
    var objeto = {id:$("#id").val()};
	var url = raiz +"Acciones/EliminarEquipo";
	var bandera = confirm("Esta seguro de eliminar el elemento??");
	if (bandera == true) {
     $.post(url,objeto,function(res){
      if (res == 'ok') {
      	toastr.success("Datos Eliminados de Manera Correcta");
      	ListadeEquipos();
      }
      else{
      	toastr.info( res +"No se puede Eliminar los datos");
      }
     });
   }

}

function AgregarMaterial()
{
	var frm = $("#frmmaterial").serialize();
	var url = raiz +"Acciones/RegistraMaterial";
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

function EliminaE(id)
{
	$("#id").val(id);
    var objeto = {id:$("#id").val()};
	var url = raiz +"Acciones/EliminarMaterial";
	var bandera = confirm("Esta seguro de eliminar el elemento??");
	if (bandera == true) {
     $.post(url,objeto,function(res){
      if (res == 'ok') {
      	toastr.success("Datos Eliminados de Manera Correcta");
      	ListadeMateriales();
      }
      else{
      	toastr.info( res +"No se puede Eliminar los datos");
      }
     });
   }
}


function Agregarclientes()
{
	var frm = $("#frmcliente").serialize();
	alert(frm);
	var url = raiz +"Acciones/RegistraCliente";
	$.post(url,frm,function(res){
		alert(res);
		if (res == 'ok') {
			toastr.success("Datos registrados de menra correcta");
			Limpiar();
			ListarClientes();
		}
		else{
			toastr.info( res +" No se pudo registrar");
		}
	})
}

function EliminaCliente(id)
{
   $("#id").val(id)
   var obj = {id:$("#id").val()};
   var url = raiz +"Acciones/EliminarCliente";
   var bandera = confirm("Esta Seguro de Eliminar El Cliente");
   if (bandera == true) 
   	{
   	$.post(url,obj,function(res){
   	alert(res);
      if (res == 'ok') {
      	toastr.success("Datos Eliminados de Manera Correcta");
      	ListarClientes();
      }
      else{
      	toastr.info(res + "No se pudo Eliminar los Datos");
      }
   	}) ;
   }
}

function SeleccionaClientes()
{
  var url = raiz +"Inicio/ListarClientes";
  // var url = "<?php echo "$raiz";?>Inicio/ListarClientes";
  $.get(url,null,function(res){
  var tabla = "<table id='tablaclientes' class='table table-bordered table-responsive'><thead><tr><th>Id</th><th>Codigo</th><th>Nombre</th><th>Acciones</th></tr></thead><tbody>";
  var lista = JSON.parse(res)
  var nro = 1;
  for (var i = 0; i < lista.length; i++) {
    tabla+="<tr><td>"+nro+++"</td><td>"+lista[i].Codigo+"</td><td>"+lista[i].Nombre+"</td><td><button class = 'btn btn-success' data-toggle = 'modal' data-target = '#modalcliente' onclick ='Agarrarcliente(\""+lista[i].Nombre+"\")' ><span class='fa fa-mail-reply-all'></span>Seleccionar</button></td></tr>";
    }
    $("#listaclientes").html(tabla);
    $("#tablaclientes").DataTable();

  });
}




function Limpiar()
{
		$("#codigo").val("");
		$("#chip").val(""); 
		$("#serie").val("");
		$("#tarjeta").val("");
		$("#modelo").val("");
		
    $("#usuario").val("");
		$("#codigo").val("");
		$("#nombre").val("");
		$("#stock").val("");
}

