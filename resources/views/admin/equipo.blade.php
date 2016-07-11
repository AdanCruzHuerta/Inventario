@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12"><h2 class="titulos">Tabla Equipos de Computo</h2></div>
</div>
<div class="row">
    <div class="table-responsive col-md-10">
     <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Estatus</th>
                    <th>Área</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Estatus</th>
                    <th>Área</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($equipos as $equipo)
                <tr>
                    <td>{{$equipo->nombre}}</td>
                    <td>{{$equipo->marca}}</td>
                    <td>{{$equipo->precio}}</td>
                    <td>
                        @if($equipo->estatus = 1)
                        {{ 'Asignada' }}
                        @elseif($equipo->estatus = 2)
                        {{ 'No funciona' }}
                        @elseif($equipo->estatus = 3)
                        {{ 'Partes' }}
                        @elseif($equipo->estatus = 4)
                        {{ 'En reparación' }}
                        @elseif($equipo->estatus = 5)
                        {{ 'En garantía' }}
                        @elseif($equipo->estatus = 6)
                        {{ 'Baja' }}
                        @else
                        {{ 'Almacenada' }}
                        @endif
                    </td>
                    <td>{{$equipo->departamento}}</td>
                    <td>
                        <a href="/administrador/equipocomputo/detalle/{{$equipo->id}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="/administrador/equipocomputo/edit/{{$equipo->id}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="" class="btn btn-danger delete" data-id="{{$equipo->id}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-responsive col-md-2">
        <a class="btn btn-info" href="/administrador/equipocomputo/create"><span><i class="fa fa-plus" aria-hidden="true"></i></span></a>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
        <form action="/administrador/equipocomputo/delete" method="POST">
            {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Borrar Equipo de Computo</h4>
            </div>
            <div class="modal-body">
              <p>¿Esta seguro de querer borrar el registro del equipo de computo?</p>
              <input type="hidden" name="id" id="id_equipo">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Borrar</button>
            </div>
          </div>
        </form>
        </div>
    </div>
@stop
@section('scripts')
<script>
    $(function(){
        $('.delete').click(function(){
            var id = $(this).attr("data-id");
            $("#id_equipo").val(id);
        })
    })
</script>
@stop