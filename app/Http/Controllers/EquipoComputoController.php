<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Empleado;
use App\Equipo;
use App\Repositories\Equipo as RepositoryEquipo;

class EquipoComputoController extends Controller
{
    public function index()
    {
    	return view('admin.equipo', ['equipos'=>RepositoryEquipo::all()]);
    }
    public function create()
    {
    	$empleados = Empleado::orderBy('nombre')->get();
    	return view('admin.alta_equipo', compact('empleados'));
    }
    public function store(Request $request)
    {
    	$equipo = Equipo::create($request->all());
    	if($equipo){
    		return back()->with('success', true);
    	}
    	return back()->with('error', true); 
    }
}
