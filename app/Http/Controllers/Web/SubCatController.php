<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\SubCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCatController extends Controller
{
    public function show ($id){

        SubCat::findOrFail($id);

        $data['blogs']  = DB::select('SELECT DISTINCT blogs.id, blogs.title, sub_cats.name as subCat, main_cats.name as mainCat, main_cats.id as mainCatId, users.name as userName, blogs.image,blogs.image_meta, blogs.created_at from blogs JOIN users ON users.id= blogs.user_id JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id JOIN main_cats ON sub_cats.main_cat_id= main_cats.id where blogs.sub_cat_id=" '.$id.'" and blogs.active=1');
        $data['lastBlogs']  = DB::select('SELECT DISTINCT blogs.id, blogs.title,  users.name as userName, blogs.image,blogs.image_meta, blogs.created_at from blogs JOIN users ON users.id= blogs.user_id JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id JOIN main_cats ON sub_cats.main_cat_id= main_cats.id where blogs.sub_cat_id=" '.$id.'" and blogs.active=1 ORDER BY blogs.created_at DESC LIMIT 4');
        $data['subCat'] = DB::select('select name,keywords_meta, description_meta from sub_cats where id=" '.$id.'"');

        return view('web.type.subType')->with($data);
    }
}
