<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminUserController extends Controller
{
    //show users
    public function show (){
        $data['users'] = DB::select("SELECT users.* FROM `users` ");

        // dd($data);

        return view("admin.user.user")->with($data);
    }

    //add new user
    public function store(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|max:30',
                'email' => 'required|email',
                'password' => 'required',
                'active' => 'required|string'
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'active' => $request->active,
                'password' => Hash::make($request->password)
            ]);


            return Redirect::back()->with('success', "تم الإضافة بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
        
    }

    //delete user
    public function delete(Request $request){
        try{
            $user = User::findOrFail($request->id);
            $user->delete();

            return Redirect::back()->with('success', "تم الحذف بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }


    //update user
    public function update(Request $request){

        try{
            $request->validate([
                'name' => 'required|string|max:30',
                'email' => 'required|email',
                'active' => 'required|string'
            ]);
        
            User::findOrFail($request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'active' => $request->active
            ]);
        
        
            return Redirect::back()->with('success', "تم التحديث بنجاح");

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        };
    }
}
