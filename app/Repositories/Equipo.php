<?php 
/**
* Repositorio de Modelo Equipo
*/
namespace App\Repositories;
class Equipo
{
	static function all(){
		return \DB::table('equipo')
			->join('empleado', 'equipo.Empleado_id', '=', 'empleado.id')
			->join('departamento', 'empleado.Departamento_id', '=', 'departamento.id')
			->select('equipo.id', 'equipo.nombre', 'equipo.marca', 'equipo.precio', 'equipo.estatus', 'departamento.nombre as departamento')
			->get();
	}
	static function detalle($id)
	{
		return \DB::table('equipo')
			->join('empleado', 'equipo.Empleado_id', '=', 'empleado.id')
			->where('equipo.id', '=', $id)
			->select('equipo.*', 'empleado.nombre as empleado')
			->first();
	}
}