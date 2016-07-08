<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Equipo;
use App\Accesorio;
use App\Repositories\Accesorio as RepositoryAccesorio;

class AccesoriosController extends Controller
{
    public function index()
    {
    	return view('admin.accesorio', ['accesorios' => RepositoryAccesorio::all()]);
    }
    public function create()
    {
    	return view('admin.alta_accesorio', ['equipos'=>Equipo::orderBy('nombre')->get()]);
    }
    public function store(Request $request)
    {
    	$accesorio = Accesorio::create($request->all());
    	if($accesorio){
    		return back()->with('success', true);
    	}
    	return back()->with('error', true);
    }
    public function show($id)
    {
        return view('admin.detalle_accesorio', ['accesorio' => RepositoryAccesorio::getAccesorio($id)]);
    }
    public function edit($id)
    {
        $equipos = Equipo::orderBy('nombre')->get();
        $accesorio = Accesorio::find($id);
        return view('admin.editar_accesorio', compact('equipos', 'accesorio')); 
    }
    public function update(Request $request)
    {
        $accesorio = Accesorio::find($request->id);
        $accesorio->fill($request->all());
        if($accesorio->save()){
            return back()->with('success', true);
        }
        return back()->with('error', true);
    }
    public function destroy(Request $request)
    {
        $accesorio = Accesorio::find($request->id);
        $accesorio->delete();
        return back();
    }
}
