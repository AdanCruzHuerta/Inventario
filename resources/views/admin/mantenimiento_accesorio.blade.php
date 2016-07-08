@extends('layouts.admin')
@section('content')
	<div id="app">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="titulos">Historial de Mantenimientos de Accesorios</h2>		
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<label for="">Selecciona el Accesorio</label>
				<select class="form-control" name="accesorio_id" v-model="accesorio">
	            	<option value="">-Accesorio-</option>
	            	@foreach($accesorios as $accesorio)
	            	<option value="{{$accesorio->id}}">{{$accesorio->nombre}}</option>
	            	@endforeach
	            </select>
			</div>
			<div class="table-responsive col-md-3">
	        	<br><a class="btn btn-info col-md-offset-2" href="/administrador/mantenimiento_accesorio/alta_mantenimiento_accesorio">Nuevo Mantenimiento</a>
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
			accesorio: "",
			mantenimientos: [],
			mensaje: false
		},
		watch: {
		    accesorio: function(value) {
		    	this.get_mantenimientos_equipo(value);
		    }
		},
		methods: {
			get_mantenimientos_equipo: function(value) {
				this.$http.get('/administrador/mantenimiento_equipo/get_mantenimientos_accesorio', {id: value}).then(function(response){
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