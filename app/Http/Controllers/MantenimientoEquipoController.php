<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Equipo;
use App\Mantenimiento;
use App\Repositories\Mantenimiento as RepositoryMantenimiento;

class MantenimientoEquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::orderBy('nombre')->get();
        return view('admin.mantenimiento_equipo', compact('equipos'));
    }
    public function create()
    {
        return view('admin.alta_mantenimiento_equipo', ['equipos'=>Equipo::orderBy('nombre')->get()]);
    }
    public function store(Request $request)
    {
        $mantenimiento = Mantenimiento::create($request->all());
        if ($mantenimiento) {
            return back()->with('success', true);
        }
        return back()->with('error', true);
    }
    public function edit($id)
    {
        $mantenimiento = Mantenimiento::find($id);
        $equipos = Equipo::orderBy('nombre')->get();
        return view('admin.editar_mantenimiento_equipo', compact('mantenimiento', 'equipos'));
    }
    public function update(Request $request)
    {
        $mantenimiento = Mantenimiento::find($request->id);
        $mantenimiento->fill($request->all());
        if ($mantenimiento->save()) {
            return back()->with('success', true);
        }
        return back()->with('error', true);
    }
    public function destroy(Request $request)
    {
        $mantenimiento = Mantenimiento::find($request->id);
        $mantenimiento->delete();
        return back();
    }
    public function getMantenimientosEquipo(Request $request)
    {
        return RepositoryMantenimiento::getMantenimientosEquipo($request->id);
    }
}