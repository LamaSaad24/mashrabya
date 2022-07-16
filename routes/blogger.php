<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Blogger Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('blogger')->name('blogger.')->group(function(){
    Route::middleware('isBlogger')->group(function (){
        Route::view('dashboard', 'blogger.home.index')->name('dashboard');
    });

    require __DIR__.'/blogger_auth.php';
});


