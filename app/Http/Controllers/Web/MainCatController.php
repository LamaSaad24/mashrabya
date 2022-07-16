<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\MainCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainCatController extends Controller
{
    //
    public function show ($id){

        MainCat::findOrFail($id);
        
        $data['mainCats']  = DB::select('select * from main_cats where id =" '.$id.'"');

        $data['subCats']  = DB::select('SELECT id, name,(select COUNT(*) from blogs where blogs.sub_cat_id = sub_cats.id) as total FROM sub_cats where main_cat_id=" '.$id.'" and sub_cats.active=1');
        $data['blogs']  = DB::select('SELECT DISTINCT blogs.id, blogs.title, sub_cats.name as cat, users.name as userName, blogs.image,blogs.image_meta, blogs.created_at from blogs   JOIN users ON users.id= blogs.user_id JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id JOIN main_cats ON sub_cats.main_cat_id=" '.$id.'" where blogs.active=1');
        $data['lastBlogs']  = DB::select('SELECT DISTINCT blogs.id, blogs.title,  users.name as userName, blogs.image,blogs.image_meta, blogs.created_at from blogs JOIN users ON users.id= blogs.user_id JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id JOIN main_cats ON sub_cats.main_cat_id=" '.$id.'"  where blogs.active=1 ORDER BY blogs.created_at DESC LIMIT 4');

        return view('web.type.type')->with($data);
    }
}
