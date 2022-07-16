<?php

namespace App\Http\Controllers\blogger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BloggerHomeControler extends Controller
{
    public function index (){
        
        return view('blogger.home.index');
    }

    public function login (){

        return view('blogger.login.login');
    }
}
