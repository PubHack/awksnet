<?php

/**
 * Authentication controller
 */
class AuthController extends BaseController {

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

    }

    public function signupPost()
    {

    }

    public function logout()
    {

    }
}
