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
    public function getMantenimientosAccesorio(Request $request)
    {
    	return RepositoryMantenimiento::getMantenimientosAccesorio($request->id);
    }
}
