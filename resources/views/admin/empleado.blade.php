@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="titulos">Tabla Empleados</h2>
        @if(session()->has('success'))
          <div class="alert alert-success">Genial!. El empleado ha sido dado de alta.</div>
        @elseif(session()->has('success_update'))
          <div class="alert alert-success">Genial!. El empleado ha sido modificado.</div>
        @elseif(session()->has('error'))
          <div class="alert alert-danger">Error!. El empleado no ha sido dado de alta.</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="table-responsive col-md-10">
     <table id="example" class="display" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Área</th>
                  <th>CPU</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tfoot>
              <tr>
                  <th>Nombre</th>
                  <th>Área</th>
                  <th>CPU</th>
                  <th>Acciones</th>
              </tr>
          </tfoot>
          <tbody>
              @foreach($empleados as $empleado)
                <tr>
                    <td>{{$empleado->nombre}}</td>
                    <td>{{$empleado->departamento or '-'}}</td>
                    <td>{{$empleado->equipo or '-'}}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-primary editar" data-id="{{$empleado->id}}" data-nombre="{{$empleado->nombre}}" data-departamento="{{$empleado->id_departamento}}" data-toggle="modal" data-target="#myModalEdit"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-danger delete" data-id="{{$empleado->id}}" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </td>
                </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    <div class="table-responsive col-md-2">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
     </div>
  @include('admin.modales.crear_empleado') 
  @include('admin.modales.actualizar_empleado') 
  @include('admin.modales.eliminar_empleado')
</div>
@stop
@section('scripts')
  <script>
    $(function(){
      $(".editar").click(function(){
        $("#id_departamento_edit").val($(this).attr("data-id"));
        $('#recipient_name').val($(this).attr("data-nombre"));
        $(".editar_empleado select").val($(this).attr("data-departamento"));
      });
      $(".delete").click(function(){
        $("#id_empleado_delete").val($(this).attr("data-id"));
      });
    })
  </script>
@stop