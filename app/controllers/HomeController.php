<?php

class HomeController extends BaseController {

	public function feed()
	{
		$situations = Situation::all();
		return View::make('index', array('situations' => $situations));
	}

	public function single($id)
	{
		$situation = Situation::find($id);
		return View::make('pages.single', array('situation' => $situation));
	}

	public function map()
	{
		$situations = DB::table('situations')
                    ->orderBy('upvotes', 'desc')
					->take(100)
                    ->get();
		$locations = array();
		return View::make('pages.map', array(
			'locations' => $locations
		));
	}

}
