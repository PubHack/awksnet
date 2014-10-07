<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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
		return 'http://www.gravatar.com/avatar/' . md5($this->email);
	}
}
