<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        //$users =  User::orderBy('id','desc')->get();
        //$users =  User::latest()->get();
        $users =  User::latest()->simplePaginate(3);
        $total_users =  User::count();

//Class::function// Object/function->function
        // return view('home',compact('users','total_users'));
        return view('home',[
            'users'=>$users,
            'total_users'=>$total_users
        ]);

    }
}
