<?php

namespace App\Http\Controllers\blogger;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BloggerBlog extends Controller
{
    // show blogs 
    public function show (){

        $userId = auth('blogger')->user()->id;

        $data['blogs'] = DB::select("SELECT blogs.*,
        bloggers.name as userName, sub_cats.name as subCat,sub_cats.id as subCatId, main_cats.name AS mainCat FROM `blogs`
        JOIN bloggers ON blogs.blogger_id = bloggers.id 
        JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id
        where blogs.blogger_id = '$userId' ");

        $data['subCats'] = DB::select("select sub_cats.id as subCatId,sub_cats.name as subCatName,main_cats.name as title from sub_cats 
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id");


        return view('blogger.blog.blog')->with($data);
    }

    // add new blog 
    public function store(Request $request){
        $userId = auth('blogger')->user()->id;
        
        try{
                
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image_meta' => 'required|string|max:30',
                'image' => 'required',
                'keywords' => 'required|string',
                'description' => 'required|string',
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
                'active' => '0',
                'tags' => implode("," ,$request->tags),
                'addedBy' => 'blogger',
                'blogger_id' => $userId
            ]);

            
        
            return Redirect::back()->with('success', "تم الإضافة  انتظر حتى يتم قبولها من قبل الادمن");
        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    // delete blog 
    public function delete(Request $request){
        try{
            Blog::findOrFail($request->id)->update([
                'active' => '0',
                'deleted'=>'1'
            ]);
            return Redirect::back()->with('success', "تم إلغاء تفعيل المقالة , انتظر موافق الادمن على الحذف");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }
    
    // update blog 
    public function update($id){
        Blog::findOrFail($id);
        $data['blog'] = DB::select('SELECT blogs.*,
        bloggers.name as userName, sub_cats.name as subCat,sub_cats.id as subCatId, main_cats.name AS mainCat FROM `blogs`
        JOIN bloggers ON blogs.blogger_id = bloggers.id 
        JOIN sub_cats ON sub_cats.id = blogs.sub_cat_id
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id
        where blogs.id ='.$id);

        $data['subCats'] = DB::select("select sub_cats.id as subCatId,sub_cats.name as subCatName,main_cats.name as title from sub_cats 
        JOIN main_cats ON main_cats.id = sub_cats.main_cat_id");

        return view('blogger.blog.editBlog')->with($data);
    }

    public function updateBlog(Request $request){
        try{
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image_meta' => 'required|string|max:30',
                'keywords' => 'required|string',
                'description' => 'required|string',
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
                ]);
            }
        
            return Redirect::back()->with('success', "تم التحديث بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }
}
