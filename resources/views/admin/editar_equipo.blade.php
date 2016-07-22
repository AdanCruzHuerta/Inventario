@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<h2 class="pull-left titulos">Registrar Equipo de Computo</h2>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		@if(session()->has('success'))
            <div class="alert alert-success">Genial!. El equipo fue actualizado correctamente.</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">Error!. No se pudo actualizar el equipo.</div>
        @endif
		<form action="/administrador/equipocomputo/update" class="" method="POST">
			<input type="hidden" name="id" value="{{$equipo->id}}">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-3">
					<label for="" class="control-label" >Nombre (ID):</label>
					<input type="text" class="form-control" placeholder="Ej: Ventas-PC" name="nombre" value="{{$equipo->nombre}}" required>
				</div>
				<div class="col-md-3">
				<label for="" class="control-label">Estatus</label>
					<select class="form-control" name="estatus">
					   	<option @if($equipo->estatus == "") {{ 'selected' }} @endif value="">-estatus-</option>
					  	<option @if($equipo->estatus == 1) {{ 'selected' }} @endif value="1">Asignado</option>
					  	<option @if($equipo->estatus == 2) {{ 'selected' }} @endif value="2">No funciona</option>
					  	<option @if($equipo->estatus == 3) {{ 'selected' }} @endif value="3">Partes</option>
					  	<option @if($equipo->estatus == 5) {{ 'selected' }} @endif value="5">En garantia</option>
					  	<option @if($equipo->estatus == 4) {{ 'selected' }} @endif value="4">En reparación</option>
					  	<option @if($equipo->estatus == 6) {{ 'selected' }} @endif value="6">Baja</option>
					  	<option @if($equipo->estatus == 7) {{ 'selected' }} @endif value="7">Almacenada</option>
					</select>
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">Empleado responsable:</label>
					<div class="input-group">
						<select class="form-control" name="Empleado_id" required>
						  <option value="">-nombre del empleado-</option>
						  @foreach($empleados as $empleado)
						  <option @if($equipo->Empleado_id == $empleado->id) {{ 'selected' }} @endif value="{{$empleado->id}}">{{$empleado->nombre}}</option>
						  @endforeach
						</select>
						<span class="input-group-addon">+</span>
					</div>	
				</div>
			</div><br>

			<div class="row">
				<div class="col-md-3">
					<label for="" class="control-label">Marca</label>
					<select class="form-control" name="marca">
					  	  <option @if($equipo->marca == '') {{ 'selected' }} @endif value="">-marca-</option>
					  	  <optgroup label="Equipo de computo">
						  <option @if($equipo->marca == 'Dell') {{ 'selected' }} @endif value="Dell">Dell</option>
						  <option @if($equipo->marca == 'HP') {{ 'selected' }} @endif value="HP">HP</option>
						  <option @if($equipo->marca == 'Lanix') {{ 'selected' }} @endif value="Lanix">Lanix</option>
						  <option @if($equipo->marca == 'Acer') {{ 'selected' }} @endif value="Acer">Acer</option>
						  <option @if($equipo->marca == 'Lenovo') {{ 'selected' }} @endif value="Lenovo">Lenovo</option>
						  <option @if($equipo->marca == 'Sony') {{ 'selected' }} @endif value="Sony">Sony</option>
						  <option @if($equipo->marca == 'BenQ') {{ 'selected' }} @endif value="BenQ">BenQ</option>
						  <option @if($equipo->marca == 'Getaway') {{ 'selected' }} @endif value="Getaway">Getaway</option>
						  <option @if($equipo->marca == 'Compaq') {{ 'selected' }} @endif value="Compaq">Compaq</option>
						  <option @if($equipo->marca == 'Samsung') {{ 'selected' }} @endif value="Samsung">Samsung</option>
						  <option @if($equipo->marca == 'Toshiba') {{ 'selected' }} @endif value="Toshiba">Toshiba</option>
						  <option @if($equipo->marca == 'LG') {{ 'selected' }} @endif value="LG">LG</option>
						  <option @if($equipo->marca == 'GHIA') {{ 'selected' }} @endif value="GHIA">GHIA</option>
						  <option @if($equipo->marca == 'e-machine') {{ 'selected' }} @endif value="e-machine">e-machine</option>
						  <optgroup label="Impresoras">
						  <option @if($equipo->marca == 'Lexmark') {{ 'selected' }} @endif value="Lexmark">Lexmark</option>
						  <option @if($equipo->marca == 'Brother') {{ 'selected' }} @endif value="Brother">Brother</option>
						  <option @if($equipo->marca == 'Xerox') {{ 'selected' }} @endif value="Xerox">Xerox</option>
						  <option @if($equipo->marca == 'Kyocera') {{ 'selected' }} @endif value="Kyocera">Kyocera</option>
						  <option @if($equipo->marca == 'Zebra') {{ 'selected' }} @endif value="Zebra">Zebra</option>
						  <option @if($equipo->marca == 'EC-LINE') {{ 'selected' }} @endif value="EC-LINE">EC-LINE</option>
						  <optgroup label="Accesorios">
						  <option @if($equipo->marca == 'Logitech') {{ 'selected' }} @endif value="Logitech">Logitech</option>
						  <option @if($equipo->marca == 'Acteck') {{ 'selected' }} @endif value="Acteck">Acteck</option>
						  <option @if($equipo->marca == 'Vorago') {{ 'selected' }} @endif value="Vorago">Vorago</option>
						  <option @if($equipo->marca == 'Genius') {{ 'selected' }} @endif value="Genius">Genius</option>
						  <option @if($equipo->marca == 'ISB') {{ 'selected' }} @endif value="ISB">ISB Sola Basic</option>
						  <option @if($equipo->marca == 'Green Leaf') {{ 'selected' }} @endif value="Green Leaf">Green Leaf</option>
						  <option @if($equipo->marca == 'View Sonic') {{ 'selected' }} @endif value="View Sonic">View Sonic</option>
						  <option @if($equipo->marca == 'Hanns-G') {{ 'selected' }} @endif value="Hanns-G">Hanns-G</option>
						  <option @if($equipo->marca == 'Microstar') {{ 'selected' }} @endif value="Microstar">Microstar</option>
					</select>
				</div>
				<div class="col-md-3">
				<label for="" class="control-label">Memoria RAM:</label>
					<div class="input-group">
						<input type="number" class="form-control" placeholder="2" name="memoria" value="{{$equipo->memoria}}">
						<span class="input-group-addon">GB</span>
					</div>
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">SAP Instalado:</label>
					<select class="form-control" name="sap_instalado">
						<option @if($equipo->sap_instalado == "") {{ 'selected' }} @endif value="">-Sap Instalado-</option>
						<option @if($equipo->sap_instalado == 1) {{ 'selected' }} @endif value="1">Si</option>
						<option @if($equipo->sap_instalado == 2) {{ 'selected' }} @endif value="2">No</option>
					</select>
				</div>
				
			</div><br>

			<div class="row">
				<div class="col-md-3">
					<label for="" class="control-label">Modelo</label>
					<input type="text" class="form-control" placeholder="Ej: Pavilion g4" name="modelo" value="{{$equipo->modelo}}">
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">Procesador:</label>
					<input type="text" class="form-control" placeholder="Ej: Intel i3 tercera generación" name="procesador" value="{{$equipo->procesador}}">
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">Nº de serie CPU:</label>
					<input type="text" class="form-control" name="serie" value="{{$equipo->serie}}">
				</div>
			</div><br>

			<div class="row">
				<div class="col-md-3">
					<label for="" class="control-label">Fecha de compra</label>
					<input type="date" class="form-control" name="fecha_compra" value="{{ explode(" ", $equipo->fecha_compra)[0] }}">
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">Fecha de instalación</label>
					<input type="date" class="form-control" name="fecha_instalacion" value="{{ explode(" ", $equipo->fecha_instalacion)[0] }}">
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">Precio:</label>
					<div class="input-group">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control" name="precio" placeholder="Ej: 3540" required value="{{$equipo->precio}}"/>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-md-3">
					<label for="" class="control-label">Sistema Operativo</label>
					<input type="text" class="form-control" name="sistema_operativo" placeholder="Ej. windows 7 Ultimate Service Pack 1" required value="{{$equipo->sistema_operativo}}"/>
				</div>
				<div class="col-md-6">
					<label for="" class="control-label">Características adicionales</label>
					<textarea class="form-control" rows="5" placeholder="Ej: Computadora Semi-nueva color negra con algunos tallones en la base del CPU" name="caracteristica">{{$equipo->caracteristica}}</textarea>
				</div>
			</div> <br>
			<div class="row">
				<div class="col-md-12">
					<a href="/administrador" class="btn btn-warning">Regresar</a>
					<input type="submit" value="Registrar" class="btn  btn-primary col-md-offset-8">
				</div>
			</div>
		</form>
	</div>	
</div>

@stop