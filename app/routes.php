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
 * Public Routes
 * @author robin hood <fordarnold@gmail.com>
 */

# landing Page
Route::get('/', 'HomeController@showWelcome');

# legal pages
Route::get('legal/terms', function() { return View::make('legal.terms'); });
Route::get('legal/privacy', function() { return View::make('legal.privacy'); });

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

/**
 * Protected Routes
 * @author robin hood <fordarnold@gmail.com>
 */
# Authenticate user first
#Route::group(['before' => 'auth'], function(){

	# Every logged-in user gets to see:
	#
	# a custom dashboard
	Route::get('home', 'HomeController@getUserDashboard');
	
	# user account api
	Route::get('accounts/users/me/profile', 'UserAccountController@getProfile');
	Route::get('accounts/users/me/settings', 'UserAccountController@getSettings');

	# bank account api
	Route::get('accounts/banks/new', 'BankAccountsController@create');
	Route::resource('accounts/banks', 'BankAccountsController');

	# deposits api
	Route::resource('deposits', 'DepositsController');

	# withdrawals api
	Route::resource('withdrawals', 'WithdrawalsController');

	# currency api
	Route::resource('currencies', 'CurrenciesController');

#});

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

/**
 * Protected Routes (Sysadmin)
 * @author robin hood <fordarnold@gmail.com>
 */

# link a currency to a country
Route::get('currency/link/to/country', 'CurrenciesController@linkToCountry');
Route::post('currency/link/to/country', 'CurrenciesController@linkToCountry');
