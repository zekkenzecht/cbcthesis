<?php

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

//routes for forums
  		Route::resource('/posts','PostController');
			Route::post('/posts/draft','PostDraftController@store')->name('draft');
			Route::put("posts/archive/{id?}",'PostArchiveController@update')->name('archive');
//--End--//

Route::get('/dashboard','PagesController@dashboard');

//--Route for User management--//
Route::middleware(['role:super-admin'])->group(function () {
 	 Route::prefix('admin')->group(function () {
			Route::resource('/roles','RoleController');
			Route::resource('/users','UserController');
			Route::resource('/permissions','PermissionController');
			Route::resource('/posts','PostController');
			Route::post('/posts/draft','PostDraftController@store')->name('draft');
			Route::put("posts/archive/{id?}",'PostArchiveController@update')->name('archive');
});
});
//--End--//
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
