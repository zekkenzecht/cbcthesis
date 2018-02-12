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
Route::get('/dashboard','PagesController@dashboard');
Route::get('/',function(){
	return redirect('/home');
});
//--Route for User management--//
Route::middleware(['role:super-admin'])->group(function () {
 	 Route::prefix('admin')->group(function () {
		Route::resource('/roles','User\\RoleController');
		Route::resource('/users','User\\UserController');
		Route::resource('/permissions','User\\PermissionController');
		Route::post('/users/bulkchange','User\\UserController@bulkChange');
		Route::get('/users/stat/{id}','User\\UserController@destroy');
		Route::get('/roles/del/{id}','User\\RoleController@destroy');
		Route::post("/roles/bulkdelete",'User\\RoleController@bulkDelete')->name('bulk');
		Route::get("/permissions/del/{id}",'User\\PermissionController@destroy');
		Route::post("/permissions/bulkDelete",'User\\PermissionController@bulkDelete');
		Route::resource('/devotions','DevotionController');
		Route::get('/devotions/{id}/del','DevotionController@destroy');
		Route::post('/devotions/buklDelete','DevotionController@bulkDelete');
});
});
//--End--//

Route::middleware(['role:super-admin'])->group(function () {
 	Route::prefix('admin')->group(function () {
 		//--Route for Posts Admin Management--//
		Route::resource('/posts','Post\\PostController');
		Route::get('archives','Post\\PostArchiveController@index');
		Route::post('/posts/draft','Post\\PostDraftController@store')->name('draft');
	
		Route::get('/prequest','Post\\PostRequestController@index')->name('prequest');
		Route::post('/admin/posts/bulkchange','Post\\PostArchiveController@bulkChange');
		Route::put('/prequest/approval/{id}','Post\\PostRequestController@approval');
		Route::get("/posts/arch/{id?}",'Post\\PostArchiveController@update')->name('archive');
		Route::delete('/prequest/cancel/{id}','Post\\PostRequestController@destroy')->name('preqdecline');
		//--End--//
		//--routes for calendar--//
		Route::resource('calendar', 'EventController');
		Route::get('calendar/{id}/del','EventController@destroy');
		Route::post('calendar/bulkDelete', 'EventController@bulkDelete');
		//--End--//
		//--routes for assimilation--//
		Route::resource('assimilation','AssimilationController');
		//--end--//
		//--Route for --//
		Route::resource('usersminassign','AssignMinistryController');
		//--End--//
});
});	

	

Route::middleware(['role:members'])->group(function () {
//--Route for Post Making Request--//
 	 Route::resource('/prequest','Post\\PostRequestController');
//--end--//

});

Route::middleware(['role:ministry-head-and-secretaries'])->group(function () {
//--route for felloship request
 	 Route::resource('/frequest','FellowshipRequestController');
 	 Route::post('/frequest/bulkDelete','FellowshipRequestController@bulkDelete');
 //--End--//
});

//--Authentication Routes--//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//--End--//
