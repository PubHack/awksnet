<?php

/**
 * User model
 */
class User extends Eloquent {

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
		'updated_at',
		'city'
	);


	/**
	 * Add relationship all situations
	 */
	public function situations() {
		return $this->hasMany('Situation');
	}
}
