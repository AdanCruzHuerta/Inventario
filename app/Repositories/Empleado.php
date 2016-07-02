<?php 
/**
* 	Repositorio de el Modelo Empleado
*/
namespace App\Repositories;

class Empleado
{
	static function all()
	{
		return \DB::table('empleado')
            ->leftJoin('departamento', 'empleado.Departamento_id', '=', 'departamento.id')
            ->leftJoin('equipo', 'empleado.id', '=', 'equipo.Empleado_id')
            ->select('empleado.id', 'empleado.nombre', 'departamento.nombre as departamento', 'equipo.nombre as equipo')
            ->get();
	}
}