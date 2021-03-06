<?php 
/**
* Repositorio del modelo Accesorio
*/
namespace App\Repositories;

class Accesorio 
{
	static function all()
	{
		return \DB::table('accesorio')
			->leftJoin('equipo', 'accesorio.equipo_id', '=', 'equipo.id')
			->select('accesorio.id', 'accesorio.nombre', 'accesorio.marca', 'accesorio.precio', 'accesorio.estatus', 'equipo.nombre as equipo')
			->get();
	}	
	static function getAccesorio($id)
	{
		return \DB::table('accesorio')
			->leftJoin('equipo', 'accesorio.equipo_id', '=', 'equipo.id')
			->where('accesorio.id', '=', $id)
			->select('accesorio.*', 'equipo.nombre as equipo')
			->first();
	}
}