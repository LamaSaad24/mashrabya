<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminSubCatsControler extends Controller
{
    //show sub cats
    public function show (){

        $data['subCats'] = DB::select("SELECT sub_cats.*, main_cats.name as mainCat, main_cats.id as mainCatId, users.name as userName FROM sub_cats JOIN users ON sub_cats.user_id=users.id JOIN main_cats ON main_cats.id = sub_cats.main_cat_id;");
        $data['mainCats'] = DB::select("select id,name from main_cats ");

        return view('admin.type.sub')->with($data);
    }

    //add sub cat 
    public function store(Request $request){
        $userId = Auth::user()->id;
        try{
            $request->validate([
                'name' => 'required|string|max:30',
                'active' => 'required|boolean',
                'image' => 'required',
                'image_meta' => 'required|string|max:30',
                'keywords' => 'required|string',
                'description' => 'required|string',
                'mainCatId' => 'required|exists:main_cats,id'
            ]);

            if($request->file('image')){
                $file= $request->image;
                $name = $file->getClientOriginalName();
                $filename= date('YmdHi').$name;
                $file->move(base_path('\public\upload'), $filename);
            }

            SubCat::create([
                'name' => $request->name,
                'active' => $request->active,
                'image' => $filename,
                'image_meta' => $request->image_meta,
                'keywords_meta' => $request->keywords,
                'description_meta' => $request->description,
                'user_id' => $userId,
                'main_cat_id' => $request->mainCatId
            ]);

        
            return Redirect::back()->with('success', "تم الإضافة بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    //delete sub cat
    public function delete(Request $request){
        try{
            $main = SubCat::findOrFail($request->id);
            $main->delete();
        
            return Redirect::back()->with('success', "تم الحذف بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }


    //update sub cat
    public function update(Request $request){
        try{
            $request->validate([
                'id' => 'required|exists:sub_cats,id',
                'mainCatId' => 'required|exists:main_cats,id',
                'name' => 'required|string',
                'active' => 'required|string',
                'image_meta' => 'required|string|max:30',
                'keywords' => 'required|string',
                'description' => 'required|string'
                
            ]);
            
            if($request->file('image')){
                $file= $request->image;
                $name = $file->getClientOriginalName();
                $filename= date('YmdHi').$name;
                $file->move(base_path('\public\upload'), $filename);

                SubCat::findOrFail($request->id)->update([
                    'name' => $request->name,
                    'active' => $request->active,
                    'main_cat_id' => $request->mainCatId,
                    'image' => $filename,
                    'image_meta' => $request->image_meta,
                    'keywords_meta' => $request->keywords,
                    'description_meta' => $request->description
                ]);
            }else{
                SubCat::findOrFail($request->id)->update([
                    'name' => $request->name,
                    'active' => $request->active,
                    'main_cat_id' => $request->mainCatId,
                    'image_meta' => $request->image_meta,
                    'keywords_meta' => $request->keywords,
                    'description_meta' => $request->description
                ]);
            }
            return Redirect::back()->with('success', "تم التحديث بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }
}
