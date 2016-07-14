@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<h2 class="pull-left titulos">Registrar Equipo de Computo</h2>
	</div>
</div>
<div id="app" class="row">
	<div class="col-xs-12">
		 @if(session()->has('success'))
            <div class="alert alert-success">Genial!. El equipo fue creado correctamente.</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">Error!. No se pudo crear el equipo.</div>
        @endif
		<form action="/administrador/equipocomputo/store" class="" method="POST">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-3">
					<label for="" class="control-label" >Nombre (ID):</label>
					<input type="text" class="form-control" placeholder="Ej: Ventas-PC" name="nombre" required>
				</div>
				<div class="col-md-3">
				<label for="" class="control-label">Estatus</label>
					<select class="form-control" name="estatus" v-model="estatus">
					   	<option value="">-estatus-</option>
					  	<option value="1">Asignado</option>
					  	{{--<option value="2">No funciona</option>
					  	<option value="3">Partes</option>
					  	<option value="5">En garantia</option>
					  	<option value="4">En reparación</option>
					  	<option value="6">Baja</option>--}}
					  	<option value="7">Almacenada</option>
					</select>
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">Empleado responsable:</label>
						<select class="form-control" name="Empleado_id" required v-bind:disabled="validaEmpleado">
						  <option value="">-nombre del empleado-</option>
						  @foreach($empleados as $empleado)
						  <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
						  @endforeach
						</select>	
				</div>
			</div><br>

			<div class="row">
				<div class="col-md-3">
					<label for="" class="control-label">Marca</label>
					<select class="form-control" name="marca">
					  <option value="#">-marca-</option>
						<optgroup label="Equipo de computo">
						  	<option value="Dell">Dell</option>
						  	<option value="HP">HP</option>
						  	<option value="Lanix">Lanix</option>
						  	<option value="Acer">Acer</option>
						  	<option value="Lenovo">Lenovo</option>
						  	<option value="Sony">Sony</option>
						  {{-- Hasta aqui habia marcas --}}
						 	<option value="BenQ">BenQ</option>
						 	<option value="Getaway">Getaway</option>
						 	<option value="Compaq">Compaq</option>
						 	<option value="Samsung">Samsung</option>
						 	<option value="Toshiba">Toshiba</option>
						 	<option value="LG">LG</option>
						 	<option value="GHIA">GHIA</option>
						 	<option value="Getaway">Getaway</option>
						 	<option value="e-machine">e-machine</option>
						<optgroup label="Impresoras">
						  	<option value="Epson">Epson</option>
						  	<option value="Lexmark">Lexmark</option>
						  	<option value="Brother">Brother</option>
						  	<option value="Xerox">Xerox</option>
						  	<option value="Kyocera">Kyocera</option>
						<optgroup label="Accesorios">
							<option value="Logitech">Logitech</option>
							<option value="Acteck">Acteck</option>
							<option value="Vorago">Vorago</option>
							<option value="Genius">Genius</option>
							<option value="Ecline">Ecline</option>
					</select>
				</div>
				<div class="col-md-3">
				<label for="" class="control-label">Memoria RAM:</label>
					<div class="input-group">
						<input type="number" class="form-control" placeholder="Ej.2" name="memoria">
						<span class="input-group-addon">GB</span>
					</div>
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">SAP Instalado:</label>
					<select class="form-control" name="sap_instalado">
						<option value="#">-SAP Instalado-</option>
						<option value="1">Si</option>
						<option value="2">No</option>
					</select>
				</div>
				
			</div><br>

			<div class="row">
				<div class="col-md-3">
					<label for="" class="control-label">Modelo</label>
					<input type="text" class="form-control" placeholder="Ej: Pavilion g4" name="modelo">
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">Procesador:</label>
					<input type="text" class="form-control" placeholder="Ej: Intel i3 a 2.3 GHZ" name="procesador">
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">Nº de serie CPU:</label>
					<input type="text" class="form-control" name="serie" placeholder="Ej: J66651A9J146851A">
				</div>
				
			</div><br>

			<div class="row">
				<div class="col-md-3">
					<label for="" class="control-label">Fecha de compra</label>
					<input type="date" class="form-control" name="fecha_compra">
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">Fecha de instalación</label>
					<input type="date" class="form-control" name="fecha_instalacion">
				</div>
				<div class="col-md-3">
					<label for="" class="control-label">Precio:</label>
					<div class="input-group">
					<span class="input-group-addon">$</span>
						<input type="text" class="form-control" name="precio" placeholder="No usar comas para los miles" required />
						
					</div>
				</div>
				
			</div><br>

			<div class="row">
				<div class="col-md-9">
					<label for="" class="control-label">Características adicionales</label>
					<textarea class="form-control" rows="5" placeholder="Ej: Computadora Semi-nueva color negra con algunos tallones en la base del CPU" name="caracteristica"></textarea>
				</div>
			</div><br>

			<div class="row">
				<div class="col-md-9">
					<a href="/administrador" class="btn btn-warning">Regresar</a>
					<input type="submit" value="Registrar" class="btn  btn-primary pull-right">
				</div>
			</div>
		</form>
	</div>	
</div>
@stop
@section('scripts')
<script>
	new Vue({
		el: "#app",
		data: {
			estatus: "",
			empleado: false
		},
		watch: {
			estatus: function(value){
				this.validaEstatus(value)
			}
		},
		computed: {
			validaEmpleado: function() {
				return this.empleado;
			}
		},
		methods: {
			validaEstatus: function(value) {
				if(value == 7) {
					this.empleado = true;
				} else {
					this.empleado = false;
				}
			}
		}
	})
</script>
@stop