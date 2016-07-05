@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="table-responsive col-md-2">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
     </div>
        <form action="/administrador/empleado" method="POST">
            {{ csrf_field() }}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Alta Mantenimiento Impresora</h4>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Fecha mantenimiento</label>
                        <input type="date" class="form-control" name="fecha" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="control-label">Estatus</label>
                        <select class="form-control" name="">
                            <option value="#">-Estatus-</option>
                            <option value="">Correctivo</option>
                            <option value="">Preventivo</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="control-label">Descripcion del mantenimiento</label>
                        <textarea name="" id="" cols="30" rows="10" placeholder="">
                          
                        </textarea>
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
</div>

@stop