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
			 @if(session()->has('success'))
	            <div class="alert alert-success">Genial!. El accesorio fue actualizado correctamente.</div>
	        @elseif(session()->has('error'))
	            <div class="alert alert-danger">Error!. No se pudo actualizar el accesorio.</div>
	        @endif
			<form action="/administrador/accesorio/update" method="POST">
				{{ csrf_field() }}
				<input type="hidden" value="{{$accesorio->id}}" name="id">
				<div class="row">
					<div class="col-md-10">
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label" >Nombre (ID)</label>
								<input type="text" class="form-control" placeholder="Ej: Mouse PC3-Ventas" name="nombre" required value="{{$accesorio->nombre}}">
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Estatus</label>
								<select class="form-control" name="estatus" required>
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
								<select class="form-control" name="marca">
							  	  <option @if($accesorio->marca == '') {{ 'selected' }} @endif value="">-marca-</option>
							  	  <optgroup label="Equipo de computo">
								  <option @if($accesorio->marca == 'Dell') {{ 'selected' }} @endif value="Dell">Dell</option>
								  <option @if($accesorio->marca == 'HP') {{ 'selected' }} @endif value="HP">HP</option>
								  <option @if($accesorio->marca == 'Lanix') {{ 'selected' }} @endif value="Lanix">Lanix</option>
								  <option @if($accesorio->marca == 'Acer') {{ 'selected' }} @endif value="Acer">Acer</option>
								  <option @if($accesorio->marca == 'Lenovo') {{ 'selected' }} @endif value="Lenovo">Lenovo</option>
								  <option @if($accesorio->marca == 'Sony') {{ 'selected' }} @endif value="Sony">Sony</option>
								  <option @if($accesorio->marca == 'BenQ') {{ 'selected' }} @endif value="BenQ">BenQ</option>
								  <option @if($accesorio->marca == 'Getaway') {{ 'selected' }} @endif value="Getaway">Getaway</option>
								  <option @if($accesorio->marca == 'Compaq') {{ 'selected' }} @endif value="Compaq">Compaq</option>
								  <option @if($accesorio->marca == 'Samsung') {{ 'selected' }} @endif value="Samsung">Samsung</option>
								  <option @if($accesorio->marca == 'Toshiba') {{ 'selected' }} @endif value="Toshiba">Toshiba</option>
								  <option @if($accesorio->marca == 'LG') {{ 'selected' }} @endif value="LG">LG</option>
								  <option @if($accesorio->marca == 'GHIA') {{ 'selected' }} @endif value="GHIA">GHIA</option>
								  <option @if($accesorio->marca == 'e-machine') {{ 'selected' }} @endif value="e-machine">e-machine</option>
								  <option @if($accesorio->marca == 'Asus') {{ 'selected' }} @endif value="Asus">Asus</option>
								  <optgroup label="Impresoras">
								  <option @if($accesorio->marca == 'Lexmark') {{ 'selected' }} @endif value="Lexmark">Lexmark</option>
								  <option @if($accesorio->marca == 'Brother') {{ 'selected' }} @endif value="Brother">Brother</option>
								  <option @if($accesorio->marca == 'Xerox') {{ 'selected' }} @endif value="Xerox">Xerox</option>
								  <option @if($accesorio->marca == 'Kyocera') {{ 'selected' }} @endif value="Kyocera">Kyocera</option>
								  <option @if($accesorio->marca == 'Zebra') {{ 'selected' }} @endif value="Zebra">Zebra</option>
								  <option @if($accesorio->marca == 'EC-LINE') {{ 'selected' }} @endif value="EC-LINE">EC-LINE</option>
								  <optgroup label="Accesorios">
								  <option @if($accesorio->marca == 'Logitech') {{ 'selected' }} @endif value="Logitech">Logitech</option>
								  <option @if($accesorio->marca == 'Acteck') {{ 'selected' }} @endif value="Acteck">Acteck</option>
								  <option @if($accesorio->marca == 'Vorago') {{ 'selected' }} @endif value="Vorago">Vorago</option>
								  <option @if($accesorio->marca == 'Genius') {{ 'selected' }} @endif value="Genius">Genius</option>
								  <option @if($accesorio->marca == 'ISB') {{ 'selected' }} @endif value="ISB">ISB Sola Basic</option>
								  <option @if($accesorio->marca == 'Green Leaf') {{ 'selected' }} @endif value="Green Leaf">Green Leaf</option>
								  <option @if($accesorio->marca == 'View Sonic') {{ 'selected' }} @endif value="View Sonic">View Sonic</option>
								  <option @if($accesorio->marca == 'Hanns-G') {{ 'selected' }} @endif value="Hanns-G">Hanns-G</option>
								  <option @if($accesorio->marca == 'Microstar') {{ 'selected' }} @endif value="Microstar">Microstar</option>
								  <option @if($accesorio->marca == 'Steren') {{ 'selected' }} @endif value="Steren">Steren</option>
								  <option @if($accesorio->marca == 'Practica') {{ 'selected' }} @endif value="Practica">Practica</option>
								  <option @if($accesorio->marca == 'Plantronics') {{ 'selected' }} @endif value="Plantronics">Plantronics</option>

							</select>
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Modelo</label>
								<input type="text" class="form-control" placeholder="Ej: WM514" name="modelo" value="{{$accesorio->modelo}}">
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label">Nº de serie Accesorio</label>
								<input type="text" class="form-control" placeholder="Ej: J66651A9J146851A" name="serie" value="{{$accesorio->serie}}">
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">PC asignada</label>
								<select name="equipo_id" required class="form-control">
									<option value="">-equipo-</option>
									@foreach($equipos as $equipo)
									<option @if($accesorio->equipo_id == $equipo->id) {{'selected'}} @endif value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label">Fecha de compra</label>
								<input type="date" class="form-control" name="fecha_compra"  value="{{$accesorio->fecha_compra}}">
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Fecha de asignación</label>
								<input type="date" class="form-control" name="fecha_asignacion" value="{{$accesorio->fecha_asignacion}}">
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-6">
								<label for="">Precio</label>
								<input type="text" name="precio" class="form-control" required placeholder="Ej. 200" value="{{$accesorio->precio}}">
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Características adicionales</label>
								<textarea class="form-control" rows="2" placeholder="Ej: Computadora Semi-nueva color negra con algunos tallones en la base del CPU" name="caracteristica">{{$accesorio->caracteristica}}</textarea>
							</div>
						</div>
						<div class="row filas">
							<div class="col-xs-12">
								<a href="/administrador/accesorio" class="btn btn-warning">Regresar</a>
								<input type="submit" class="btn btn-primary pull-right" value="Actualizar">
							</div>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
@stop