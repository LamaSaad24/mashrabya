<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
        {
            //its just a dummy data object.
            $settings = Setting::all();
            $homeSettings = DB::select('SELECT `header-title` as title ,`header-image` as image , `logo`, `shortcut-icon` as icon FROM `home_settings`');


            // Sharing is caring
            View::share('settings', $settings);
            View::share('homeSettings', $homeSettings);
        }
}
