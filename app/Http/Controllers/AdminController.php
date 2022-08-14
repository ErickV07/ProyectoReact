<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Redirect;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (auth()->user()->tipo_usuario == "SuperAdmin") {
            return view('Admin.dashboard');
        } else {
            return view('Cliente.index');
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');

    }
}
