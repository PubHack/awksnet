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
		$locations = DB::table('situations')
		 			->join('users', 'users.id', '=', 'situations.user_id')
                    ->orderBy('upvotes', 'desc')
					->take(100)
					->select(DB::raw('users.city, count(users.city) as count'))
					->groupBy('users.city')
                    ->get();

		return View::make('pages.map', array(
			'locations' => $locations
		));
	}

	public function add()
	{
		$body = Input::get('body');
	}

}
