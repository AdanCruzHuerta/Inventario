@extends('layouts.admin')
@section('content')
	<style>.list-group-item{padding-bottom: 20px;}</style>
	<div class="row">
	    <div class="col-md-12"><h2 class="titulos">Lista de departamentos</h2></div>
	</div>
	<div class="row">
	    <div class="table-responsive col-md-10">
	        @if(session()->has('success'))
	            <div class="alert alert-success">Genial!. El departamento fue creado correctamente.</div>
	        @elseif(session()->has('error'))
	            <div class="alert alert-danger">Error!. No se pudo crear al departamento.</div>
	        @endif
	        <ul class="list-group">
	        	@if(count($departamentos) > 0)
		            @foreach($departamentos as $departamento)
		                <li class="list-group-item">
		                	{{ $departamento->nombre }}
							<button class="btn btn-danger pull-right delete_departamento" data-id="{{$departamento->id}}" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash" aria-hidden="true"></i></button>
		                </li>
		            @endforeach
		        @else
					<li class="list-group-item">
						<i class="fa fa-info-circle" aria-hidden="true"></i>
						No se ha registrado ningun departamento
					</li>
		        @endif
	        </ul>
	    </div>
	    <div class="table-responsive col-md-2">
	    	 <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm"><span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
	        @include('admin.modales.crear_departamento')
	        @include('admin.modales.eliminar_departamento')
	    </div>
	</div>
@stop
@section('scripts')
	<script>
		$(function(){
			$(".delete_departamento").click(function(){
				$("#id_departamento_delete").val($(this).attr("data-id"));
			})
		})
	</script>
@stop