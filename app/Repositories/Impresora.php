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
	static function setDepartamentos($request, $impresora)
	{
		foreach($request->departamentos_id as $departamento) {
			\DB::table('departamento_has_impresora')->insert([
				'departamento_id' => $departamento,
				'impresora_id' => $impresora->id
			]);
		}
		return true;
	}
	static function setUpdateDepartamentos($request, $impresora) 
	{
		\DB::table('departamento_has_impresora')->where('impresora_id', '=', $impresora->id)->delete();
		if($request->has('departamentos_id')){
			foreach($request->departamentos_id as $departamento) {
				\DB::table('departamento_has_impresora')->insert([
					'departamento_id' => $departamento,
					'impresora_id' => $impresora->id
				]);
			}
		}
		return true;
	}
}