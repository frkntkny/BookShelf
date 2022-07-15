<?php

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


Route::get('/', 'App\Http\Controllers\DashboardController@welcome')->name('welcome');
Route::get('/test', '\App\Http\Controllers\TestController@index')->name('test');

Route::get('/search','\App\Http\Controllers\BookController@search')->name('search');
Route::resource('/books', 'App\Http\Controllers\BookController')->only('index', 'show','create','edit','store','search','destroy','update','download');




//Route::get('/category/{id}','\App\Http\Controllers\BookController@category')->name('category');
//Route::get('/seeAllCategories', 'App\Http\Controllers\CategoryController@showAllCategories')->name('seeAllCategories');
//Route::Post('/deleteCategory', 'App\Http\Controllers\CategoryController@deleteCategory')->name('deleteCategory');
//Route::get('/addCategory', 'App\Http\Controllers\CategoryController@addCategory')->name('addCategory');
//Route::post('/addCategoryPost', 'App\Http\Controllers\CategoryController@addCategoryPost')->name('addCategory');
//






//Route::get('/seeAllUsers', 'App\Http\Controllers\UserController@showAllUsers')->name('seeAllUsers');
//Route::Post('/deleteUser', 'App\Http\Controllers\UserController@deleteUser')->name('deleteUser');
//Route::get('/editUser', 'App\Http\Controllers\UserController@editUser')->name('editUser');
//Route::post('/editUserPost', 'App\Http\Controllers\UserController@editUserPost')->name('editUserPost');



//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

//for auth user only
Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
    Route::get('/mybooks', 'App\Http\Controllers\BookController@mybooks')->name('mybooks');
    Route::post('/download','\App\Http\Controllers\BookController@download')->name('download');
    Route::resource('/users', 'App\Http\Controllers\UserController')->only(['edit', 'update']);
    Route::resource('/books', 'App\Http\Controllers\BookController')->only(['index','show','search']);


});
Route::group(['middleware' => ['role:admin']], function (){

    Route::get('/admin', 'App\Http\Controllers\UserController@admin')->name('admin');

    Route::resource('/users', 'App\Http\Controllers\UserController')->except(['edit', 'update']);
    Route::resource('/categories', 'App\Http\Controllers\CategoryController');
    Route::resource('/books', 'App\Http\Controllers\BookController')->except(['index', 'show','create','edit','store','search','destroy','update','download','search']);

});

require __DIR__.'/auth.php';
