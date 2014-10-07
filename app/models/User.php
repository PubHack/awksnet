<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	use UserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * The attributes which are accessible
	 *
	 * @var array
	 */
	protected $fillable = array(
		'username',
		'email',
		'password',
		'city',
		'created_at',
		'updated_at'
	);


	/**
	 * Add relationship all situations
	 */
	public function situations()
	{
		return $this->hasMany('Situation');
	}

	/**
	 * Return the gravatar link
	 * @return String
	 */
	public function gravatar()
	{
		return 'http://www.gravatar.com/avatar/' . md5($this->email) . '?s=200';
	}

	public function getRememberToken()
	{
		return null; // not supported
	}

	public function setRememberToken($value)
	{
	// not supported
	}

	public function getRememberTokenName()
	{
		return null; // not supported
	}
}
