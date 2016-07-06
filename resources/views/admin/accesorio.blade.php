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
                    <td>{{ $accesorio->estatus }}</td>
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
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
        <form action="/administrador/accesorio/delete" method="POST">
            {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Borrar accesorio</h4>
            </div>
            <div class="modal-body">
              <p>¿Esta seguro de querer borrar el registro del accesorio?</p>
              <p id="nombre_accesorio"></p>
              <input type="hidden" name="id" id="id_impresora">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Borrar</button>
            </div>
          </div>
        </form>
        </div>
    </div>
</div>

<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );

</script>
@stop
@section('scripts')
<script>
    $('.delete').click(function(){
        var id = $(this).attr("data-id")
        $("#id_accesorio").val(id);
    })
</script>