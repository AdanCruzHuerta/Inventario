<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    protected $table = 'accesorio';
    protected $fillable = ['nombre', 'marca', 'modelo', 'serie', 'precio', 'caracteristicas', 'estatus', 'fecha_instalacion', 'fecha_compra', 'equipo_id'];
    public $timestamps = false;
}
