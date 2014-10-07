<?php

Route::get('/', array(
	'as' 	=> 'home',
	'uses' 	=> 'HomeController@feed'
));

Route::get('/map', array(
	'as'	=> 'map',
	'uses'	=> 'HomeController@map'
));

Route::get('/login', array(
	'as' 	=> 'login',
	'uses'	=> 'AuthController@login'
));

Route::get('/signup', array(
	'as' 	=> 'signup',
	'uses'	=> 'AuthController@signup'
));

Route::get('/logout', array(
	'as'	=> 'logout',
	'uses'	=> 'AuthController@logout'
));

Route::post('/login', array(
	'as' 	=> 'login-post',
	'uses' 	=> 'AuthController@loginPost'
));

Route::post('/signup', array(
	'as' 	=> 'signup-post',
	'uses' 	=> 'AuthController@signupPost'
));
