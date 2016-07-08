<?php 
/**
* Repositorio de modelo Mantenimiento
*/
namespace App\Repositories;

use App\Mantenimiento;

class Mantenimiento
{
	static function getMantenimientosEquipo($id)
	{
		return \DB::table('mantenimiento')
			->where('mantenimiento.Equipo_id', '=', $id)
			->get();
	}
}