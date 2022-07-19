<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\blogger\BloggerBlog;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BloggerBlog as ModelsBloggerBlog;
use App\Models\Blogs_tag;
use App\Models\User;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminBloggerBlogController extends Controller
{
    // show blogs 
    public function show (){

        $data['Activeblogs'] = DB::select('SELECT blogs.*,
        bloggers.name as userName, sub_cats.name as subCat,sub_cats.id as subCatId, main_cats.name AS mainCat FROM `blogs`
        JOIN bloggers ON blogs.blogger_id = bloggers.id 
        JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id
        where blogs.active = "1" and blogs.addedBy = "blogger" ');

        $data['blogs'] = DB::select('SELECT blogs.*,
        bloggers.name as userName, sub_cats.name as subCat,sub_cats.id as subCatId, main_cats.name AS mainCat FROM `blogs`
        JOIN bloggers ON blogs.blogger_id = bloggers.id 
        JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id
        where blogs.active = "0" and blogs.addedBy = "blogger" ');

        $data['deletedBlogs'] = DB::select('SELECT blogs.*,
        bloggers.name as userName, sub_cats.name as subCat,sub_cats.id as subCatId, main_cats.name AS mainCat FROM `blogs`
        JOIN bloggers ON blogs.blogger_id = bloggers.id 
        JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id
        where blogs.deleted = "1" and blogs.addedBy = "blogger" ');

        $data['subCats'] = DB::select("select sub_cats.id as subCatId,sub_cats.name as subCatName,main_cats.name as title from sub_cats 
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id");


        return view('admin.blog.blogger.bloggerblog')->with($data);
    }

    // show  blog  custom by id
    public function showBlog($id){
        Blog::findOrFail($id);
        $data['blog'] = DB::select('SELECT blogs.*,
        bloggers.name as userName, sub_cats.name as subCat,sub_cats.id as subCatId, main_cats.name AS mainCat FROM `blogs`
        JOIN bloggers ON blogs.blogger_id = bloggers.id 
        JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id
        where blogs.id ='.$id);

        $data['subCats'] = DB::select("select sub_cats.id as subCatId,sub_cats.name as subCatName,main_cats.name as title from sub_cats 
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id");

        return view('admin.blog.blogger.blog')->with($data);
    }

    // active blog 
    public function activeBlog($id){
        try{

                Blog::findOrFail($id)->update([
                    'active' => '1'
                ]);
        
            return Redirect::back()->with('success', "تم التفعيل بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

     // un active blog 
    public function unactiveBlog($id){
        try{

                Blog::findOrFail($id)->update([
                    'active' => '0'
                ]);
        
            return Redirect::back()->with('success', "تم إلغاء التفعيل بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

     // Delete blog 
    public function deleteBlog($id){
        try{
            $blog = Blog::findOrFail($id);
            $blog->delete();
            return Redirect::back()->with('success', "تم الحذف بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    //un Delete blog 
    public function undeleteBlog($id){
        try{
            Blog::findOrFail($id)->update([
                'active' => '1',
                'deleted' => '0'
            ]);

            return Redirect::back()->with('success', "تم إلغاء الحذف بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }



}
