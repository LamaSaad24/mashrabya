<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MainCat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminMainCatsController extends Controller
{
    //show main cats
    public function show(){

        $data['mainCats'] = DB::select('SELECT main_cats.*,users.name as userName FROM `main_cats` JOIN users ON users.id=main_cats.user_id ');

        return view('admin.type.main')->with($data);
    }

    //add new main cat
    public function store(Request $request){
        $userId = Auth::user()->id;
        try{
            $request->validate([
                'name' => 'required|string|max:30',
                'active' => 'required|boolean',
                'image' => 'required',
                'image_meta' => 'required|string|max:30',
                'keywords' => 'required|string',
                'description' => 'required|string'
            ]);

            if($request->file('image')){
                $file= $request->image;
                $name = $file->getClientOriginalName();
                $filename= date('YmdHi').$name;
                $file->move(base_path('\public\upload'), $filename);
            }

            MainCat::create([
                'name' => $request->name,
                'active' => $request->active,
                'image' => $filename,
                'image_meta' => $request->image_meta,
                'keywords_meta' => $request->keywords,
                'description_meta' => $request->description,
                'user_id' => $userId
            ]);

            return Redirect::back()->with('success', "تم الإضافة بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    //delete main cat
    public function delete(Request $request){
        try{
            $main = MainCat::findOrFail($request->id);
            $main->delete();
        
            return Redirect::back()->with('success', "تم الحذف بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }



    //update main cat
    public function update(Request $request){
        try{
            $request->validate([
                'id' => 'required|exists:main_cats,id',
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

                MainCat::findOrFail($request->id)->update([
                    'name' => $request->name,
                    'active' => $request->active,
                    'image' => $filename,
                    'image_meta' => $request->image_meta,
                    'keywords_meta' => $request->keywords,
                    'description_meta' => $request->description,
                ]);
            }else{
                MainCat::findOrFail($request->id)->update([
                    'name' => $request->name,
                    'active' => $request->active,
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
