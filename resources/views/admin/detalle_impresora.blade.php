@extends('layouts.admin')

@section('content')
<style>
	.filas{
		margin-top: 20px;
	}
</style>
<div class="row">
    <div class="col-md-12">
    	<h2 class="titulos">Detalle de impresora</h2>
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<div class="row filas">
					<div class="col-md-6">
						<label for="" class="control-label" >Nombre (ID)</label>
						<input type="text" class="form-control" value="{{$impresora->nombre}}">
					</div>
					<div class="col-md-6">
						<label for="" class="control-label">Estatus</label>
						{{--<select class="form-control" name="estatus" required>
							<option value="">-estatus-</option>
						  	<option value="1">Asignada</option>
						  	<option value="2">No funciona</option>
						  	<option value="3">Partes</option>
						  	<option value="5">En garantia</option>
						  	<option value="4">En reparación</option>
						  	<option value="6">Baja</option>
						  	<option value="7">Almacenada</option>
						</select>--}}
						@if($impresora->estatus == 1)
                        <?php $estatus = 'Asignada' ?>
                        @elseif($impresora->estatus == 2)
                        <?php $estatus = 'No funciona' ?>
                        @elseif($impresora->estatus == 3)
                        <?php $estatus = 'Partes' ?>
                        @elseif($impresora->estatus == 4)
                        <?php $estatus = 'En reparación' ?>
                        @elseif($impresora->estatus == 5)
                        <?php $estatus = 'En garantía' ?>
                        @elseif($impresora->estatus == 6)
                        <?php $estatus = 'Baja' ?>
                        @else
                        <?php $estatus = 'Almacenada' ?>
                        @endif
						<input type="text" class="form-control" value="{{$estatus}}">
					</div>
				</div>
				<div class="row filas">
					<div class="col-md-6">
						<label for="" class="control-label">Marca</label>
						{{--<select class="form-control" name="marca">
							<option value="">-marca-</option>
							<option value="Epson">Epson</option>
							<option value="HP">HP</option>
							<option value="Lexmark">Lexmark</option>
							<option value="Brother">Brother</option>
							<option value="Xerox">Xerox</option>
							<option value="Kyocera">Kyocera</option>
						</select>--}}
						<input type="text" class="form-control" value="{{$impresora->marca}}">
					</div>
					<div class="col-md-6">
						<label for="" class="control-label">Modelo</label>
						<input type="text" class="form-control" value="{{$impresora->modelo}}">
					</div>
				</div>
				<div class="row filas">
					<div class="col-md-6">
						<label for="" class="control-label">Tipo</label>
						{{--<select class="form-control" name="tipo">
							<option value="">-Tipo de impresora-</option>
						  	<option value="Laser">Laser</option>
						  	<option value="Inyección de Tinta">Inyección de tinta</option>
						</select>--}}
						<input type="text" class="form-control" value="{{$impresora->tipo}}">
					</div>
					<div class="col-md-6">
						<label for="" class="control-label">Precio</label>
						<input class="form-control" type="text" value="{{$impresora->precio}}">
					</div>
				</div>
				<div class="row filas">
					<div class="col-md-4">
						<label for="" class="control-label">Fecha de compra</label>
						<input type="text" class="form-control" value="{{ explode(" ", $impresora->fecha_compra)[0]}}" required>
					</div>
					<div class="col-md-4">
						<label for="" class="control-label">Fecha de instalación</label>
						<input type="text" class="form-control" value="{{explode(" ", $impresora->fecha_instalacion)[0] }}">
					</div>
					<div class="col-md-4">
						<label for="" class="control-label">Fecha de ultimo Manten.</label>
						<input type="text" class="form-control" value="{{explode(" ", $impresora->fecha_ultimo_mantenimiento)[0] }}">
					</div>
				</div>
				<div class="row filas">
					<div class="col-md-6">
						<label for="" class="control-label">Nº de serie Impresora</label>
						<input type="text" class="form-control" value="{{$impresora->serie}}">
					</div>
					<div class="col-md-6">
						<label for="" class="control-label">Caracteristicas adicionales</label>
						<textarea class="form-control" rows="2">{{$impresora->caracteristica}}</textarea>
					</div>
				</div>
				<div class="row filas">
					<div class="col-xs-12">
						<a href="/administrador/impresora" class="btn btn-default">Regresar</a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="col-md-12">
					<label for="" class="control-label">Departamentos:</label>
					@if(count($departamentos) > 0)
						@foreach($departamentos as $departamento)
						<ul>
							<li>{{$departamento->nombre}}</li>
						</ul>
						@endforeach
					@else
						<ul class="list-group">
	 	 					<li class="list-group-item"><i class="fa fa-info-circle" aria-hidden="true"></i> No se han seleccionado departamentos</li>	
	 	 				</ul>
					@endif
				</div>
			</div>
		</div>
    </div>
</div>
@stop