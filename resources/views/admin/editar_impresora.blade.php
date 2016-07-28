@extends('layouts.admin')

@section('content')
<style>.filas{margin-top: 20px;}</style>
<div class="row">
    <div class="col-md-12">
    	<h2 class="titulos">Editar Impresora</h2>
    	@if(session()->has('success'))
	            <div class="alert alert-success">Genial!. La Impresora fue modificada correctamente.</div>
	        @elseif(session()->has('error'))
	            <div class="alert alert-danger">Error!. No se pudo modificar la Impresora.</div>
	        @endif
			<form action="/administrador/impresora/update" class="" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{$impresora->id}}"/>
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label" >Nombre (ID)</label>
								<input type="text" class="form-control" placeholder="Ej: Impresora-Ventas" name="nombre" required value="{{$impresora->nombre}}">
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Estatus</label>
								<select class="form-control" name="estatus" required>
									<option @if($impresora->estatus == "") @endif value="">-estatus-</option>
								  	<option @if($impresora->estatus == 1) {{'selected'}} @endif value="1">Asignada</option>
								  	<option @if($impresora->estatus == 2) {{'selected'}} @endif value="2">No funciona</option>
								  	<option @if($impresora->estatus == 3) {{'selected'}} @endif value="3">Partes</option>
								  	<option @if($impresora->estatus == 5) {{'selected'}} @endif value="5">En garantía</option>
								  	<option @if($impresora->estatus == 4) {{'selected'}} @endif value="4">En reparación</option>
								  	<option @if($impresora->estatus == 6) {{'selected'}} @endif value="6">Baja</option>
								  	<option @if($impresora->estatus == 7) {{'selected'}} @endif value="7">Almacenada</option>
								</select>
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label">Marca</label>
								<select class="form-control" name="marca">
							  	  <option @if($impresora->marca == '') {{ 'selected' }} @endif value="">-marca-</option>
							  	  <optgroup label="Equipo de computo">
								  <option @if($impresora->marca == 'Dell') {{ 'selected' }} @endif value="Dell">Dell</option>
								  <option @if($impresora->marca == 'HP') {{ 'selected' }} @endif value="HP">HP</option>
								  <option @if($impresora->marca == 'Lanix') {{ 'selected' }} @endif value="Lanix">Lanix</option>
								  <option @if($impresora->marca == 'Acer') {{ 'selected' }} @endif value="Acer">Acer</option>
								  <option @if($impresora->marca == 'Lenovo') {{ 'selected' }} @endif value="Lenovo">Lenovo</option>
								  <option @if($impresora->marca == 'Sony') {{ 'selected' }} @endif value="Sony">Sony</option>
								  <option @if($impresora->marca == 'BenQ') {{ 'selected' }} @endif value="BenQ">BenQ</option>
								  <option @if($impresora->marca == 'Getaway') {{ 'selected' }} @endif value="Getaway">Getaway</option>
								  <option @if($impresora->marca == 'Compaq') {{ 'selected' }} @endif value="Compaq">Compaq</option>
								  <option @if($impresora->marca == 'Samsung') {{ 'selected' }} @endif value="Samsung">Samsung</option>
								  <option @if($impresora->marca == 'Toshiba') {{ 'selected' }} @endif value="Toshiba">Toshiba</option>
								  <option @if($impresora->marca == 'LG') {{ 'selected' }} @endif value="LG">LG</option>
								  <option @if($impresora->marca == 'GHIA') {{ 'selected' }} @endif value="GHIA">GHIA</option>
								  <option @if($impresora->marca == 'e-machine') {{ 'selected' }} @endif value="e-machine">e-machine</option>
								  <option @if($impresora->marca == 'Asus') {{ 'selected' }} @endif value="Asus">Asus</option>
								  <optgroup label="Impresoras">
								  <option @if($impresora->marca == 'Lexmark') {{ 'selected' }} @endif value="Lexmark">Lexmark</option>
								  <option @if($impresora->marca == 'Brother') {{ 'selected' }} @endif value="Brother">Brother</option>
								  <option @if($impresora->marca == 'Xerox') {{ 'selected' }} @endif value="Xerox">Xerox</option>
								  <option @if($impresora->marca == 'Kyocera') {{ 'selected' }} @endif value="Kyocera">Kyocera</option>
								  <option @if($impresora->marca == 'Zebra') {{ 'selected' }} @endif value="Zebra">Zebra</option>
								  <option @if($impresora->marca == 'EC-LINE') {{ 'selected' }} @endif value="EC-LINE">EC-LINE</option>
								  <optgroup label="Accesorios">
								  <option @if($impresora->marca == 'Logitech') {{ 'selected' }} @endif value="Logitech">Logitech</option>
								  <option @if($impresora->marca == 'Acteck') {{ 'selected' }} @endif value="Acteck">Acteck</option>
								  <option @if($impresora->marca == 'Vorago') {{ 'selected' }} @endif value="Vorago">Vorago</option>
								  <option @if($impresora->marca == 'Genius') {{ 'selected' }} @endif value="Genius">Genius</option>
								  <option @if($impresora->marca == 'ISB') {{ 'selected' }} @endif value="ISB">ISB Sola Basic</option>
								  <option @if($impresora->marca == 'Green Leaf') {{ 'selected' }} @endif value="Green Leaf">Green Leaf</option>
								  <option @if($impresora->marca == 'View Sonic') {{ 'selected' }} @endif value="View Sonic">View Sonic</option>
								  <option @if($impresora->marca == 'Hanns-G') {{ 'selected' }} @endif value="Hanns-G">Hanns-G</option>
								  <option @if($impresora->marca == 'Microstar') {{ 'selected' }} @endif value="Microstar">Microstar</option>
								  <option @if($impresora->marca == 'Steren') {{ 'selected' }} @endif value="Steren">Steren</option>
								  <option @if($impresora->marca == 'Practica') {{ 'selected' }} @endif value="Practica">Practica</option>
								  <option @if($impresora->marca == 'Plantronics') {{ 'selected' }} @endif value="Plantronics">Plantronics</option>
							</select>
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Modelo</label>
								<input type="text" class="form-control" placeholder="Ej: laserjet pro p1102w" name="modelo" value="{{$impresora->modelo}}">
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label">Tipo</label>
								<select class="form-control" name="tipo">
									<option @if($impresora->tipo == "") {{'selected'}} @endif value="">-Tipo de impresora-</option>
								  	<option @if($impresora->tipo == "Laser") {{'selected'}} @endif value="Laser">Láser</option>
								  	<option @if($impresora->tipo == "Inyección de Tinta") {{'selected'}} @endif value="Inyección de Tinta">Inyección de tinta</option>
								  	<option @if($impresora->tipo == "Termica") {{'selected'}} @endif value="Termica">Térmica</option>
								  	<option @if($impresora->tipo == "Etiquetas") {{'selected'}} @endif value="Etiquetas">Etiquetas</option>
								  	<option @if($impresora->tipo == "Credenciales") {{'selected'}} @endif value="Credenciales">Credenciales</option>
								  	<option @if($impresora->tipo == "Multifuncional") {{'selected'}} @endif value="Multifuncional">Multifuncional</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Precio</label>
								<input class="form-control" type="text" name="precio" required placeholder="Ej: 1240" value="{{$impresora->precio}}">
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-4">
								<label for="" class="control-label">Fecha de compra</label>
								<input type="date" class="form-control" name="fecha_compra" required value="{{explode(" ", $impresora->fecha_compra)[0]}}">
							</div>
							<div class="col-md-4">
								<label for="" class="control-label">Fecha de instalación</label>
								<input type="date" class="form-control" name="fecha_instalacion" value="{{explode(" ", $impresora->fecha_instalacion)[0]}}">
							</div>
							<div class="col-md-4">
								<label for="" class="control-label">Nº de serie Impresora</label>
								<input type="text" class="form-control" placeholder="Ej: J66651A9J146851A" name="serie" value="{{$impresora->serie}}">
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-12">
								<label for="" class="control-label">Características adicionales</label>
								<textarea class="form-control" rows="5" placeholder="Ej: Computadora Semi-nueva color negra con algunos tallones en la base del CPU" name="caracteristica">{{$impresora->caracteristica}}</textarea>
							</div>
						</div>
					{{-- 	<div class="row">
							<div class="col-xs-12">
								<a href="/administrador/impresora" class="btn btn-default pull-left">Regresar</a>
								<input type="submit" class="btn btn-primary pull-right" value="Actualizar">
							</div>
						</div> --}}
						<div class="row filas">
							<div class="col-xs-12">
								<a href="/administrador/impresora" class="btn btn-warning">Regresar</a>
								<input type="submit" class="btn btn-primary pull-right" value="Actualizar">
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="col-md-12">
							<label for="" class="control-label">Departamento:</label>

							@foreach($departamentos as $departamento)
							<div class="checkbox">
								<label>
									<input type="checkbox" value="{{$departamento->id}}" name="departamentos_id[]" 
									@for($i=0; $i < count($impresora_departamento); $i++)
										@if($impresora_departamento[$i]->id == $departamento->id) 
						      				{{ 'checked' }}
						      			@endif 
									@endfor >
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