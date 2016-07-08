<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Accesorio;
use App\Mantenimiento;
use App\Repositories\Mantenimiento as RepositoryMantenimiento;

class MantenimientoAccesorioController extends Controller
{
    public function index()
    {
    	return view('admin.mantenimiento_accesorio', ['accesorios'=>Accesorio::orderBy('nombre')->get()]);
    }
    public function create()
    {
    	return view('admin.alta_mantenimiento_accesorio', ['accesorios'=>Accesorio::orderBy('nombre')->get()]);
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
        $accesorios = Accesorio::orderBy('nombre')->get();
        return view('admin.editar_mantenimiento_accesorio', compact('mantenimiento', 'accesorios'));
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
    public function getMantenimientosAccesorio(Request $request)
    {
    	return RepositoryMantenimiento::getMantenimientosAccesorio($request->id);
    }
}
