<?php

/**
 * @author robin hood <fordarnold@gmail.com>
 */
class MasterUserController extends BaseController
{
    /**
     * Test function for displaying a User registration form.
     * @return View Returns a Laravel view
     */
    public function getRegister()
    {
        return View::make('auth.register');
    }

    /**
     * Test function for displaying a User login form.
     * @return View Returns a Laravel view
     */
    public function getLogin()
    {
        return View::make('auth.login');
    }

    /**
     * Attempt user registration.
     * @return json Returns JSON response
     */
    public function postRegister()
    {
        try {
            $user = Sentry::createUser(array(
                'first_name' => Input::get('first_name'),
                'last_name' => Input::get('last_name'),
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'activated' => true,
                ));

            // Assign user to group
            $group_name = Input::get('group_name');
            $userGroup = Sentry::getGroupProvider()->findByName($group_name);
            $user->addGroup($userGroup);

            // Assign user to depot

            $array = array(
                'success' => 1,
                'message' => 'User registered successfully as ' . $group_name,
                'next_action' => 'get route users/employees',
                'error' => 0
                );
            return Response::json($array);

        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e){

            $array = array('message' => 'Email/username is required', 'error' => 1);
            return Response::json($array);
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e){

            $array = array('message' => 'A password is required', 'error' => 1);
            return Response::json($array);
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e){

            $array = array('message' => 'The user already exists', 'error' => 1);
            return Response::json($array);
        }
        catch (Cartalyst\Sentry\Users\GroupNotFoundException $e){

            $array = array('message' => 'The specified User Group was not found', 'error' => 1);
            return Response::json($array);
        }
        catch (Exception $e){

            $array = array('message' => $e->getMessage(), 'error' => 1);
            return Response::json($array);
        }
    }

    /**
     * Attempt user login
     * @return json Returns JSON response
     */
    public function postLogin()
    {
        // Cache user login details
        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
            );

        // Attempt login
        try {
            $user = Sentry::authenticate($credentials, false);

            return Response::json(array(
                'success' => 1,
                'message' => 'User logged in successfully',
                'next_action' => 'get route app/welcome',
                'error' => 0,
                'user' => $user->toArray()
                ));
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e){
            $array = array('message' => 'Email/username is required', 'error' => 1);
            return Response::json($array);
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e){
            $array = array('message' => 'Password is required', 'error' => 1);
            return Response::json($array);
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
            $array = array('message' => 'The user was not found', 'error' => 1);
            return Response::json($array);
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e){
            $array = array(
                'message' => 'Wrong password was entered. Please try again.',
                'error' => 1
                );
            return Response::json($array);
        }
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e){
            $array = array(
                'message' => 'This user account has been suspended by the system, because of too many login attempts. Contact your system admin.',
                'error' => 1
                );
            return Response::json($array);
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e){
            $array = array(
                'message' => 'This user account has been banned by the system, because of too many login violations. Contact your system admin.',
                'error' => 1
                );
            return Response::json($array);
        }
        catch (Exception $e){
            $array = array('message' => $e->getMessage(), 'error' => 1);
            return Response::json($array);
        }
    }

    /**
     * Logout of the app
     * @return route Redirect to Login page
     */
    public function logout()
    {
        Sentry::logout();
        return Redirect::to('user/login'); // with message
    }


    /**
    * Displays currently logged-in user
    * @return route Redirect to Login page
    */
    public function getCurrentUser()
    {
      try{
        $user = Sentry::getUser();
        $token = $user->token()->where('client',BrowserDetect::toString())->first();

        return Response::json(array('user' => $user->toArray(), 'token' => $token->toArray(), 'error' => 0));
      }
      catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
        $array = array('message' => 'The user was not found', 'error' => 1);
        return Response::json($array);
      }
      catch (Exception $e){
        $array = array('message' => $e->getMessage(), 'error' => 1);
        return Response::json($array);
      }
    }

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

    /**
     * @method login
     * $params GET or POST array('email'=> 'email@domain.com', 'password' => 'password')
     */
    public function login()
    {
        try {
            $user = Sentry::authenticate(Input::all(), false);
            $token = hash('sha256', Str::random(10), false);
            $user->api_token = $token;
            $user->save();

            return Response::json(array('token' => $token, 'user' => $user->toArray()));

        } catch (Exception $e) {
            App::abort(404, $e->getMessage());
        }
    }
}
