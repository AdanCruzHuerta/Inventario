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
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-responsive col-md-2">
        <a class="btn btn-info" href="/administrador/equipocomputo/create"><span><i class="fa fa-plus" aria-hidden="true"></i></span></a>
    </div>
</div>

<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );

</script>
@stop