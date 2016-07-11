@extends('layouts.admin')
@section('content')
	<style>
		.campo_opciones{
			width: 100px;
		}
	</style>
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
		                    <th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="mantenimiento in mantenimientos">
							<td>@{{mantenimiento.nombre}}</td>
							<td>@{{mantenimiento.fecha_mantenimiento}}</td>
							<td v-if="mantenimiento.estatus == 1">@{{'Preventivo'}}</td>
							<td v-else>@{{'Correctivo'}}</td>
							<td>@{{mantenimiento.descripcion}}</td>
							<td class="campo_opciones">
								<a href="/administrador/mantenimiento_accesorio/editar/@{{mantenimiento.id}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<button class="btn btn-danger" v-on:click="deleteMantenimiento(mantenimiento.id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="alert alert-info" v-if="mensaje">
					<center>Actualmente no presenta ningún mantenimiento.</center>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModal" role="dialog">
	      	<div class="modal-dialog modal-sm">
		        <!-- Modal content-->
		        <div class="modal-content">
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal">&times;</button>
		              <h4 class="modal-title">Borrar Equipo</h4>
		            </div>
		            <form action="/administrador/mantenimiento_accesorio/delete" method="POST">
		                {{ csrf_field() }}
		                <div class="modal-body">
		                  <p>¿Esta seguro que desea borrar este mantenimiento?</p>
		                  <input type="hidden" name="id" v-bind:value="delete_mantenimiento">
		                </div>
		                <div class="modal-footer">
		                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		                  <button type="submit" class="btn btn-danger">Borrar</button>
		                </div>
		            </form>
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
			mensaje: false,
			delete_mantenimiento: ""
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
			},
			deleteMantenimiento: function(id){
				this.delete_mantenimiento = id;
			}
		}
	})
</script>
@stop