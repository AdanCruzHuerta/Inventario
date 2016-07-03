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
    	$impresoras = RepositoryImpresora::all();
    	return view('admin.impresora', compact('impresoras'));
    }
    public function create()
    {
    	return view('admin.alta_impresora', ['departamentos'=>Departamento::orderBy('nombre')->get()]);
    }
    public function store(Request $request)
    {
    	$impresora = Impresora::create($request->all());
    	if ($impresora) {
			return back()->with('success', true);   		
    	}
    	return back()->with('error', true);
    }
}
