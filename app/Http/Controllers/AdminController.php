<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Faker\Provider\Lorem;

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
        return view('Admin.dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
