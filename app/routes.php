<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

# Landing Page, show this page only to non-logged-in users
Route::get('/', 'HomeController@showWelcome');

/**
 * Auth Routes
 * @author robin hood <fordarnold@gmail.com>
 */

# register
Route::get('user/register', 'MasterUserController@getRegister');
Route::post('user/register', 'MasterUserController@postRegister');

# login
Route::get('user/login', 'MasterUserController@getLogin');
Route::post('user/login', 'MasterUserController@postLogin');

# logout
Route::get('user/logout', 'MasterUserController@getLogout');
Route::get('user/session/close', 'MasterUserController@doLogout');

# current user's profile
Route::get('user/me', 'MasterUserController@getCurrentUser');

# update user account
Route::get('user/update', 'MasterUserController@getUserUpdate');
Route::post('user/update', 'MasterUserController@postUserUpdate');

# delete user
Route::get('user/delete', 'MasterUserController@getUserCleanup');
Route::post('user/delete', 'MasterUserController@postUserCleanup');

Route::get('home', 'HomeController@getUserDashboard');

# Authenticate user first
Route::group(['before' => 'auth'], function(){

	# Every logged-in user gets to:
	#
	# See a custom dashboard

});

# Authenticate user as 'master' before visiting these routes
// Route::group(['before' => 'auth|master'], function(){

	# ONLY master users can:
	#
	# register user as 'financialmanager'
	Route::get('user/register/financialmanager', 'OtherUserController@getFinancialManagerRegister');
	Route::post('user/register/financialmanager', 'OtherUserController@postFinancialManagerRegister');

	

// });

# Authenticate user as 'financialmanager' before visiting these routes
// Route::group(['before' => 'auth|financialmanager'], function(){

	// Route::post('user/delete', 'MasterUserController@postUserCleanup');

// });

# rest api routes, requires api token auth
Route::group(array('prefix' => 'api', 'before' => 'auth.token'), function() {

	# add routes below inside this group
});

# testing api routes before adding to above route group
Route::resource('users', 'UserController');
Route::resource('groups', 'UserGroupController');
