<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function store(Request $request)
    {
    	 if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/administrador');
        }
        return back();
    }
    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }
}
