@extends('layouts.admin')
@section('content')
	<style>.filas{margin-top: 20px;}</style>
	<div class="row">
		<div class="col-xs-12">
			<h2 class="titulos">Registrar Accesorio</h2>
			 @if(session()->has('success'))
	            <div class="alert alert-success">Genial!. El Accesorio fue creado correctamente.</div>
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
								  	{{-- <option value="2">No funciona</option>
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
									<option value="#">-marca-</option>
									<optgroup label="Equipo de computo">
									  	<option value="Dell">Dell</option>
									  	<option value="HP">HP</option>
									  	<option value="Lanix">Lanix</option>
									  	<option value="Acer">Acer</option>
									  	<option value="Lenovo">Lenovo</option>
									  	<option value="Sony">Sony</option>
									  {{-- Hasta aqui habia marcas --}}
									 	<option value="BenQ">BenQ</option>
									 	<option value="Getaway">Getaway</option>
									 	<option value="Compaq">Compaq</option>
									 	<option value="Samsung">Samsung</option>
									 	<option value="Toshiba">Toshiba</option>
									 	<option value="LG">LG</option>
									 	<option value="GHIA">GHIA</option>
									 	<option value="Getaway">Getaway</option>
									 	<option value="e-machine">e-machine</option>
									<optgroup label="Impresoras">
									  	<option value="Epson">Epson</option>
									  	<option value="Lexmark">Lexmark</option>
									  	<option value="Brother">Brother</option>
									  	<option value="Xerox">Xerox</option>
									  	<option value="Kyocera">Kyocera</option>
									  	<option value="Zebra">Zebra</option>
									  	<option value="EC-LINE">EC-LINE</option>
									<optgroup label="Accesorios">
										<option value="Logitech">Logitech</option>
										<option value="Acteck">Acteck</option>
										<option value="Vorago">Vorago</option>
										<option value="Genius">Genius</option>
										<option value="ISB">ISB Sola Basic</option>
										<option value="Green Leaf">Green Leaf</option>
										<option value="View Sonic">View Sonic</option>
										<option value="Hanns-G">Hanns-G</option>
										<option value="Microstar">Microstar</option>
										<option value="Steren">Steren</option>
										<option value="Practica">Practica</option>
										<option value="Plantronics">Plantronics</option>
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
								<input type="date" class="form-control" name="fecha_compra">
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
								<label for="" class="control-label">Características adicionales</label>
								<textarea class="form-control" rows="5" placeholder="Ej: Teclado Inalambrico color gris" name="caracteristica"></textarea>
							</div>
						</div>
						<div class="row filas">
							<div class="col-xs-12">
								<a href="/administrador/accesorio" class="btn btn-warning">Regresar</a>
								<input type="submit" class="btn btn-primary pull-right" value="Registrar">
							</div>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
@stop