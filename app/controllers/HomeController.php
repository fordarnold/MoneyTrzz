<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
	 * Landing page
	 * @return View a Laravel view
	 */
	public function showWelcome()
	{
		return View::make('hello');
	}

	/**
   * Show dashboard to logged-in user
   * @return View a Laravel view
   */
  public function getUserDashboard()
  {
  	if (Input::has('first_timer')) 
  		return View::make('dashboard_newbie');

  	return View::make('dashboard');
  }

}
