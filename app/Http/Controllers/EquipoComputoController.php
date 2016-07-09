<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Empleado;
use App\Equipo;
use App\Accesorio;
use App\Repositories\Equipo as RepositoryEquipo;

class EquipoComputoController extends Controller
{
    public function index()
    {
    	return view('admin.equipo', ['equipos'=>RepositoryEquipo::all()]);
    }
    public function create()
    {
    	return view('admin.alta_equipo', ['empleados'=>Empleado::orderBy('nombre')->get()]);
    }
    public function store(Request $request)
    {
    	$equipo = Equipo::create($request->all());
    	if($equipo){
    		return back()->with('success', true);
    	}
    	return back()->with('error', true); 
    }
    public function show($id)
    {
        return view('admin.detalle_equipo', [ 'equipo' => RepositoryEquipo::detalle($id)]);
    }
    public function edit($id)
    {
        $empleados = Empleado::orderBy('nombre')->get();
        $equipo = Equipo::find($id);
        return view('admin.editar_equipo', compact('empleados', 'equipo'));
    }
    public function update(Request $request)
    {
        $equipo = Equipo::find($request->id);
        $equipo->fill($request->all());
        if($equipo->save()){
            return back()->with('success', true);
        }
        return back()->with('error', true);
    }
    public function destroy(Request $request)
    {
        $accesorios = Accesorio::where('equipo_id', '=', $request->id)->get();
        if(count($accesorios) > 0) {
            foreach($accesorios as $accesorio) {
                $accesorio->equipo_id = null;
            }
        }
        $equipo = Equipo::find($request->id);
        $equipo->delete();
        return back();
    }
}