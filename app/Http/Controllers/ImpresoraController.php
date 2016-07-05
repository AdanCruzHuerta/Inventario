<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Impresora;
use App\Departamento;
use App\Repositories\Impresora as RepositoryImpresora;

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
        //return view('admin.');
    }
}
