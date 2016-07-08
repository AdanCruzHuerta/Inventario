<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = 'mantenimiento';
    protected $fillable = ['nombre', 'estatus', 'fecha_mantenimiento', 'descripcion', 'impresora_id', 'Equipo_id', 'accesorio_id'];
    public $timestamps = false;
}
