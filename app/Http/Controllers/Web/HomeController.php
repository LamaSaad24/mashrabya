<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // show 
    public function index (){

        $data["mainCats"] = DB::select('SELECT distinct main_cats.id, main_cats.name, main_cats.image , main_cats.image_meta ,
        (select COUNT(*) from blogs JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id WHERE blogs.sub_cat_id=sub_cats.id AND sub_cats.main_cat_id= main_cats.id And blogs.active=1) as total 
        FROM main_cats
        JOIN sub_cats ON sub_cats.main_cat_id = main_cats.id
        WHERE main_cats.active=1');

        $data['seo'] = DB::select('SELECT title,keywords_meta,description_meta FROM `seos` WHERE `key` ="home" ');


        return view('web.home.index')->with($data);
    }

    //search
    public function search (Request $request){
        
        $request->validate(([
            'keyword' => 'required|string'
        ]));

        $keyword = $request->keyword;

        $data['keyword'] = $keyword;

        $data['blogs'] = DB::select("
        SELECT blogs.*, sub_cats.name AS subCat,main_cats.id as main_cat_id, main_cats.name as mainCat, users.name as userName from blogs   
        JOIN sub_cats ON sub_cats.id=blogs.sub_cat_id 
        JOIN main_cats ON main_cats.id=sub_cats.main_cat_id
        JOIN users ON users.id = blogs.user_id
        WHERE ( blogs.`title` LIKE '%".$keyword."%' OR blogs.content LIKE '%".$keyword."%') AND blogs.active=1");

        $data['bloggers_blogs'] = DB::select("
        SELECT blogs.*, sub_cats.name AS subCat,main_cats.id as main_cat_id, main_cats.name as mainCat, bloggers.name as userName from blogs   
        JOIN sub_cats ON sub_cats.id=blogs.sub_cat_id 
        JOIN main_cats ON main_cats.id=sub_cats.main_cat_id
        JOIN bloggers ON bloggers.id = blogs.blogger_id
        WHERE ( blogs.`title` LIKE '%".$keyword."%' OR blogs.content LIKE '%".$keyword."%') AND blogs.active=1");

        return view('web.home.search')->with($data);

    }
}
