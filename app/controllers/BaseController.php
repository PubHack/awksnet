<?php

class BaseController extends Controller {

	public function __construct()
	{
		// Add csrf filter to anything which passes data to the server
		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));

		// Share the user info with any view if theres a login
		if(Auth::check()) {
			$this->user = Auth::user();
			View::share('user', $this->user);
		}
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if(!is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
