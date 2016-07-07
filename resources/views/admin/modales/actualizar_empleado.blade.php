<div class="modal fade" id="myModalEdit" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Actualizar Empleado</h4>
            </div>
            <div class="modal-body">
              <form action="/administrador/empleado/editar" method="POST">
                  {{ csrf_field() }}
                   <div class="form-group">
                      <label for="recipient_name" class="control-label">Nombre</label>
                      <input type="hidden" name="id" id="id_departamento_edit">
                      <input type="text" class="form-control" name="nombre" id="recipient_name" required>
                  </div>
                  <div class="form-group editar_empleado">
                      <label for="message-text" class="control-label">Departamento</label>
                      <select class="form-control" name="Departamento_id" required>
                          <option value="">-Departamento-</option>
                          @foreach($departamentos as $departamento)
                          <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                          @endforeach
                      </select>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            </form>
        </div>
      </div>
    </div>