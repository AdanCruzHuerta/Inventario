<?php 
/**
* Repositorio de modelo Departamento
*/
namespace App\Repositories;

use App\Empleado;

class Departamento
{
	static function getImpresoras($id)
	{
		return \DB::table('departamento_has_impresora')
			->join('departamento', 'departamento_has_impresora.departamento_id', '=', 'departamento.id')
			->where('departamento_has_impresora.impresora_id', '=', $id)
			->select('departamento.id', 'departamento.nombre')
			->get();
	}
	static function getEmpleados($id)
	{
		return Empleado::where('Departamento_id', '=', $id)->get();
	}
}