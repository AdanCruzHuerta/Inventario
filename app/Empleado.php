<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
   public $timestamps = false;
   protected $table = "empleado";
   protected $fillable = ['nombre', 'Departamento_id'];
}
