<?php

/**
 * Authentication controller
 */
class AuthController extends BaseController {

    // Rules for login fields
    private $loginRules = array(
        'username' => 'required|exists:users',
        'password' => 'required'
    );

    // Rules for signup fields
    private $signupRules = array(
        'username' => 'required|unique:users',
        'email'    => 'required|email',
        'password' => 'required',
        'city'     => 'required'
    );

    // Rules for account editing fields
    private $profileRules = array(
        'username' => 'required',
        'email'    => 'required|email',
        'password' => 'required',
        'city'     => 'required'
    );

    public function login()
    {
        return View::make('auth.login');
    }

    public function signup()
    {
        return View::make('auth.signup');
    }

    public function update($id)
    {
        $user = Auth::user();
        return View::make('auth.update');
    }

    public function loginPost()
    {
        $validator  = Validator::make(Input::all(), $this->loginRules);
        $username   = Input::get('username');
        $password   = Input::get('password');

        if($validator->fails()) {
            return Redirect::to('/login')->withErrors($validator);
        }

        $attempt = Auth::attempt(array('username' => $username, 'password' => $password));

        if($attempt) {
            return Redirect::route('home');
        }

        return Redirect::to('/login')->withErrors(array('Username or password is incorrect'));
    }

    public function signupPost()
    {
        $user            = new User();
        $validator       = Validator::make(Input::all(), $this->signupRules);

        $user->username  = Input::get('username');
        $user->email     = Input::get('email');
        $user->city      = Input::get('city');
        $user->password  = Hash::make(Input::get('password'));

        if($validator->fails()) {
            return Redirect::to('/signup')->withErrors($validator);
        }

        $user->save();
        Auth::login($user);

        return Redirect::route('home');
    }

    public function updatePost()
    {
        $validator = Validator::make(Input::all(), $this->profileRules);

        if($validator->fails()) {
            return Redirect::route('account')->withErrors($validator);
        }

        $this->user->username   = Input::get('username');
        $this->user->password   = Input::get('password');
        $this->user->email      = Input::get('email');
        $this->user->city       = Input::get('city');
        $this->user->save();

        return View::make('auth.update');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }
}
