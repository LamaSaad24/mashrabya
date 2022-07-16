<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blogs_tag;
use App\Models\User;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminBlogController extends Controller
{
    // show blogs 
    public function show (){
        $data['blogs'] = DB::select('SELECT blogs.*,
        users.name as userName, sub_cats.name as subCat,sub_cats.id as subCatId, main_cats.name AS mainCat FROM `blogs`
        JOIN users ON blogs.user_id = users.id 
        JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id;');

        $data['subCats'] = DB::select("select sub_cats.id as subCatId,sub_cats.name as subCatName,main_cats.name as title from sub_cats 
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id");


        return view('admin.blog.blog')->with($data);
    }

    // add new blog 
    public function store(Request $request){
        $userId = Auth::user()->id;
        
        try{
                
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image_meta' => 'required|string|max:30',
                'image' => 'required',
                'keywords' => 'required|string',
                'description' => 'required|string',
                'active' => 'required|string',
                'tags' => 'required',
                'subCatId' => 'required|exists:sub_cats,id',
            ]);

            if($request->file('image')){
                $file= $request->image;
                $name = $file->getClientOriginalName();
                $filename= date('YmdHi').$name;
                $file->move(base_path('\public\upload'), $filename);
            }

            Blog::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $filename,
                'image_meta' => $request->image_meta,
                'keywords_meta' => $request->keywords,
                'description_meta' => $request->description,
                'sub_cat_id'=> $request->subCatId,
                'active' => $request->active,
                'tags' => implode("," ,$request->tags),
                'user_id' => $userId
            ]);

            
        
            return Redirect::back()->with('success', "تم الإضافة بنجاح");
        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    // delete blog 
    public function delete(Request $request){
        try{
            $blog = Blog::findOrFail($request->id);
            $blog->delete();
            return Redirect::back()->with('success', "تم الحذف بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }
    
    // update blog 
    public function update($id){
        $data['blog'] = DB::select('SELECT blogs.*,
        users.name as userName, sub_cats.name as subCat,sub_cats.id as subCatId, main_cats.name AS mainCat FROM `blogs`
        JOIN users ON blogs.user_id = users.id 
        JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id
        where blogs.id ='.$id);

        $data['subCats'] = DB::select("select sub_cats.id as subCatId,sub_cats.name as subCatName,main_cats.name as title from sub_cats 
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id");

        return view('admin.blog.editBlog')->with($data);
    }

    public function updateBlog(Request $request){
        try{
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image_meta' => 'required|string|max:30',
                'keywords' => 'required|string',
                'description' => 'required|string',
                'active' => 'required|string',
                'tags' => 'required',
                'subCatId' => 'required|exists:sub_cats,id',
            ]);
            
            if($request->file('image')){
                $file= $request->image;
                $name = $file->getClientOriginalName();
                $filename= date('YmdHi').$name;
                $file->move(base_path('\public\upload'), $filename);

            
                Blog::findOrFail($request->id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $filename,
                'image_meta' => $request->image_meta,
                'keywords_meta' => $request->keywords,
                'description_meta' => $request->description,
                'description' => $request->description,
                'tags' => implode("," ,$request->tags),
                'sub_cat_id'=> $request->subCatId,
                'active' => $request->active
            ]);
            }else{
                Blog::findOrFail($request->id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'image_meta' => $request->image_meta,
                    'keywords_meta' => $request->keywords,
                    'description_meta' => $request->description,
                    'tags' => implode("," ,$request->tags),
                    'sub_cat_id'=> $request->subCatId,
                    'active' => $request->active
                ]);
            }
        
            return Redirect::back()->with('success', "تم التحديث بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }
}
