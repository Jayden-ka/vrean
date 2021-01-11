<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UseraccController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\testcontroller;

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
Route::post('like_search','App\Http\Controllers\PostController@like_search')->name('like_search');
Route::post('showsearch','App\Http\Controllers\PostController@showsearch')->name('showsearch');
Route::get('toprofile','App\Http\Controllers\PostController@toprofile')->name('toprofile');
Route::resource('profile', 'App\Http\Controllers\ProfileController');
Route::post('geteditprofile', 'App\Http\Controllers\ProfileController@geteditprofile')->name('geteditprofile');
Route::post('followact','App\Http\Controllers\ProfileController@followact')->name('followact');
Route::post('followlist','App\Http\Controllers\ProfileController@followlist')->name('followlist');

Route::resource('class', 'App\Http\Controllers\ClassController');

Route::post('list_member_teacher','App\Http\Controllers\ClassController@list_member_teacher')->name('list_member_teacher');
Route::post('list_member_student','App\Http\Controllers\ClassController@list_member_student')->name('list_member_student');

Route::get('joinedclass','App\Http\Controllers\ClassController@joinedclass');
Route::post('createclass','App\Http\Controllers\ClassController@createclass')->name('createclass');

Route::post('inclass_material/save','App\Http\Controllers\ClassController@inclass_material')->name('inclass_material');

Route::post('inclass_assignment','App\Http\Controllers\ClassController@inclass_assignment')->name('inclass_assignment');
Route::post('joiningclass_material','App\Http\Controllers\ClassController@joiningclass_material')->name('joiningclass_material');
Route::post('joiningclass_assignment','App\Http\Controllers\ClassController@joiningclass_assignment')->name('joiningclass_assignment');
Route::post('jointheclass','App\Http\Controllers\ClassController@jointheclass')->name('jointheclass');
Route::post('create_assignment','App\Http\Controllers\ClassController@createassignment');

Route::post('create_material/save','App\Http\Controllers\ClassController@creatematerial')->name('create_material');
Route::post('creatingmaterial/save','App\Http\Controllers\ClassController@creatingmaterial')->name('creatingmaterial');


Route::post('creatingassignment','App\Http\Controllers\ClassController@creatingassignment')->name('creatingassignment');
Route::post('viewmaterial','App\Http\Controllers\ClassController@view_material');
Route::post('viewassignment','App\Http\Controllers\ClassController@view_assignment');
Route::post('putthescore','App\Http\Controllers\ClassController@put_stu_score')->name('putthescore');
Route::post('viewassignment_student','App\Http\Controllers\ClassController@view_assignment_student');

Route::post('submitting_assignment','App\Http\Controllers\ClassController@submitting_assignment');
Route::post('unsubmiting_assignment','App\Http\Controllers\ClassController@unsubmit');

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


