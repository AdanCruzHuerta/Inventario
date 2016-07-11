@extends('layouts.admin')
@section('content')
	<style>.filas{margin-top: 20px;}</style>
	<div class="row">
		<div class="col-xs-12">
			<h2 class="titulos">Registrar Impresora</h2>
			@if(session()->has('success'))
	            <div class="alert alert-success">Genial!. La impresora fue registrada correctamente.</div>
	        @elseif(session()->has('error'))
	            <div class="alert alert-danger">Error!. No se pudo registrar la impresora.</div>
	        @endif
			<form action="/administrador/impresora" class="" method="POST">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label" >Nombre (ID)</label>
								<input type="text" class="form-control" placeholder="Ej: Impresora-Ventas" name="nombre" required>
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Estatus</label>
								<select class="form-control" name="estatus" required>
									<option value="">-estatus-</option>
								  	<option value="1">Asignada</option>
								 {{--  	<option value="2">No funciona</option>
								  	<option value="3">Partes</option>
								  	<option value="5">En garantia</option>
								  	<option value="4">En reparación</option>
								  	<option value="6">Baja</option> --}}
								  	<option value="7">Almacenada</option>
								</select>
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label">Marca</label>
								<select class="form-control" name="marca">
									<option value="">-marca-</option>
									<option value="Epson">Epson</option>
									<option value="HP">HP</option>
									<option value="Lexmark">Lexmark</option>
									<option value="Brother">Brother</option>
									<option value="Xerox">Xerox</option>
									<option value="Kyocera">Kyocera</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Modelo</label>
								<input type="text" class="form-control" placeholder="Ej: laserjet pro p1102w" name="modelo">
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label">Tipo</label>
								<select class="form-control" name="tipo">
									<option value="">-Tipo de impresora-</option>
								  	<option value="Laser">Láser</option>
								  	<option value="Inyección de Tinta">Inyección de tinta</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Precio</label>
								<input class="form-control" type="text" name="precio" required placeholder="No usar comas para los miles">
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-4">
								<label for="" class="control-label">Fecha de compra</label>
								<input type="date" class="form-control" name="fecha_compra" required>
							</div>
							<div class="col-md-4">
								<label for="" class="control-label">Fecha de instalación</label>
								<input type="date" class="form-control" name="fecha_instalacion">
							</div>
							<div class="col-md-4">
								<label for="" class="control-label">Nº de serie Impresora</label>
								<input type="text" class="form-control" placeholder="Ej: J66651A9J146851A" name="serie">
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-12">
								<label for="" class="control-label">Características adicionales</label>
								<textarea class="form-control" rows="5" placeholder="Ej: Impresora con capacidad para 40 hojas de impresion por minuto color negra" name="caracteristica"></textarea>
							</div>
						</div>
						<div class="row filas">
							<div class="col-xs-12">
								<a href="/administrador/impresora" class="btn btn-warning">Regresar</a>
								<input type="submit" class="btn btn-primary pull-right" value="Registrar">
								
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="col-md-12">
							<label for="" class="control-label">Departamento:</label>
							@foreach($departamentos as $departamento)
							<div class="checkbox">
								<label>
									<input type="checkbox" value="{{$departamento->id}}" name="departamentos_id[]">
									{{ $departamento->nombre }}
								</label>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop