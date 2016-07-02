<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Departamento;
class DepartamentoController extends Controller
{
    public function index()
    {
    	return view('admin.departamento', ['departamentos' => Departamento::orderBy('nombre')->get()]);
    }
    public function store(Request $request)
    {
    	$departamento = Departamento::create($request->all());
    	if($departamento) {
    		return back()->with('success', true);
    	}
    	return back()->with('error', true);
    }
}
