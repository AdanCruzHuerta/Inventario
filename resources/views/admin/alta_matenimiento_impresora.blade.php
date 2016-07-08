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
            <div class="alert alert-success">Genial!. Mantenimiento registrado correctamente.</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">Error!. No se pudo registrar el mantenimiento.</div>
        @endif
        <form action="/administrador/mantenimiento_impresora" class="" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-10">
            <div class="row filas">
              <div class="col-md-6">
                <label for="" class="control-label" >Nombre (manteniento)</label>
                <input type="text" class="form-control" placeholder="Ej: Impresora-Ventas" name="nombre" required>
              </div>
              <div class="col-md-6">
                <label for="" class="control-label">Estatus</label>
                <select class="form-control" name="estatus" required>
                  <option value="">-estatus-</option>
                    <option value="1">Preventivo</option>
                    <option value="2">Correctivo</option>
                </select>
              </div>
            </div>
            <div class="row filas">
              <div class="col-md-6">
                <label for="" class="control-label">Fecha de mantenimiento</label>
                <input type="date" class="form-control" name="fecha_mantenimiento" required>
              </div>
              <div class="col-md-6">
                <label for="" class="control-label">Impresora</label>
                <select name="impresora_id" required class="form-control">
                  <option value="">-Impresora-</option>
                  @foreach($impresoras as $impresora)
                  <option value="{{$impresora->id}}">{{$impresora->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row filas">
              <div class="col-xs-12">
                <label for="" class="control-label">Descripción de mantenimiento</label>
                <textarea class="form-control" rows="2" placeholder="Ej: Formateo y limpieza de equipo de computo" name="descripcion"></textarea>
              </div>
            </div>
            <div class="row filas">
              <div class="col-xs-12">
                <a href="/administrador/mantenimiento_impresora" class="btn btn-default">Regresar</a>
                <input type="submit" class="btn btn-primary pull-right" value="Registrar">
              </div>
            </div>
          </div>
        </div>
      </form>
  </div>
</div>
@stop