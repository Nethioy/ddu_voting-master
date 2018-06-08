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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=>['web','auth']], function(){
Route::get('/home',function(){
	if (Auth::user()->role==1) {

		$users['users']=\App\User::all();
		return view('admin.home',$users);
		//return view('admin.home');
		
	}
	else  if (Auth::user()->role==0)
	{
		return view('home');
	}
	else if (Auth::user()->role==2)
	{   $users['users']=\App\User::all();
		return view('candidate.home');
	}
})->name('home');

});
//for posts
Route::resource('posts', 'PostController');
Route::POST('addPost', 'PostController@addPost');

Route::get('post', function(){
	$post = DB::table('posts')->get();
	return view('admin.post', ['posts' => $post]);
});

//for users
Route::resource('users', 'AddstudentController');
Route::POST('addusers', 'AddstudentController@addusers');

Route::get('user', function(){
	$post = DB::table('users')->get();
	return view('admin.user', ['users' => $user]);
});


Route::get('/add/new/student', 'AddstudentController@index');
Route::post('/home/profile/{id}', 'UserProfileController@index');
Route::post('/home/profile/{id}', 'UserProfileController@update');
Route::get('/user/privilage', 'UserController@previlage');
Route::get('/report', 'ReportController@index');