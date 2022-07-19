<?php

use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LastBlogController;
use App\Http\Controllers\Web\MainCatController;
use App\Http\Controllers\web\SubCatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// -----------------user views 
Route::get('/', [HomeController::class, "index"]);
Route::post('search', [HomeController::class, "search"]);
Route::get('type/{id}', [MainCatController::class, "show"]);
Route::get('type/subCat/{id}', [SubCatController::class, "show"]);
Route::get('type/blog/{id}', [BlogController::class, "show"]);
Route::get('last-blog', [LastBlogController::class, "show"]);




require __DIR__.'/blogger.php';
require __DIR__.'/admin.php';

