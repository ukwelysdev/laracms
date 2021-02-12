<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PagesController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', function(){return view('admin.index');})->middleware('admin');
//Route::get('/admin', [PagesController::class,'index']);


Route::resource('/admin/pages', PagesController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
