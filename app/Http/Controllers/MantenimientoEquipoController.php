<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Equipo;

class MantenimientoEquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::orderBy('nombre')->get();
        return view('admin.mantenimiento_equipo', compact('equipos'));
    }
    public function create()
    {
        
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}