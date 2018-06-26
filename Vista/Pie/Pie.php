
<!-- START PRELOADS -->
<audio id="audio-alert" src="<?php echo $raiz;?>Css/_audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="<?php echo $raiz;?>Css/_audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->                  

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/bootstrap/bootstrap.min.js"></script>        
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->        
<script type='text/javascript' src='<?php echo $raiz;?>Css/_js/plugins/icheck/icheck.min.js'></script>        
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/morris/morris.min.js"></script>       
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='<?php echo $raiz;?>Css/_lugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='<?php echo $raiz;?>Css/_js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
<script type='text/javascript' src='<?php echo $raiz;?>Css/_js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/owl/owl.carousel.min.js"></script>                 

<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/moment.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins/daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/plugins.js"></script>        
<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/actions.js"></script>

<script type="text/javascript" src="<?php echo $raiz;?>Css/_js/demo_dashboard.js"></script>


<script src="<?php echo $raiz;?>Css/_js/jquery.dataTables.min.js"></script>
<script src="<?php echo $raiz;?>Css/_js/dataTables.bootstrap.min.js"></script>





<!-- END TEMPLATE -->
<!-- <script type="text/javascript">

	ListaEnfermedades();
	function ListaEnfermedades()
	{
		var url = "<?php echo $raiz;?>Acciones/ListaEnfermedades";
		$.get(url,null,function(res){
			var tabla="<option>Seleccione la Enfermedad</option>";
			var st=0;
			var lista=JSON.parse(res);
			for (var i =0 ; i < lista.length; i++) {
				st++;
				tabla+="<option>"+lista[i].nombre+"</option>";
			}

			tabla+="";
			$("#buscar").html(tabla);
		});
	}

	function Buscar()
	{
		var enfermedad = $("#buscar").val();

		if (enfermedad =="" || enfermedad == "Seleccione la Enfermedad" ) { 
			toastr.info("Seleccione una Enfermedad");
		}
		else
		{
			var url = "<?php echo $raiz;?>Acciones/BuscarSintoma";
			var obj = {nombre:enfermedad};

			$.post(url,obj,function(res){
				toastr.success("Datos Encontrados Correctamente");
				var ubicacion = "";	
				var tabla="<table id='Tablasinto' class='table table-striped '><thead><tr><th>Id </th><th>Nombre</th><th>Descripcion</th><th>Enfermedad</th></tr></thead><tbody>";
				var st=0;
				var lista=JSON.parse(res);
				for (var i =0 ; i < lista.length; i++) {
					st++;

					tabla+="<tr><td>"+lista[i].id+"</td><td>"+lista[i].nombre+"</td><td>"+lista[i].descripcion+"</td><td>"+lista[i].enfermedad+"</td></td></tr>";
				}

				tabla+="<div class='col-md-12'><div class='widget widget-primary widget-no-subtitle'><div class='widget-big-int'><span class='num-count'>"+st+"</span></div>                            <div class='widget-subtitle'>Lista de Sintomas</div><div class='widget-controls'><a href='#' class='widget-control-left'><span class='fa fa-cloud'></span></a></div></div></div></tbody></table>";

				ubicacion+="<div class='panel panel-info'><div class='panel-body'><div class='table-responsive'><div id='lsinto'></div>  </div></div></div>";
				$("#ubicacionl").html(ubicacion);
				$("#lsinto").html(tabla);
				$('#Tablasinto').DataTable();
			});
		}

	}
      

      
	function BuscarTratamiento()
	{
		var enfermedad = $("#buscar").val();
		if (enfermedad =="" || enfermedad == "Seleccione la Enfermedad" ) { 
			// toastr.info("Seleccione una Enfermedad");
		}
		else
		{
			var url = "<?php echo $raiz;?>Acciones/BuscarTratamiento";
			var obj = {nombre:enfermedad};
			$.post(url,obj,function(res){

				var ubicacion = "";	
				var tabla="";
				var lista=JSON.parse(res);
				for (var i =0 ; i < lista.length; i++) {
					tabla+="<a  class='list-group-item'><p>Tratamiento</p><div class='list-group-status status-online'></div><span class='contacts-title'>"+lista[i].nombre+"</span><p>"+lista[i].descripcion+"</p></a>    ";
				}
				ubicacion+="<div class='panel panel-info'><div class='list-group list-group-contacts border-bottom push-down-10' id='listatratamientos'></div> </div>";

				$("#tratamientol").html(ubicacion);
				$("#listatratamientos").html(tabla);
			});
		}
	}

</script>      
 -->


     <footer class="sticky-footer">
      <div class="container-fluid">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    </div>
     <!-- ojo desde aqui viene para mi scrip -->
</body>
</html>




