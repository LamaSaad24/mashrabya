<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminBloggerBlogController;
use App\Http\Controllers\admin\AdminBloggerController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminMainCatsController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSubCatsControler;
use App\Http\Controllers\Admin\AdminUserController;
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
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth'])->group(function (){
        // Route::view('dashboard', 'admin.home.index')->name('dashboard');


         // -----------------admin views 
    Route::get('/dashboard', [AdminHomeController::class, "show"])->name('dashboard');
    // ---mainCat 
    Route::get('/mainCats', [AdminMainCatsController::class, "show"]);
    Route::post('/mainCats/store', [AdminMainCatsController::class, "store"]);
    Route::post('/mainCats/delete', [AdminMainCatsController::class, "delete"]);
    Route::post('/mainCats/update', [AdminMainCatsController::class, "update"]);
    // ---subCat 
    Route::get('/subCats', [AdminSubCatsControler::class, "show"]);
    Route::post('/subCats/store', [AdminSubCatsControler::class, "store"]);
    Route::post('/subCats/delete', [AdminSubCatsControler::class, "delete"]);
    Route::post('/subCats/update', [AdminSubCatsControler::class, "update"]);
    // ---admins
    Route::get('/admins', [AdminUserController::class, "show"]);
    Route::post('/admins/store', [AdminUserController::class, "store"]);
    Route::post('/admins/delete', [AdminUserController::class, "delete"]);
    Route::post('/admins/update', [AdminUserController::class, "update"]);
    // ---bloggers
    Route::get('/bloggers', [AdminBloggerController::class, "show"]);
    Route::post('/bloggers/store', [AdminBloggerController::class, "store"]);
    Route::post('/bloggers/delete', [AdminBloggerController::class, "delete"]);
    Route::post('/bloggers/update', [AdminBloggerController::class, "update"]);
    // ---bloggers
    Route::get('/users', [AdminUserController::class, "show"]);
    Route::post('/users/store', [AdminUserController::class, "store"]);
    Route::post('/users/delete', [AdminUserController::class, "delete"]);
    Route::post('/users/update', [AdminUserController::class, "update"]);
    // ---blogs  of admin
    Route::get('/blogs', [AdminBlogController::class, "show"]);
    Route::post('/blogs/store', [AdminBlogController::class, "store"]);
    Route::post('/blogs/delete', [AdminBlogController::class, "delete"]);
    Route::get('/blogs/update/{id}', [AdminBlogController::class, "update"]);
    Route::post('/blogs/update', [AdminBlogController::class, "updateBlog"]);
     // ---blogs  of blogger
    Route::get('/bloggers_blogs', [AdminBloggerBlogController::class, "show"]);
    Route::get('/bloggers_blogs/{id}', [AdminBloggerBlogController::class, "showBlog"]);
    Route::get('/bloggers_blogs/active/{id}', [AdminBloggerBlogController::class, "activeBlog"]);
    Route::get('/bloggers_blogs/unactive/{id}', [AdminBloggerBlogController::class, "unactiveBlog"]);
    Route::get('/bloggers_blogs/delete/{id}', [AdminBloggerBlogController::class, "deleteBlog"]);
    Route::get('/bloggers_blogs/undelete/{id}', [AdminBloggerBlogController::class, "undeleteBlog"]);
    
    // ---setting
    Route::get('/settings', [AdminSettingController::class, "show"]);
    Route::post('/settings/store', [AdminSettingController::class, "store"]);
    Route::post('/settings/delete', [AdminSettingController::class, "delete"]);
    Route::post('/settings/update', [AdminSettingController::class, "update"]);
    // ---seo
    Route::post('/seo/storeSeo', [AdminSettingController::class, "storeSeo"]);
    Route::post('/seo/deleteSeo', [AdminSettingController::class, "deleteSeo"]);
    Route::post('/seo/updateSeo', [AdminSettingController::class, "updateSeo"]);
    // ---Home Setting
    Route::post('/settings/storeHomeSetting', [AdminSettingController::class, "storeHomeSetting"]);
    Route::post('/settings/deleteHomeSetting', [AdminSettingController::class, "deleteHomeSetting"]);
    Route::post('/settings/updateHomeSetting', [AdminSettingController::class, "updateHomeSetting"]);
    });

    require __DIR__.'/admin_auth.php';
});


