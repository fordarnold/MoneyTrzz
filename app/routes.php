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

/**
 * Auth Routes
 * @author robin hood <fordarnold@gmail.com>
 */

# Login
Route::get('user/login', 'MasterUserController@getLogin');
Route::post('user/login', 'MasterUserController@postLogin');

# Logout
Route::get('user/logout', 'MasterUserController@logout');

# Register
Route::get('user/register', 'MasterUserController@getRegister');
Route::post('user/register', 'MasterUserController@postRegister');

# Authenticate user before visiting these routes
// Route::group(['before' => 'auth'], function(){

	# Every logged-in user gets to:
	#
	# Update his/her account
	Route::get('user/update', 'MasterUserController@getUserUpdate');
	Route::post('user/update', 'MasterUserController@postUserUpdate');

	#


// }

# Authenticate user as 'master' before visiting these routes
// Route::group(['before' => 'auth|master'], function(){

	# ONLY master users can:
	#
	# Register user as 'financialmanager'
	Route::get('user/register/financialmanager', 'OtherUserController@getFinancialManagerRegister');
	Route::post('user/register/financialmanager', 'OtherUserController@postFinancialManagerRegister');

	# Delete user
	Route::get('user/delete', 'MasterUserController@getUserCleanup');
	Route::post('user/delete', 'MasterUserController@postUserCleanup');

// }

# Authenticate user as 'financialmanager' before visiting these routes
// Route::group(['before' => 'auth|financialmanager'], function(){

	// Route::post('user/delete', 'MasterUserController@postUserCleanup');

// }

# REST API routes (testing API token auth)
// Route::group(array('prefix' => 'api', 'before' => 'auth.token'), function() {

	// API token auth test route '/api'
	Route::get('/', function() {
		return Response::json(array('success' => 1, 'message' => 'Congratulations, you got a shiny new API token.', 'error' => 0));
	});

	// Testing (errors still)
	Route::get('users/groups', 'UserController@showWelcome');
// });
