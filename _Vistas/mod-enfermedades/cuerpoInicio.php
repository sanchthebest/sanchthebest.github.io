
<div class="page-content-wrap">
 <div class="row">
   <div class="col-md-3"> 
    <div class="panel panel-info">
      <div class="panel-body">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Registro de Enfermedades</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">                                        
              <div class="col-md-12">
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#Enfermedad">Agregar</button>
              </div>
            </div>                                    
          </div>                            
        </div>
      </div>  
    </div>
  </div>  
  <div class="col-md-9"> 
    <div class="panel panel-info">
      <div class="panel-body">
      <div class="table-responsive">
        <div id="lenfermedades">
        </div>
        </div>
      </div>  
    </div>
  </div>                           
</div>    
<!-- START WIDGETS -->                    
<div class="modal" id="Enfermedad" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog">
    <div class="panel panel-colorful">
      <div class="panel-heading">
        <h3 class="panel-title">Registro Enfermedades</h3>
      </div>
      <div class="panel-body">
        <div class="block">
          <div class="form-horizontal" role="form">                                    
            <div class="form-group">
              <label class="col-md-2 control-label">Nombre</label>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Introdusca un Nombre" id="nombre" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Descripcion</label>
              <div class="col-md-10">
                <textarea class="form-control" placeholder="Introdusca una Descripcion" rows="5" id="descripcion"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <div class="form-group">
          <div class="col-md-12">
            <a class="btn btn-lg btn-info btn-block " onclick="AgregarEnfermedad()"  >Registrar</a>
            <a class="btn btn-lg btn-danger btn-block " class="close" data-dismiss="modal" >Cancelar</a>
          </div>
        </div>
      </div>                            
    </div>
  </div>
</div>
</div>  


