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

Route::post('/registration','User\\RegisterController@store')->name('register');
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
		Route::resource('/announcements','AnnouncementController');
		Route::post('/announcement/bulkdelete','AnnouncementController@bulkDelete');
		Route::get('/email/create','EmailController@create');
		Route::post('/sendemail','EmailController@send');
		Route::resource('/branches','BranchesController');
		Route::post('/branches/bulkdelete','BranchesController@bulkDelete');
		Route::get('/branches/{id}/del','BranchesController@destroy');
		Route::resource('classes','ClassesController');
		Route::post('/classes/bulkdelete','ClassesController@bulkDelete');
		Route::get('/classes/{id}/del','ClassesController@destroy');
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
		//--Route for assigning ministry --//
		Route::resource('usersminassign','AssignMinistryController');
		//--End--//
		//--Route for fellowship request approval--//
		Route::resource('/fellowship','FellowshipController');
		Route::get('/frequest/approve/{id}','FellowshipController@update');
		Route::get('/frequest/decline/{id}','FellowshipController@destroy');
		Route::post('/frequest/bulkdecline','FellowshipController@bulkDecline');
		Route::post('/frequest/bulkapprove','FellowshipController@bulkApprove');
		Route::post('/frequest/bulkchange','FellowshipController@bulkChange');
		//--End--//
		//--Route for Media Management--//
		Route::resource('/media','MediaController');
		//--End--//
		Route::resource('/enrollment','EnrollmentController');
		Route::post('/enrollment/bulkenroll','EnrollmentController@bulkEnroll');
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
	 Route::get('/frequest/{id}/del','FellowshipRequestController@destroy');
	 Route::resource('fclasses','ClassesRequestController');
	 Route::post('fclasses/bulkdelete','ClassesRequestController@bulkDelete');
	 Route::get('fclasses/{id}/del','ClassesRequestController@destroy');
 //--End--//
});

//--Authentication Routes--//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//--End--//


// Route::get('sendemail', function () {

//     $data = array(
//         'name' => "Learning Laravel",
//     );

//     Mail::send('emails.send', $data, function ($message) {

//         $message->from('geeelyn07@gmail.com', 'Learning Laravel');

//         $message->to('geeelyn07@gmail.com')->subject('Learning Laravel test email');

//     });

//     return "Your email has been sent successfully";

// });

// Route::get('send_test_email', function(){
// 	Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
// 	{
// 		$message->to('juliandakennethjay14@gmail.com');
// 	});
// });
