@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12"><h2 class="titulos">Tabla Accesorios</h2></div>
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
                    <th>CPU</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Estatus</th>
                    <th>CPU</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($accesorios as $accesorio)
                <tr>
                    <td>{{ $accesorio->nombre }}</td>
                    <td>{{ $accesorio->marca }}</td>
                    <td>{{ $accesorio->precio }}</td>
                    <td>
                        @if($accesorio->estatus == 1)
                            {{ 'Asignada' }}
                        @elseif($accesorio->estatus == 2)
                            {{ 'No funciona' }}
                        @elseif($accesorio->estatus == 3)
                            {{ 'Partes' }}
                        @elseif($accesorio->estatus == 4)
                            {{ 'En reparación' }}
                        @elseif($accesorio->estatus == 5)
                            {{ 'En garantía' }}
                        @elseif($accesorio->estatus == 6)
                            {{ 'Baja' }}
                        @else
                            {{ 'Almacenada' }}
                        @endif
                    </td>
                    <td>{{ $accesorio->equipo }}</td>
                    <td>
	                    <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-success" title="Ver detalle" href="/administrador/accesorio/detalle/{{$accesorio->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>

                            <div class="col-md-3">
                                <a class="btn btn-primary" href="/administrador/accesorio/edit/{{$accesorio->id}}"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                            </div>
                            
                            <div class="col-md-3">
                                <button class="btn btn-danger delete" data-id="{{$accesorio->id}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </td>
                </tr>    
                @endforeach           
            </tbody>
        </table>
    </div>
    <div class="table-responsive col-md-2">
        <a class="btn btn-info" href="/administrador/accesorio/alta_accesorio"><span><i class="fa fa-plus" aria-hidden="true"></i></span></a>
    </div>
    @include('admin.modales.eliminar_accesorio')
</div>
@stop
@section('scripts')
<script>
    $('.delete').click(function(){
        $("#id_accesorio_delete").val($(this).attr("data-id"));
    })
</script>
@stop