<?php

class HomeController extends BaseController {

	public function feed()
	{
		$situations = Situation::all();
		return View::make('index', array('situations' => $situations));
	}

	public function map()
	{
		return View::make('map');
	}

}
