@extends('layouts.admin')
@section('content')

<div class="container">
	<h2 class="titulos">Historial de Mantenimientos de Impresoras</h2>
	<div class="row">

		<div class="col-md-3">
			<label for="">Selecciona la impresora</label>
			<select class="form-control" name="Departamento_id">
              {{-- <option value="#">-Impresora-</option>
              @foreach($impresoras as $impresora)
              <option value="{{$impresora->id}}">{{$impresora->nombre}}</option>
              @endforeach --}}
            </select>
		</div>
		<div class="table-responsive col-md-3">

        	<br><a class="btn btn-info col-md-offset-4" href="/administrador/mantenimientoi/alta_mantenimientoi">Nuevo Mantenimiento</a>
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