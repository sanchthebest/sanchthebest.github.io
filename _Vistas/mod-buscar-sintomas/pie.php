 	
<!-- START PRELOADS -->
<audio id="audio-alert" src="<?php echo $raiz;?>_musoft/_audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="<?php echo $raiz;?>_musoft/_audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->                  
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/bootstrap/bootstrap.min.js"></script>        
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->        
<script type='text/javascript' src='<?php echo $raiz;?>_musoft/_js/plugins/icheck/icheck.min.js'></script>        
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/morris/morris.min.js"></script>       
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='<?php echo $raiz;?>_musoft/_lugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='<?php echo $raiz;?>_musoft/_js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
<script type='text/javascript' src='<?php echo $raiz;?>_musoft/_js/plugins/bootstrap/bootstrap-datepicker.js'></script>         
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/owl/owl.carousel.min.js"></script>               
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/moment.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins.js"></script>        
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/actions.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/demo_dashboard.js"></script>
<script src="<?php echo $raiz;?>_musoft/_js/jquery.dataTables.min.js"></script>
<script src="<?php echo $raiz;?>_musoft/_js/dataTables.bootstrap.min.js"></script>

<!-- END TEMPLATE -->
<script type="text/javascript">

	ListaSintomas();
	function ListaSintomas()
	{
		var url = "<?php echo $raiz;?>Acciones/ListaSintomas";
		$.get(url,null,function(res){
			var tabla="<table id='Tablasinto' class='table table-striped '><thead><tr><th>Nombre</th></tr></thead><tbody>";
			var st=0;
			var lista=JSON.parse(res);
			for (var i =0 ; i < lista.length; i++) {
				st++;

				tabla+="<tr class='' onclick='AgregarDeducirEnfermedad(\""+lista[i].nombre+"\",\""+lista[i].enfermedad+"\")' ><td>"+lista[i].nombre+"</td></tr>";
			}

			tabla+="<div class='col-md-12'><div class='widget widget-danger widget-no-subtitle'><div class='widget-big-int'><span class='num-count'>"+st+"</span></div>                            <div class='widget-subtitle'>Sintomas Registrados</div><div class='widget-controls'><a class='widget-control-left'  ><span class='fa fa-cloud'></span></a></div></div></div></tbody></table>";
			$("#lsinto").html(tabla);
			$('#Tablasinto').DataTable();
		});
	}


	function AgregarDeducirEnfermedad(sintoma,enfermedad) 
	{
		var sintoma = sintoma;
		var enfermedad = enfermedad;
		var url="<?php echo $raiz; ?>Acciones/AgregarDeducir";
		var obj = new FormData($("#formulario")[0]);
		obj.append("sintoma", sintoma);
		obj.append("enfermedad", enfermedad);
		$.ajax({
			url:url,
			type:"post",
			data:obj,
			contentType:false,
			processData:false,
			success:function(res)
			{
				if (res == "OK") {
					ListaSintomas();
					ListaDeducir();
					// toastr.info("Agregado");
				}
				else
				{
					toastr.error(res);
				}
			}
		});
	}


	ListaDeducir();
	function ListaDeducir()
	{
		var url = "<?php echo $raiz;?>Acciones/ListaDecirSintomas";
		$.get(url,null,function(res){
			var ubicacion = "";	
			var st=0;
			var tabla="";
			var cabecera="";
			var lista=JSON.parse(res);
			for (var i =0 ; i < lista.length; i++) {
				tabla+="<a class='btn list-group-item' onclick='eliminarSintoma("+lista[i].id+")' ><div class='list-group-status status-online'></div><span class='contacts-title'> Sintoma: "+lista[i].sintoma+"</span><p> Enfermedad: "+lista[i].enfermedad+"</p></a>    ";
				st++;

			}
			$("#algo").val(st);

			cabecera+="<div class='col-md-6'><div class='widget widget-primary widget-no-subtitle'><div class='widget-big-int'><span class='num-count'>"+st+"</span></div> <div class='widget-subtitle'>Sintomas para Deducir</div><div class='widget-controls'><a class='widget-control-left'  ><span class='fa fa-cloud'></span></a></div></div></div> <div class='col-md-6'><div class='widget widget-default widget-no-subtitle'><div class='widget-big-int'><span class='num-count'><button type='btn' class='btn btn-primary' onclick='Elquemasserepite()'>Deducir Enfermedad</button><button type='btn' class='btn btn-danger' onclick='borrartodo()'>Vaciar Lista</button></span></div> <div class='widget-controls'></div></div></div>";
			ubicacion+="<div  id='cabeceradatos'></div><div class='panel panel-info'><div class='list-group list-group-contacts border-bottom push-down-10' id='listatratamientos'></div> </div>";
			
			$("#tratamientol").html(ubicacion);
			$("#listatratamientos").html(tabla);
			$("#cabeceradatos").html(cabecera);
		});
	}

	function eliminarSintoma(id) 
	{
		var url="<?php echo $raiz; ?>Acciones/EliminarSintomaUni";
		var obj = {id:id};
		$.post(url,obj,function(res){
			if (res == "OK") {
				ListaDeducir();
			// toastr.info("Borrado");
		}
		else
		{
			toastr.error(res);
		}
	});
	}

	function borrartodo() 
	{
		var url="<?php echo $raiz; ?>Acciones/Eliminartododeducir";
		$.post(url,null,function(res){
			if (res == "OK") {
				ListaDeducir();
			// toastr.info("Borrado");
			$("#ResultadoFinal").modal('hide');    
		}
		else
		{
			toastr.error(res);
		}
	});
	}

	function Elquemasserepite()
	{
		var datos =  $("#algo").val();
		if (datos == 0) {
			toastr.error("Carguen Sintomas a Evaluar");
		}
		else
		{
			var url = "<?php echo $raiz;?>Acciones/ListaelMaximoDeduci";
			$.get(url,null,function(res){

				var lista=JSON.parse(res);
				var veces = 0;
				var mayor=0;
				var ultimaenfermedad="";

				for (var i =0 ; i < lista.length; i++) {
					if (veces >= lista[i].veces ) {
						mayor = veces; 
					}
					else
					{ 
						veces = lista[i].veces ;
						mayor = veces;
					}
				}
				for (var j =0 ; j < lista.length; j++) {

					if (mayor == lista[j].veces) {
						ultimaenfermedad = lista[j].enfermedad;
						sintomacantidad(ultimaenfermedad,mayor); 
					}	

				}

			});
		}
	}



	function sintomacantidad(ultimaenfermedad,mayor)
	{


		var ultimaenfermedad = ultimaenfermedad;
		var mayor = mayor;
		var url = "<?php echo $raiz;?>Acciones/sabercantindaddeenfermedadensintoma";
		// var obj = {nombre:ultimaenfermedad};
		$.get(url,null,function(res){
			// alert(res);

			var tabla ="<table class='table table-bordered table-striped'><thead><tr><th width='50%'>Enfermedad</th><th width='20%'>Probabilidad</th><th width='30%'>Procentaje %</th><th width='30%'>Procentaje</th></tr></thead><tbody>";	
			var porcentaje=0;
			var vecesenfermedad=0;
			var enfermedadfinal =0;
			var lista=JSON.parse(res);
			var veces = 0;
			var st =0;

			for (var i =0 ; i < lista.length; i++) {

				if (ultimaenfermedad == lista[i].enfermedad) {
					vecesenfermedad = lista[i].veces;
					// enfermedadfinal = ultimaenfermedad;
					st++;
					porcentaje = parseFloat(mayor) * parseFloat(100) / parseFloat(vecesenfermedad);

					if (porcentaje <= 30) {
						toastr.success(porcentaje + "%" + " Probabilidad: Baja" + " Enfermedad:" + ultimaenfermedad);
					}
					else
					{
						if ( porcentaje <= 70   ) {
							toastr.warning(porcentaje + "%" + " Probabilidad: Media" + " Enfermedad:" + ultimaenfermedad);
						}
						else
						{
							toastr.error(porcentaje + "%" + " Probabilidad: Alta" + " Enfermedad:" + ultimaenfermedad);
						}
					}
				}
			}
		});
	}
</script>      

</body>
</html>




