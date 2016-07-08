<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Impresora;
use App\Mantenimiento;
use App\Repositories\Mantenimiento as RepositoryMantenimiento;

class MantenimientoImpresoraController extends Controller
{
    public function index()
    {
        $impresoras = Impresora::orderBy('nombre')->get();
        return view('admin.mantenimiento_impresora', compact('impresoras'));
    }
    public function create()
    {
        return view('admin.alta_matenimiento_impresora', ['impresoras'=> Impresora::orderBy('nombre')->get()]);
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
        $impresoras = Impresora::orderBy('nombre')->get();
        return view('admin.editar_mantenimiento_impresora', compact('mantenimiento', 'impresoras'));
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
    public function getMantenimientosImpresora(Request $request)
    {
        return RepositoryMantenimiento::getMantenimientosImpresora($request->id);
    }
}
