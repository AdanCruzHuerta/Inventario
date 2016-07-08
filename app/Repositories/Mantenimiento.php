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
	static function getMantenimientosImpresora($id)
	{
		return \DB::table('mantenimiento')
			->where('mantenimiento.impresora_id', '=', $id)
			->get();
	}
	static function getMantenimientosAccesorio($id)
	{
		return \DB::table('mantenimiento')
			->where('mantenimiento.accesorio_id', '=', $id)
			->get();
	}
}