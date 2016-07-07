<form action="/administrador/empleado" method="POST">
    {{ csrf_field() }}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Alta Empleado</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="recipient-name">
              </div>
              <div class="form-group">
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Registrar</button>
          </div>
        </div>
      </div>
    </div>
</form>