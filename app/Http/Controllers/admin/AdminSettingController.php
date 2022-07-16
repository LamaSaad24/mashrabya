<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\homeSetting;
use App\Models\Seo;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminSettingController extends Controller
{
    //show seo table , home setting, footer settings
    public function show (){
        $data['settings'] = DB::select('SELECT settings.id, settings.name, settings.value, settings.icon,settings.created_at, users.name as userName FROM `settings`
        JOIN users ON users.id = settings.user_id');

        $data['seo'] = DB::select('SELECT seos.*, users.name as userName FROM `seos` JOIN users ON users.id = seos.user_id ');

        $data['homeSettings'] = DB::select('SELECT id,`header-title` as title, `header-image` as image, `logo`, `shortcut-icon` as icon, `user_id`, `created_at`, `updated_at` from home_settings');

        return view('admin.setting.setting')->with($data);
    }

    //add new setting to footer (social icon)
    public function store(Request $request){
        try{
            $userId = Auth::user()->id;
            $request->validate([
                'name' => 'required|string|max:30',
                'value' => 'required|string',
                'icon' => 'required|string|max:30'
            ]);
    
            Setting::create([
                'name' => $request->name,
                'value' => $request->value,
                'icon' => $request->icon,
                'user_id' => $userId
            ]);
    
            return Redirect::back()->with('success', "تم الإضافة بنجاح");
        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    //delete row from footer setting (social icon)
    public function delete(Request $request){
        try{
            $sett = Setting::findOrFail($request->id);
            $sett->delete();
            return Redirect::back()->with('success', "تم الحذف بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    //update row from footer setting (social icon)
    public function update(Request $request){
        try{
            $request->validate([
                'id' => 'required|exists:settings,id',
                'value' => 'required|string'
            ]);

            Setting::findOrFail($request->id)->update([
                'value' => $request->value
            ]);
            return Redirect::back()->with('success', "تم التحديث بنجاح");
        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }


    // seo settings

    //add row to seo table
    public function storeSeo(Request $request){
        try{
            $userId = Auth::user()->id;
            $request->validate([
                'key' => 'required|string|max:30',
                'title' => 'required|string',
                'keywords' => 'required|string',
                'description' => 'required|string'
            ]);
            
            Seo::create([
                'key' => $request->key,
                'title' => $request->title,
                'keywords_meta' => $request->keywords,
                'description_meta' => $request->description,
                'user_id' => $userId
            ]);

            return Redirect::back()->with('success', "تم الإضافة بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    //delete row from seo table
    public function deleteSeo(Request $request){
        try{
            $seo = Seo::findOrFail($request->id);
            $seo->delete();
            
            return Redirect::back()->with('success', "تم الحذف بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    //update seo row
    public function updateSeo(Request $request){
        try{
            $request->validate([
                'id' => 'required|exists:seos,id',
                'keywords' => 'required|string',
                'description' => 'required|string',
                'title' => 'required|string'
            ]);

            Seo::findOrFail($request->id)->update([
                'title' => $request->title,
                'keywords_meta' => $request->keywords,
                'description_meta' => $request->description
            ]);
        
            return Redirect::back()->with('success', "تم التحديث بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }


    // add home setting 

    public function storeHomeSetting(Request $request){

        try{
            $userId = Auth::user()->id;

            $request->validate([
                'title' => 'required|string',
                'image' => 'required',
                'logo' => 'required',
                'icon' => 'required'
            ]);

            if($request->file('image')){
                $file= $request->image;
                $name = $file->getClientOriginalName();
                $filename= date('YmdHi').$name;
                $file->move(base_path('\public\upload'), $filename);
            }

            if($request->file('logo')){
                $file= $request->logo;
                $name = $file->getClientOriginalName();
                $logo= date('YmdHi').$name;
                $file->move(base_path('\public\upload'), $logo);
            }

            if($request->file('icon')){
                $file= $request->icon;
                $name = $file->getClientOriginalName();
                $icon= date('YmdHi').$name;
                $file->move(base_path('\public\upload'), $icon);
            }
            
            homeSetting::create([
                'header-title' => $request->title,
                'header-image' => $filename,
                'logo' => $logo,
                'shortcut-icon' => $icon,
                'user_id' => $userId
            ]);

            return Redirect::back()->with('success', "تم الإضافة بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    //delete row from home setting 
    public function deleteHomeSetting(Request $request){
        try{
            $sett = homeSetting::findOrFail($request->id);
            $sett->delete();
            return Redirect::back()->with('success', "تم الحذف بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    //update home setting  row
    public function updateHomeSetting(Request $request){
        
        try{

            if($request->file('image') || $request->file('logo') || $request->file('icon') ) {
                
                if($request->file('image')){
                    $file= $request->image;
                    $name = $file->getClientOriginalName();
                    echo  $image= date('YmdHi').$name;
                    $file->move(base_path('\public\upload'), $image);
                }else{
                    $image =  DB::select('SELECT `header-image` as image FROM home_settings');
                    $image = $image[0]->image;
                }

    
                if($request->file('logo')){
                    $file1= $request->logo;
                    $name1 = $file1->getClientOriginalName();
                    $logo= date('YmdHi').$name1;
                    $file1->move(base_path('\public\upload'), $logo);
                }else{
                    $logo = DB::select('SELECT `logo` FROM `home_settings`');
                    $logo = $logo[0]->logo;
                }
    
                if($request->file('icon')){
                    $file2= $request->icon;
                    $name2 = $file2->getClientOriginalName();
                    $icon= date('YmdHi').$name2;
                    $file2->move(base_path('\public\upload'), $icon);
                }else{
                    $icon = DB::select('SELECT `shortcut-icon` as icon  FROM `home_settings`');
                    $icon = $icon[0]->icon;
                }
    
                homeSetting::findOrFail($request->id)->update([
                    'header-title' => $request->title,
                    'header-image' => $image,
                    'logo' => $logo,
                    'shortcut-icon' => $icon,
                ]);
            
            }else{
                homeSetting::findOrFail($request->id)->update([
                    'header-title' => $request->title
                ]);
            }

            
        
            return Redirect::back()->with('success', "تم التحديث بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }

}
