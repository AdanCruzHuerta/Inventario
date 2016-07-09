<form action="/administrador/departamento" method="POST">
	{{ csrf_field() }}
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm">  
         <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Alta Departamento</h4>
           </div>
           <div class="modal-body">
             <div class="form-group">
               <label for="recipient-name" class="control-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
             </div>
           </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
         </div>
      </div>
    </div>
</form>