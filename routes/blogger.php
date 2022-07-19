<?php

use App\Http\Controllers\blogger\BloggerBlog;
use App\Http\Controllers\blogger\BloggerHomeControler;
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
        Route::get('dashboard', [BloggerHomeControler::class, "index"])->name('dashboard');

        // ---bloggers
        Route::get('blog', [BloggerBlog::class, "show"]);
        Route::post('/blog/store', [BloggerBlog::class, "store"]);
        Route::post('/blog/delete', [BloggerBlog::class, "delete"]);
        Route::get('/blog/update/{id}', [BloggerBlog::class, "update"]);
        Route::post('/blog/update', [BloggerBlog::class, "updateBlog"]);
    });
    
    require __DIR__.'/blogger_auth.php';
});


