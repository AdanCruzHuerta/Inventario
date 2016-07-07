<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\{Departamento,Empleado};
use App\Repositories\Empleado as EmpleadoRepository;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = EmpleadoRepository::all();
        $departamentos = Departamento::orderBy('nombre')->get();
        return view('admin.empleado', compact('empleados', 'departamentos'));
    }
    public function store(Request $request)
    {
        $empleado = Empleado::create($request->all());
        if($empleado) {
            return back()->with('success', true);
        }
        return back()->with('error', true);
    }
    public function update(Request $request)
    {
        $empleado = Empleado::find($request->id);
        $empleado->fill($request->all());
        $empleado->save();
        return back()->with('success_update', true);
    }
    public function destroy(Request $request)
    {
        // obtener el equipo que tiene asignado el usuario
        $equipo = EmpleadoRepository::getEquipo($request->id);
        // si tiene equipo eliinamos la relacion
        if(is_object($equipo)){
            $equipo->Empleado_id = null;
            $equipo->save();
        }
        //eliminamos al empleado
        $equipo = Empleado::find($request->id);
        $equipo->delete();
        return back();
    }
}