@extends('layouts.admin')
@section('content')
	<style>.filas{margin-top: 20px;}</style>
	<div class="row">
		<div class="col-xs-12">
			<h2 class="titulos">Registrar Accesorio</h2>
			 @if(session()->has('success'))
	            <div class="alert alert-success">Genial!. El equipo fue creado correctamente.</div>
	        @elseif(session()->has('error'))
	            <div class="alert alert-danger">Error!. No se pudo crear el equipo.</div>
	        @endif
			<form action="/administrador/accesorio" method="POST">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-10">
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label" >Nombre (ID)</label>
								<input type="text" class="form-control" placeholder="Ej: Mouse PC3-Ventas" name="nombre" required>
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Estatus</label>
								<select class="form-control" name="estatus" required>
								   	<option value="">-estatus-</option>
								  	<option value="1">Asignado</option>
								  	<option value="2">No funciona</option>
								  	<option value="3">Partes</option>
								  	<option value="5">En garantia</option>
								  	<option value="4">En reparación</option>
								  	<option value="6">Baja</option>
								  	<option value="7">Almacenada</option>
								</select>
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label">Marca</label>
								<select class="form-control" name="marca">
									<option value="">-marca-</option>
									<option value="Logitech">Logitech</option>
									<option value="HP">HP</option>
									<option value="Acteck">Acteck</option>
									<option value="Vorago">Vorago</option>
									<option value="Dell">Dell</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Modelo</label>
								<input type="text" class="form-control" placeholder="Ej: WM514" name="modelo">
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label">Nº de serie Accesorio</label>
								<input type="text" class="form-control" placeholder="Ej: J66651A9J146851A" name="serie">
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">PC asignada</label>
								<select name="equipo_id" required class="form-control">
									<option value="">-equipo-</option>
									@foreach($equipos as $equipo)
									<option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-4">
								<label for="" class="control-label">Fecha de compra</label>
								<input type="date" class="form-control" name="fecha_compra" required>
							</div>
							<div class="col-md-4">
								<label for="" class="control-label">Fecha de asignación</label>
								<input type="date" class="form-control" name="fecha_asignacion">
							</div>
							<div class="col-md-4">
								<label for="">Precio</label>
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="text" name="precio" class="form-control" required placeholder="No usar comas para los miles">
								</div>
							</div>
						</div>
						<div class="row filas">
							
							<div class="col-md-12">
								<label for="" class="control-label">Caracteristicas adicionales</label>
								<textarea class="form-control" rows="5" placeholder="Ej: Computadora Semi-nueva color negra con algunos tallones en la base del CPU" name="caracteristica"></textarea>
							</div>
						</div>
						<div class="row filas">
							<div class="col-xs-12">
								<a href="/administrador/accesorio" class="btn btn-default">Regresar</a>
								<input type="submit" class="btn btn-primary pull-right" value="Registrar">
							</div>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
@stop