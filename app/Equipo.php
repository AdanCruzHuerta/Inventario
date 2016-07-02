<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipo';
    protected $fillable = ['nombre', 'estatus', 'Empleado_id', 'marca', 'memoria', 'sap_instalado', 'modelo', 'procesador', 'serie', 'fecha_compra', 'fecha_instalacion', 'fecha_ultimo_mantenimiento', 'precio', 'caracteristica'];
   	public $timestamps = false;
}
