@extends('layouts.admin')
@section('content')
<style>.filas{margin-top: 20px;}</style>
<div class="row">
	<div class="col-xs-12">
		<h2 class="pull-left titulos">Registrar Mantenimiento de Equipo de Computo</h2>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		@if(session()->has('success'))
            <div class="alert alert-success">Genial!. Mantenimiento actualizado correctamente.</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">Error!. No se pudo actualizar el mantenimiento.</div>
        @endif
        <form action="/administrador/mantenimiento_equipo/update" class="" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{$mantenimiento->id}}">
				<div class="row">
					<div class="col-md-10">
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label" >Nombre (mantenimiento)</label>
								<input type="text" class="form-control" placeholder="Ej: Impresora-Ventas" name="nombre" value="{{$mantenimiento->nombre}}" required>
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Estatus</label>
								<select class="form-control" name="estatus" required>
									<option @if($mantenimiento->estatus == "") {{ 'selected' }} @endif value="">-estatus-</option>
								  	<option @if($mantenimiento->estatus == 1) {{ 'selected' }} @endif value="1">Preventivo</option>
								  	<option @if($mantenimiento->estatus == 2) {{ 'selected' }} @endif value="2">Correctivo</option>
								</select>
							</div>
						</div>
						<div class="row filas">
							<div class="col-md-6">
								<label for="" class="control-label">Fecha de mantenimiento</label>
								<input type="date" class="form-control" name="fecha_mantenimiento" required value="{{$mantenimiento->fecha_mantenimiento}}">
							</div>
							<div class="col-md-6">
								<label for="" class="control-label">Equipo</label>
								<select name="Equipo_id" required class="form-control">
									<option value="">-Equipo-</option>
									@foreach($equipos as $equipo)
									<option @if($mantenimiento->Equipo_id == $equipo->id) {{ 'selected' }} @endif value="{{$equipo->id}}">{{$equipo->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row filas">
							<div class="col-xs-12">
								<label for="" class="control-label">Descripción de mantenimiento</label>
								<textarea class="form-control" rows="2" placeholder="Ej: Formateo y limpieza de equipo de computo" name="descripcion">{{$mantenimiento->descripcion}}</textarea>
							</div>
						</div>
						<div class="row filas">
							<div class="col-xs-12">
								<a href="/administrador/mantenimiento_equipo" class="btn btn-warning">Regresar</a>
								<input type="submit" class="btn btn-primary pull-right" value="Actualizar">
							</div>
						</div>
					</div>
				</div>
			</form>
	</div>
</div>
@stop