<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UseraccController;
use App\Http\Controllers\PostController;

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
Route::get('/', function(){
    return redirect('/login');
});
Route::resource('login', 'App\Http\Controllers\UseraccController');
Route::post('home','App\Http\Controllers\UseraccController@log2')->name('log2');
Route::resource('media', 'App\Http\Controllers\PostController');
Route::post('like','App\Http\Controllers\PostController@like')->name('like');
Route::post('showsearch','App\Http\Controllers\PostController@showsearch')->name('showsearch');
Route::get('toprofile','App\Http\Controllers\PostController@toprofile')->name('toprofile');
Route::resource('profile', 'App\Http\Controllers\ProfileController');
Route::post('geteditprofile', 'App\Http\Controllers\ProfileController@geteditprofile')->name('geteditprofile');
Route::post('followact','App\Http\Controllers\ProfileController@followact')->name('followact');
Route::post('followlist','App\Http\Controllers\ProfileController@followlist')->name('followlist');
Route::resource('class', 'App\Http\Controllers\ClassController');
Route::get('joinedclass','App\Http\Controllers\ClassController@joinedclass');
Route::post('createclass','App\Http\Controllers\ClassController@createclass')->name('createclass');
Route::post('inclass_material','App\Http\Controllers\ClassController@inclass_material')->name('inclass_material');
Route::post('inclass_assignment','App\Http\Controllers\ClassController@inclass_assignment')->name('inclass_assignment');
Route::post('joiningclass','App\Http\Controllers\ClassController@joiningclass')->name('joiningclass');

Route::get('create_assignment','App\Http\Controllers\ClassController@createassignment');
Route::post('create_material','App\Http\Controllers\ClassController@creatematerial');
Route::post('/creatingmaterial','App\Http\Controllers\ClassController@creatingmaterial')->name('creatingmaterial');

Route::post('creatingassignment','App\Http\Controllers\ClassController@creatingassignment')->name('creatingassignment');
//Route::get('anotherprofile','App\Http\Controllers\ProfileController@anotherpf')->name('anotherprofile');     
// Route::get('toprofile/{$anotherid}', function () {
//      return redirect('/profile');
// })->name('toprofile');
Route::get('editprofile',function(){
    return view('layouts.editprofile');
})->name('editprofile');
Route::get('logo',function(){
    return redirect('/media');
})->name('logo');

Route::get('test',function(){
    return view('layouts.view-material');
})->name('test');
