@extends('layouts.admin')
@section('content')
	<style>
		.filas{
			margin-top: 20px;
		}
	</style>
	<div class="row">
		<div class="col-xs-12">
			<h2 class="titulos">Registrar Accesorio</h2>
			<div class="row">
				<div class="col-md-10">
					<div class="row filas">
						<div class="col-md-6">
							<label for="" class="control-label" >Nombre (ID)</label>
							<input type="text" class="form-control" value="{{$accesorio->nombre}}">
						</div>
						<div class="col-md-6">
							<label for="" class="control-label">Estatus</label>
							<select class="form-control">
							   	<option @if($accesorio->estatus == "") {{ 'selected' }} @endif value="">-estatus-</option>
							  	<option @if($accesorio->estatus == 1) {{ 'selected' }} @endif value="1">Asignado</option>
							  	<option @if($accesorio->estatus == 2) {{ 'selected' }} @endif value="2">No funciona</option>
							  	<option @if($accesorio->estatus == 3) {{ 'selected' }} @endif value="3">Partes</option>
							  	<option @if($accesorio->estatus == 5) {{ 'selected' }} @endif value="5">En garantia</option>
							  	<option @if($accesorio->estatus == 4) {{ 'selected' }} @endif value="4">En reparación</option>
							  	<option @if($accesorio->estatus == 6) {{ 'selected' }} @endif value="6">Baja</option>
							  	<option @if($accesorio->estatus == 7) @endif value="7">Almacenada</option>
							</select>
						</div>
					</div>
					<div class="row filas">
						<div class="col-md-6">
							<label for="" class="control-label">Marca</label>
							<select class="form-control">
								<option @if($accesorio->marca == "") {{'selected'}} @endif value="">-marca-</option>
								<option @if($accesorio->marca == "Logitech") {{'selected'}} @endif value="Logitech">Logitech</option>
								<option @if($accesorio->marca == "HP") {{'selected'}} @endif value="HP">HP</option>
								<option @if($accesorio->marca == "Acteck") {{'selected'}} @endif value="Acteck">Acteck</option>
								<option @if($accesorio->marca == "Vorago") {{'selected'}} @endif value="Vorago">Vorago</option>
								<option @if($accesorio->marca == "Dell") {{'selected'}} @endif value="Dell">Dell</option>
							</select>
						</div>
						<div class="col-md-6">
							<label for="" class="control-label">Modelo</label>
							<input type="text" class="form-control" value="{{$accesorio->modelo}}">
						</div>
					</div>
					<div class="row filas">
						<div class="col-md-6">
							<label for="" class="control-label">Nº de serie Accesorio</label>
							<input type="text" class="form-control" value="{{$accesorio->serie}}">
						</div>
						<div class="col-md-6">
							<label for="" class="control-label">PC asignada</label>
							<input type="text" class="form-control" value="{{$accesorio->equipo}}">
						</div>
					</div>
					<div class="row filas">
						<div class="col-md-6">
							<label for="" class="control-label">Fecha de compra</label>
							<input type="date" class="form-control" value="{{$accesorio->fecha_compra}}">
						</div>
						<div class="col-md-6">
							<label for="" class="control-label">Fecha de asignación</label>
							<input type="date" class="form-control" value="{{$accesorio->fecha_asignacion}}">
						</div>
					</div>
					<div class="row filas">
						<div class="col-md-6">
							<label for="">Precio</label>
							<input type="text" name="precio" class="form-control" value="{{$accesorio->precio}}">
						</div>
						<div class="col-md-6">
							<label for="" class="control-label">Caracteristicas adicionales</label>
							<textarea class="form-control" rows="2">{{$accesorio->caracteristica}}</textarea>
						</div>
					</div>
					<div class="row filas">
						<div class="col-xs-12">
							<a href="/administrador/accesorio" class="btn btn-default">Regresar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop