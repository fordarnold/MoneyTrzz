<?php

/**
 * Manages master user accounts
 * @author robin hood <fordarnold@gmail.com>
 */
class MasterUserController extends \BaseController
{
  /**
   * Display a User registration form.
   * @return View Laravel view
   */
  public function getRegister()
  {
    return View::make('user.register');
  }

  /**
   * Display a User login form.
   * @return View Laravel view
   */
  public function getLogin()
  {
    return View::make('user.login');
  }

  /**
   * Create a new user account.
   * @return Response JSON object
   */
  public function postRegister()
  {
    try {

      # attempt creation of user
      $user = Sentry::createUser([
        'first_name' => Input::get('first_name'),
        'last_name' => Input::get('last_name'),
        'email' => Input::get('email'),
        'password' => Input::get('password'),
        // 'password_confirmation' => Input::get('password_confirmation'),
        'activated' => true,
        ]);

      # assign user to default group
      $userGroup = Sentry::getGroupProvider()->findByName('Master');
      $user->addGroup($userGroup);

      # return success message
      return Response::json([
        'success' => 1,
        'error' => 0,
        'message' => $user->first_name . ' has been registered successfully',
        'next_action' => 'GET route /users to see all existing users',
        'user' => $user
        ]);
    }

    catch (Cartalyst\Sentry\Users\LoginRequiredException $e){
      return Response::json(['message' => 'Email/username is required', 'error' => 1]);
    }
    catch (Cartalyst\Sentry\Users\PasswordRequiredException $e){
      return Response::json(['message' => 'Password is required', 'error' => 1]);
    }
    catch (Cartalyst\Sentry\Users\UserExistsException $e){
      return Response::json(['message' => 'The user already exists', 'error' => 1]);
    }
    catch (Cartalyst\Sentry\Users\GroupNotFoundException $e){
      return Response::json(['message' => 'The requested User Group was not found', 'error' => 1]);
    }
    catch (Exception $e){
      return Response::json(['message' => $e->getMessage(), 'error' => 1]);
    }
  }

  /**
   * Start a new session for user
   * @return json JSON object
   */
  public function postLogin()
  {
    # cache user login details
    $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];

    # attempt login
    try {

      $user = Sentry::authenticate($credentials, false);

      return Response::json([
        'success' => 1,
        'message' => $user->first_name . ' logged in successfully',
        'next_action' => 'GET route /users/' . $user->id . ' to see details of the logged-in user',
        'error' => 0,
        'user_account' => $user->toArray()
        ]);
    }

    catch (Cartalyst\Sentry\Users\LoginRequiredException $e){
      return Response::json(['message' => 'Email/username is required', 'error' => 1], 412);
    }
    catch (Cartalyst\Sentry\Users\PasswordRequiredException $e){
      return Response::json(['message' => 'Password is required', 'error' => 1], 412);
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
      return Response::json(['message' => 'The user was not found', 'error' => 1], 404);
    }
    catch (Cartalyst\Sentry\Users\WrongPasswordException $e){
      return Response::json(['message' => 'Wrong password was entered. Please try again.', 'error' => 1], 412);
    }
    catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e){
      return Response::json([
        'message' => 'User suspended by the system, because of too many login attempts. Contact the system admin.', 
        'error' => 1
        ]);
    }
    catch (Cartalyst\Sentry\Throttling\UserBannedException $e){
      return Response::json([
        'message' => 'User banned by the system, because of too many login violations. Contact the system admin.', 
        'error' => 1
        ]);
    }
    catch (Exception $e){
      return Response::json(['message' => $e->getMessage(), 'error' => 1]);
    }
  }

  /**
  * Logout confirmation page
  * @return View Laravel view
  */
  public function getLogout()
  {
    return View::make('user.logout');
  }

  /**
   * Close user sessions
   * @return json JSON object
   */
  public function doLogout()
  {
    # cache user's email
    $user = Sentry::getUser();

    # if no user session
    if(is_null($user))
      return Response::json(['message' => 'Sorry, there is no active user session at the moment.', 'error' => 1], 404);

    # close the currently running user session
    Sentry::logout();

    # return a success message
    return Response::json([
      'success' => 1,
      'message' => 'User, ' . $user->email . ', logged out successfully',
      'next_action' => 'GET route /user/login or Go back to home page at route /',
      'error' => 0
      ]);
  }

  /**
  * Display currently logged-in user
  * @return json JSON object
  */
  public function getCurrentUser()
  {
    try{

      $user = Sentry::getUser();

      if (is_null($user))
        return Response::json(['message' => 'There is no logged-in user at the moment', 'error' => 1], 404);

      # get user's api token
      $token = $user->token()->where('client',BrowserDetect::toString())->first();
      # return logged-in user details
      return Response::json(['user' => $user->toArray(), 'token' => $token->toArray(), 'error' => 0]);
    }

    catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
      return Response::json(['message' => 'The user was not found', 'error' => 1]);
    }
    catch (Exception $e){
      return Response::json(['message' => $e->getMessage(), 'error' => 1]);
    }
  }

    /**
    * Test function for displaying a User registration form.
    * @return View Returns a Laravel view
    */
    public function getUserUpdate()
    {
      return View::make('user.update');
    }

    /**
    * Test function for displaying a User registration form.
    * @return View Returns a Laravel view
    */
    public function postUserUpdate()
    {
      // update user account details
      
      // save changes to database
      
      // redirect to user/account
    }

    /**
    * Test function for displaying a User registration form.
    * @return View Returns a Laravel view
    */
    public function getUserCleanup()
    {
      return View::make('user.delete');
    }

    /**
    * Delete user account
    * @return View Returns a Laravel view
    */
    public function postUserCleanup()
    {
      // Soft Delete from database

      // redirect to login page
      return Redirect::to('user/login')->withErrors('Hello');
    }

    /**-------------------------
     * User Groups
     * -------------------------
     */

    /**
     * Return all user groups
     * @return json JSON response
     */
    public function getUserGroups()
    {
        $groups = Sentry::findAllGroups();
        return $groups;
    }

    /**
     * Create new user group
     * @return json JSON response
     */
    public function postUserGroups()
    {
        try{
            // create new group
            $group = Sentry::getGroupProvider()->create(array(
                'name'        => Input::get('group_name'),
                'permissions' => array(Input::get('permissions') => 1),
            ));

            $array = array(
                'message' => 'Group created successfully',
                'error' => 1
                );
            return Response::json($array);

        }
        catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
        {
            $array = array(
                'message' => 'Group Name is required',
                'error' => 1
                );
            return Response::json($array);
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
        {
            $array = array(
                'message' => 'Group already exists',
                'error' => 1
                );
            return Response::json($array);
        }
        catch (Exception $e){
            $array = array('message' => $e->getMessage(), 'error' => 1);
            return Response::json($array);
        }
    }
}
