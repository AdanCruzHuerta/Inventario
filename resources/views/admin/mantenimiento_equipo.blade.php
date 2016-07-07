@extends('layouts.admin')
@section('content')
	<div id="app">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="titulos">Historial de Mantenimientos de Equipos de Computo</h2>		
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<label for="">Selecciona el Equipo de Computo</label>
				<select class="form-control" name="Equipo_id" v-model="equipo">
	            	<option value="">-Equipo de Computo-</option>
	            	@foreach($equipos as $equipo)
	            	<option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
	            	@endforeach
	            </select>
			</div>
			<div class="table-responsive col-md-3">
	        	<br><a class="btn btn-info col-md-offset-2" href="/administrador/alta_mantenimiento_equipo">Nuevo Mantenimiento</a>
	    	</div>
		</div> <br>
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
		</div>
	</div>
@stop
@section('scripts')
<script>
	new Vue({
		el: "#app",
		data: {
			equipo: ""
		},
		computed: function(){
			
		},
		methods: {

		}
	})
</script>
@stop