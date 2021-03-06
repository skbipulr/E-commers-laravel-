<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', 'FrontendController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Category conttroler routs
Route::get('/app/category', 'CategoryController@addCategory');
Route::post('app/category/post', 'CategoryController@addCategorypost');
Route::get('delete/category/{category_id}', 'CategoryController@deleteCategory');
Route::get('edit/category/{category_id}', 'CategoryController@editCategory');
Route::post('edit/category/post', 'CategoryController@editCategorypost');
Route::get('restore/category/{category_id}', 'CategoryController@restoreCategory');
Route::get('restore/category/{category_id}', 'CategoryController@restoreCategory');
Route::post('mark/delete', 'CategoryController@markDelete');

//prolfile conttroler routs
Route::get('profile', 'ProfileController@profile');
Route::post('edit/profile/post', 'ProfileController@editProfilePost');
Route::post('edit/password/post', 'ProfileController@editPasswordPost');
