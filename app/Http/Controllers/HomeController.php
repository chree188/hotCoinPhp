<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        print_r(Auth::user()->name);
        print_r(Auth::check());
        print_r(date('Y-m-d H:i:s'));
        return view('home');
    }

    public function setLoginStatus(){
        $user = Redis::get('BCACCOUNT_LOGIN_c20ad4d76fe97759aa27a0c99bff6710_F6AEB407B0FD40FEB3BB599BCF64EF30');

    }

}
