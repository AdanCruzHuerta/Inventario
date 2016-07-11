<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
        <form action="/administrador/accesorio/delete" method="POST">
            {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Borrar Accesorio</h4>
            </div>
            <div class="modal-body">
              <p>¿Esta seguro de querer borrar el registro del accesorio?</p>
              <input type="hidden" name="id" id="id_accesorio_delete">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Borrar</button>
            </div>
          </div>
        </form>
        </div>
    </div>