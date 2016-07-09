<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    protected $table = 'impresora';
    protected $fillable = ['nombre', 'marca', 'modelo', 'serie', 'precio', 'caracteristica', 'estatus', 'tipo', 'fecha_instalacion', 'fecha_compra'];
   	public $timestamps = false;
}
