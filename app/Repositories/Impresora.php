<?php 
/**
* Repositorio de model Impresora
*/
namespace App\Repositories;

class Impresora 
{
	static function all()
	{
		return \DB::table('impresora')
			->leftJoin('mantenimiento', 'impresora.id', '=', 'mantenimiento.impresora_id')
			->select('impresora.id', 'impresora.nombre', 'impresora.marca', 'impresora.precio', 'impresora.estatus', 'mantenimiento.fecha_mantenimiento')
			->get();
	}
}