<div class="modal fade" id="myModalDelete" role="dialog">
      <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Borrar Departamento</h4>
            </div>
            <form action="/administrador/departamento/delete" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                  <p>¿Esta seguro que desea borrar este departamento?</p>
                  <input type="hidden" name="id" id="id_departamento_delete">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-danger">Borrar</button>
                </div>
            </form>
        </div>
      </div>
    </div>