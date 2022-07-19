<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LastBlogController extends Controller
{
    //
    public function show (){
        $data['lastBlogs']  = DB::select('SELECT  
        blogs.id, blogs.title, blogs.image, blogs.created_at, blogs.image_meta, 
        sub_cats.name as subCat,
        main_cats.name as mainCat
        from blogs 
        JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id 
        JOIN main_cats ON sub_cats.main_cat_id=main_cats.id
        where blogs.active =1
        ORDER BY blogs.created_at DESC LIMIT 12 ');

        $data['seo'] = DB::select('SELECT title,keywords_meta,description_meta FROM `seos` WHERE `key` ="lastBlog" ');

        return view('web.lastBlog.lastBlog')->with($data);
    }
}
