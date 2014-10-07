<?php

/**
 * Authentication controller
 */
class AuthController extends BaseController {

    // rules for all auth stuff
    private $loginRules = array(
        'username' => 'required|exists:users',
        'password' => 'required'
    );

    private $signupRules = array(
        'username' => 'required|unique:users',
        'email'    => 'required|email',
        'password' => 'required',
        'city'     => 'required'
    );

    public function login()
    {
        return View::make('login');
    }

    public function signup()
    {
        return View::make('signup');
    }

    public function loginPost()
    {
        $validator  = Validator::make(Input::all(), $this->loginRules);
        $username   = Input::get('username');
        $password   = Input::get('password');

        if($validator->fails()) {
            return Redirect::to('login')->withErrors($validator);
        }

        $attempt = Auth::attempt(array('username' => $username, 'password' => $password));

        if($attempt) {
            return Redirect::intended('home');
        }

        return Redirect::to('login')->withErrors(array('Username or password is incorrect'));
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
            return Redirect::to('signup')->withErrors($validator);
        }

        $user->save();
        Auth::login($user);
        return Redirect::intended('home');
    }

    public function logout()
    {
        Auth::logout();
    }
}
