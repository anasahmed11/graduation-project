<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    use AuthenticatesUsers;
    public function index()
    {
        $user = Auth::user();
        if($user->type=='p'){
            return redirect('/finddoctor');
        }elseif($user->type=='d'){
            return redirect('/profile') ;
        }elseif($user->type=='a'){
            return redirect('/admin') ;
        }
    }
}
