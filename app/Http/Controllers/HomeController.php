<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //controllers r database er connection make by the use of model

use Auth; //for who is logged in now...




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_the_user = User::all(); //database ta jehetu model theke asche, tai model theke shob data nia aste hocche. r laravel query holo "User::all()"
        return view('home', compact('all_the_user')); //via compact home e data k array size e send kora holo
    }
}
