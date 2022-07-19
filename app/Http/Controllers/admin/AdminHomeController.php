<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    //show some statistics in home page
    public function show(){
        $data['blog'] = DB::select('SELECT count(*) as count FROM `blogs`  where active=1');
        $data['main'] = DB::select('SELECT count(*) as count FROM `main_cats` where active=1');
        $data['sub'] = DB::select('SELECT count(*) as count FROM `sub_cats` where active=1');
        $data['user'] = DB::select('SELECT count(*) as count FROM `users` where active=1');

        return view('admin.home.index')->with($data);
    }
}
