@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<h2 class="pull-left titulos">Registrar Equipo de Computo</h2>
		@if(session()->has('success'))
            <div class="alert alert-success">Genial!. El equipo fue creado correctamente.</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">Error!. No se pudo crear el equipo.</div>
        @endif
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-md-3">
				<label for="" class="control-label" >Nombre (ID):</label>
				<input type="text" class="form-control" value="{{$equipo->nombre}}">
			</div>
			<div class="col-md-3">
				<label for="" class="control-label">Estatus</label>
				<select class="form-control">
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
				<input type="text" class="form-control" value="{{$equipo->empleado}}">
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-3">
				<label for="" class="control-label">Marca</label>
				<select class="form-control">
				  <option @if($equipo->marca == '') {{ 'selected' }} @endif value="">-marca-</option>
				  <option @if($equipo->marca == 'Dell') {{ 'selected' }} @endif value="Dell">Dell</option>
				  <option @if($equipo->marca == 'HP') {{ 'selected' }} @endif value="HP">HP</option>
				  <option @if($equipo->marca == 'Lanix') {{ 'selected' }} @endif value="Lanix">Lanix</option>
				  <option @if($equipo->marca == 'Acer') {{ 'selected' }} @endif value="Acer">Acer</option>
				  <option @if($equipo->marca == 'Lenovo') {{ 'selected' }} @endif value="Lenovo">Lenovo</option>
				  <option @if($equipo->marca == 'Sony') {{ 'selected' }} @endif value="Sony">Sony</option>
				</select>
			</div>
			<div class="col-md-3">
			<label for="" class="control-label">Memoria RAM:</label>
				<div class="input-group">
					<input type="number" class="form-control" value="{{$equipo->memoria}}">
					<span class="input-group-addon">GB</span>
				</div>
			</div>
			<div class="col-md-3">
				<label for="" class="control-label">SAP Instalado:</label>
				<select class="form-control">
					<option @if($equipo->sap_instalado == "") {{ 'selected' }} @endif value="">-Sap Instalado-</option>
					<option @if($equipo->sap_instalado == 1) {{ 'selected' }} @endif value="1">Si</option>
					<option @if($equipo->sap_instalado == 2) {{ 'selected' }} @endif value="2">No</option>
				</select>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-3">
				<label for="" class="control-label">Modelo</label>
				<input type="text" class="form-control" value="{{$equipo->modelo}}">
			</div>
			<div class="col-md-3">
				<label for="" class="control-label">Procesador:</label>
				<input type="text" class="form-control" value="{{$equipo->procesador}}">
			</div>
			<div class="col-md-3">
				<label for="" class="control-label">Nº de serie CPU:</label>
				<input type="text" class="form-control" value="{{$equipo->serie}}">
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-3">
				<label for="" class="control-label">Fecha de compra</label>
				<input type="date" class="form-control" value="{{ explode(" ", $equipo->fecha_compra)[0] }}">
			</div>
			<div class="col-md-3">
				<label for="" class="control-label">Fecha de instalación</label>
				<input type="date" class="form-control" value="{{ explode(" ", $equipo->fecha_instalacion)[0] }}">
			</div>
			<div class="col-md-3">
				<label for="" class="control-label">Precio:</label>
				<div class="input-group">
					<span class="input-group-addon">$</span>
					<input type="text" class="form-control" value="{{$equipo->precio}}" />
				</div>
			</div>
			
		</div><br>
		<div class="row">
			
			<div class="col-md-9">
				<label for="" class="control-label">Características adicionales</label>
				<textarea class="form-control" rows="5">{{$equipo->caracteristica}}</textarea>
			</div>
		</div> <br>
		<div class="row">
			<div class="col-md-12">
				<a href="/administrador" class="btn btn-warning">Regresar</a>
			</div>
		</div>
	</div>
</div>
@stop