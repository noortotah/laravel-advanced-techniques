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

Route::get('login/{provider}', 'Auth\SocialAccountController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');



Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::group(['namespace' => 'Web','middleware' => ['\App\Http\Middleware\LogTeam']],function(){
	Route::resource('teams', 'TeamController');

	Route::get('/teams/{team}/title', function(\App\Team $team) {
	    return response()->jTitle($team);
	});

	Route::get('/teams/{team}/activate', function() {
	    return view('team/activate');
	})->name('activateTeam')->middleware('signed');

	Route::get('/teams/{team}/points', 'TeamController@points');
});

/*
http://localhost:8000/square?email=replace_by_real_user_email 
to make it work
*/
Route::get('/square/{number?}', function($number = 10) {
    return $number * $number;
})->middleware('auth:email');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/posts', 'PostController');
