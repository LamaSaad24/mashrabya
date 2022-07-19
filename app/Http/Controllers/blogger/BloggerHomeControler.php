<?php

namespace App\Http\Controllers\blogger;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BloggerHomeControler extends Controller
{

    public function index (){
        $userId = auth('blogger')->user()->id;
        $data['blog'] = DB::select("SELECT count(*) as count FROM `blogs`  where blogger_id='$userId' and active=1");
        return view('blogger.home.index')->with($data);
    }

    public function login (){

        return view('blogger.login.login');
    }
}
