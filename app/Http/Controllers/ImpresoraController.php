<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\{Impresora, Departamento};
use App\Repositories\{Impresora as RepositoryImpresora, Departamento as RepositoryDepartamento};

class ImpresoraController extends Controller
{
    public function index()
    {
    	return view('admin.impresora', ['impresoras' => RepositoryImpresora::all()]);
    }
    public function create()
    {
    	return view('admin.alta_impresora', ['departamentos' => Departamento::orderBy('nombre')->get()]);
    }
    public function store(Request $request)
    {
    	$impresora = Impresora::create($request->all());
    	if ($impresora) {
            if(count($request->departamentos_id) > 0) {
                RepositoryImpresora::setDepartamentos($request, $impresora);
            }
			return back()->with('success', true);   		
    	}
    	return back()->with('error', true);
    }
    public function show($id)
    {
        $impresora = Impresora::find($id);
        $departamentos = RepositoryDepartamento::getImpresoras($id);
        return view('admin.detalle_impresora', compact('impresora', 'departamentos'));
    }
    public function edit($id)
    {
        $impresora = Impresora::find($id);
        $impresora_departamento = RepositoryDepartamento::getImpresoras($id);
        $departamentos = Departamento::orderBy('nombre')->get();
        return view('admin.editar_impresora', compact('impresora', 'departamentos', 'impresora_departamento'));
    }
    public function update(Request $request)
    {
        $impresora = Impresora::find($request->id);
        $impresora->fill($request->all());
        if($impresora->save()){
            if(count($request->departamentos_id) >= 0) {
                RepositoryImpresora::setUpdateDepartamentos($request, $impresora);
            }
            return back()->with('success', true);
        }
        return back()->with('error', true);
    }
    public function destroy(Request $request)
    {
        $impresora = Impresora::find($request->id);
        $impresora->delete();
        return back();
    }
}