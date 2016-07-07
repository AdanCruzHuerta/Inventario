<?php 
/**
* 	Repositorio de el Modelo Empleado
*/
namespace App\Repositories;

use App\Equipo;

class Empleado
{
	static function all()
	{
		return \DB::table('empleado')
            ->leftJoin('departamento', 'empleado.Departamento_id', '=', 'departamento.id')
            ->leftJoin('equipo', 'empleado.id', '=', 'equipo.Empleado_id')
            ->select('empleado.id', 'empleado.nombre', 'departamento.id as id_departamento', 'departamento.nombre as departamento', 'equipo.nombre as equipo')
            ->get();
	}
	static function getEquipo($id)
	{
		return Equipo::where('Empleado_id', '=', $id)->first();
	}
}