
<!-- START PRELOADS -->
<audio id="audio-alert" src="<?php echo $raiz;?>_musoft/_audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="<?php echo $raiz;?>_musoft/_audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->                  
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>_musoft/_js/plugins/bootstrap/bootstrap.min.js"></script>        

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
<script type="text/javascript">





	ListaEnfermedades();
	function ListaEnfermedades()
	{
		var url = "<?php echo $raiz;?>Acciones/ListaEnfermedades";
		$.get(url,null,function(res){
			var tabla="<table id='Tablaenfer' class='table table-striped '><thead><tr><th>Id </th><th>Nombre</th><th>Descripcion</th></tr></thead><tbody>";
			var st=0;
			var lista=JSON.parse(res);
			for (var i =0 ; i < lista.length; i++) {
				st++;

				tabla+="<tr><td>"+lista[i].id+"</td><td>"+lista[i].nombre+"</td><td>"+lista[i].descripcion+"</td></td></tr>";
			}

			tabla+="<div class='col-md-12'><div class='widget widget-primary widget-no-subtitle'><div class='widget-big-int'><span class='num-count'>"+st+"</span></div>                            <div class='widget-subtitle'>Enfermedades Registrados</div><div class='widget-controls'><a href='#' class='widget-control-left'><span class='fa fa-cloud'></span></a></div></div></div></tbody></table>";
			$("#lenfermedades").html(tabla);
			$('#Tablaenfer').DataTable();
		});
	}


	function AgregarEnfermedad() 
	{
		var nombre = $("#nombre").val();
		var descripcion = $("#descripcion").val(); 

		if (nombre == "" ) {
			toastr.error("Ingrese un Nombre");
		}
		else
			{   if (descripcion == "" ) {
				toastr.error("Ingrese una Descripcion");
			}
			else
			{
				var url="<?php echo $raiz; ?>Acciones/RegistrarEnfermedad";
				var obj = new FormData($("#formulario")[0]);
				obj.append("nombre", nombre);
				obj.append("descripcion", descripcion);
				$.ajax({
					url:url,
					type:"post",
					data:obj,
					contentType:false,
					processData:false,
					success:function(res)
					{
						if (res == "OK") {
							ListaEnfermedades();
							limpiar();
							toastr.success("Registrado correctamente");
							$("#Enfermedad").modal('hide'); 
						}
						else
						{
							toastr.error("No Registrado");
						}
					}
				});

			}

		}
	}

	function limpiar()
	{
		$("#nombre").val("");
		$("#descripcion").val(""); 
	}

</script>
</body>
</html>




