<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //
    public function show ($id){
        
        Blog::findOrFail($id);

        $addedBy = DB::select('select addedBy from blogs  WHERE blogs.active=1 and blogs.id=" '.$id.'"');

        $addedType = $addedBy[0]->addedBy;

        if($addedType == "admin"){
            $data['blog'] = DB::select('SELECT blogs.*, sub_cats.name AS subCat,main_cats.id as main_cat_id, main_cats.name as mainCat, users.name as userName from blogs   
                JOIN sub_cats ON sub_cats.id=blogs.sub_cat_id 
                JOIN main_cats ON main_cats.id=sub_cats.main_cat_id
                join users on users.id = blogs.user_id
                WHERE blogs.active=1 and blogs.id=" '.$id.'"');
        }else{
            $data['blog'] = DB::select('SELECT blogs.*, sub_cats.name AS subCat,main_cats.id as main_cat_id, main_cats.name as mainCat, bloggers.name as userName from blogs   
            JOIN sub_cats ON sub_cats.id=blogs.sub_cat_id 
            JOIN main_cats ON main_cats.id=sub_cats.main_cat_id
            join bloggers on bloggers.id = blogs.blogger_id
            WHERE blogs.active=1 and blogs.id=" '.$id.'"');
        }

        $data['lastBlogs']  = DB::select('SELECT DISTINCT blogs.id, blogs.title,   blogs.image,blogs.image_meta, blogs.created_at from blogs where blogs.active=1 ORDER BY blogs.created_at DESC LIMIT 4');


        // get related blogs per multie tags 
        if($data['blog']){
            $tags = explode(",",$data['blog'][0]->tags);

            $query = "SELECT id,title,image,image_meta,created_at FROM `blogs`  where (tags LIKE '%$tags[0]%'";
    
            for ($i=1; $i< sizeof($tags); $i++){
                $query .= "OR tags like '%".$tags[$i]."%'";
            }
    
            $query .= ") And active=1 And id NOT IN($id) ";

    
            $data['relatedBlogs'] = DB::select($query) ;

        }else{
            $tags = [];
        }

        // echo $query;

        return view('web.blog.blog')->with($data);
    }
}
