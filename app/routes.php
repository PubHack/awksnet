<?php

Route::get('/', array(
	'as' 	=> 'home',
	'uses' 	=> 'HomeController@feed'
));

Route::get('/latest', array(
	'as' 	=> 'home',
	'uses' 	=> 'HomeController@latest'
));

Route::get('/map', array(
	'as'	=> 'map',
	'uses'	=> 'HomeController@map'
));

Route::get('/situation/{id}', array(
	'as'	=> 'single',
	'uses'	=> 'HomeController@single'
));

Route::group(array('before' => 'guest'), function() {
	Route::get('/login', array(
		'as' 	=> 'login',
		'uses'	=> 'AuthController@login'
	));
	Route::post('/login', array(
		'as' 	=> 'login',
		'uses' 	=> 'AuthController@loginPost'
	));

	Route::get('/signup', array(
		'as' 	=> 'signup',
		'uses'	=> 'AuthController@signup'
	));
	Route::post('/signup', array(
		'as' 	=> 'signup',
		'uses' 	=> 'AuthController@signupPost'
	));
});

Route::group(array('before' => 'is_user'), function() {
	Route::get('/account', array(
		'as' 	=> 'update',
		'uses'  => 'AuthController@update'
	));

	Route::post('/account', array(
		'as' 	=> 'update',
		'uses'  => 'AuthController@updatePost'
	));

	Route::post('/add', array(
		'as' 	=> 'add',
		'uses' 	=> 'HomeController@add'
	));
});

Route::get('/logout', array(
	'as'	=> 'logout',
	'uses'	=> 'AuthController@logout'
));

Route::get('/voteup/{id}', array(
	'as' => 'voteup',
	'uses'	=> 'HomeController@voteup'
));

Route::get('/votedown/{id}', array(
	'as' => 'votedown',
	'uses'	=> 'HomeController@votedown'
));
