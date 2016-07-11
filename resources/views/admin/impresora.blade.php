@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12"><h2 class="titulos">Tabla Impresoras </h2></div>
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
                    <th>Manten.</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Estatus</th>
                    <th>Manten.</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($impresoras as $impresora)
                <tr>
                    <td>{{$impresora->nombre}}</td>
                    <td>{{$impresora->marca}}</td>
                    <td>{{$impresora->precio}}</td>
                    <td>
                        @if($impresora->estatus == 1)
                        {{ 'Asignada' }}
                        @elseif($impresora->estatus == 2)
                        {{ 'No funciona' }}
                        @elseif($impresora->estatus == 3)
                        {{ 'Partes' }}
                        @elseif($impresora->estatus == 4)
                        {{ 'En reparación' }}
                        @elseif($impresora->estatus == 5)
                        {{ 'En garantía' }}
                        @elseif($impresora->estatus == 6)
                        {{ 'Baja' }}
                        @else
                        {{ 'Almacenada' }}
                        @endif
                    </td>
                    <?php 
                        $fecha = explode("-", $impresora->fecha_mantenimiento);
                    ?>
                    @if(count($fecha) > 0)
                        <td>{{ $fecha[2]."-".$fecha[1]."-".$fecha[0] }}</td>
                    @else
                         <td>{{'-'}}</td>
                    @endif
                    <td>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-success" title="Ver detalle" href="/administrador/impresora/detalle/{{$impresora->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>

                            <div class="col-md-3">
                                <a class="btn btn-primary" href="/administrador/impresora/edit/{{$impresora->id}}"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                            </div>
                            
                            <div class="col-md-3">
                                <button class="btn btn-danger delete" data-id="{{$impresora->id}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-responsive col-md-2">
        <a class="btn btn-info" href="/administrador/impresora/alta_impresora"><span><i class="fa fa-plus" aria-hidden="true"></i></span></a>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
        <form action="/administrador/impresora/delete" method="POST">
            {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Borrar Impresora</h4>
            </div>
            <div class="modal-body">
              <p>¿Esta seguro de querer borrar el registro de la impresora?</p>
              <p id="nombre_impresora"></p>
              <input type="hidden" name="id" id="id_impresora">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Borrar</button>
            </div>
          </div>
        </form>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script>
    $('.delete').click(function(){
        var id = $(this).attr("data-id")
        $("#id_impresora").val(id);
    })
</script>
@stop