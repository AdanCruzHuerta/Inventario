<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Repositories\Departamento as RepositoryDepartamento;

class DepartamentoController extends Controller
{
    public function index()
    {
    	return view('admin.departamento', ['departamentos' => Departamento::orderBy('nombre')->get()]);
    }
    public function store(Request $request)
    {
    	$departamento = Departamento::create($request->all());
    	if($departamento) {
    		return back()->with('success', true);
    	}
    	return back()->with('error', true);
    }
    public function destroy(Request $request)
    {
        // obtener a los empleados que pertenecen a este departamento
        $empleados = RepositoryDepartamento::getEmpleados($request->id);
        // si existen empleados eliminar la relacion con departamento asignando null
        if(count($empleados) > 0) {
            foreach($empleados as $empleado){
                $empleado->Departamento_id = null;
                $empleado->save();
            }
        }
        // eliminar el departamento
        $departamento = Departamento::find($request->id);
        $departamento->delete();
        return back();
    }
}