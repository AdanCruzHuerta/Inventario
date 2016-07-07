<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\{Equipo,Accesorio};
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
}
