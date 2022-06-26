<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ViewerController;
use App\Models\Admin;
use App\Models\Author;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('cms/admin')->group(function(){
    Route::resource('countries',CountryController::class);
    Route::resource('cities',CityController::class);
    Route::resource('admins',AdminController::class);
    Route::post('/update-admin/{id}',[AdminController::class, 'Update'])->name('update-admin');
    Route::resource('authors',AuthorController::class);
    Route::resource('viewers',ViewerController::class);
});
