@extends('layouts.admin')
@section('content')
<div class="container">
	<h2 class="titulos">Historial de Mantenimientos de Equipos de Computo</h2>
	<div class="row">

		<div class="col-md-3">
			<label for="">Selecciona el equipo de computo</label>
			<select class="form-control" name="estatus" required>
				<option value="">Selecciona el equipo de computo</option>
				<option value="1">Asignada</option>
				<option value="2">No funciona</option>
				<option value="3">Partes</option>
				<option value="5">En garantia</option>
				<option value="4">En reparación</option>
				<option value="6">Baja</option>
				<option value="7">Almacenada</option>
			</select>
		</div>
		<div class="table-responsive col-md-3">

        	<br><a class="btn btn-info col-md-offset-2" href="/administrador/mantenimientoi/alta_mantenimientoi">Nuevo Equipo de computo</a>
    	</div>
	</div>
	<div class="row">
		<div class="col-md-10">
			<table id="example" class="display" cellspacing="0" width="100%">
	            <thead>
	                <tr>
	                    <th>Nombre</th>
	                    <th>Marca</th>
	                    <th>Precio</th>
	                    <th>Estatus</th>
	                    <th>Manten.</th>
	                    <th>Acciones</th>
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
	                    <th>Nombre</th>
	                    <th>Marca</th>
	                    <th>Precio</th>
	                    <th>Estatus</th>
	                    <th>Manten.</th>
	                    <th>Acciones</th>
	                </tr>
	            </tfoot>
	            <tbody>
		</div>
	</div><br><br>
</div>
	


@stop