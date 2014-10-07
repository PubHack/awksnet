<?php

Route::get('/', array(
	'as' 	=> 'home',
	'uses' 	=> 'HomeController@feed'
));

Route::get('/map', array(
	'as'	=> 'map',
	'uses'	=> 'HomeController@map'
));

Route::get('/situation/{id}', array(
	'as'	=> 'single',
	'uses'	=> 'AuthController@single'
));

Route::group(array('before' => 'guest'), function() {
	Route::get('/login', array(
		'as' 	=> 'login',
		'uses'	=> 'AuthController@login'
	));

	Route::get('/signup', array(
		'as' 	=> 'signup',
		'uses'	=> 'AuthController@signup'
	));
});

Route::get('/account/{id}', array(
	'as' 	=> 'update',
	'uses'  => 'AuthController@update'
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

Route::post('/account/{id}', array(
	'as' 	=> 'update',
	'uses'  => 'AuthController@updatePost'
));
