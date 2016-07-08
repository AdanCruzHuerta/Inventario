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
	        	<br><a class="btn btn-info col-md-offset-2" href="/administrador/mantenimiento_equipo/alta_mantenimiento_equipo">Nuevo Mantenimiento</a>
	    	</div>
		</div> <br>
		<div class="row">
			<div class="col-md-10">
				<table class="table table-striped" v-if="!mensaje">
					<thead>
						<tr>
							<th>Nombre</th>
		                    <th>Fecha de mantenimiento</th>
		                    <th>Tipo de mantenimiento</th>
		                    <th>Descripción</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="mantenimiento in mantenimientos">
							<td>@{{mantenimiento.nombre}}</td>
							<td>@{{mantenimiento.fecha_mantenimiento}}</td>
							<td v-if="mantenimiento.estatus == 1">@{{'Preventivo'}}</td>
							<td v-else>@{{'Correctivo'}}</td>
							<td>@{{mantenimiento.descripcion}}</td>
						</tr>
					</tbody>
				</table>
				<div class="alert alert-info" v-if="mensaje">
					<center>Actualmente no presenta ningun mantenimiento.</center>
				</div>
				{{--<table id="example" class="display" cellspacing="0" width="100%">
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
		           </tbody>
		        </table>--}}
			</div>
		</div>
	</div>
@stop
@section('scripts')
<script>
	Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
	new Vue({
		el: "#app",
		data: {
			equipo: "",
			mantenimientos: [],
			mensaje: false
		},
		watch: {
		    equipo: function(value) {
		    	this.get_mantenimientos_equipo(value);
		    }
		},
		methods: {
			get_mantenimientos_equipo: function(value) {
				this.$http.get('/administrador/mantenimiento_equipo/get_mantenimientos_equipo', {id: value}).then(function(response){
		        	if(response.data.length <= 0){
		        		this.mensaje = true;
		        		this.mantenimientos = [];
		        	} else {
		        		this.mensaje = false;
		        		this.mantenimientos = [];
		        		this.$set('mantenimientos', response.data);
		        	}
		        })
			}
		}
	})
</script>
@stop