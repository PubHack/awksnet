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
					->select(DB::raw('users.city, count(users.city) as count, (sum(situations.upvotes) / sum(situations.downvotes)) as average'))
					->groupBy('users.city')
                    ->get();

		return $locations;

		return View::make('pages.map', array(
			'locations' => $locations
		));
	}

	public function add()
	{
		$validator = Validator::make(Input::all(), array(
			'body' => 'required'
		));

		$body = Input::get('body');

		if(!$validator->fails()) {
			$situation = new Situation;
			$situation->body = $body;
			$situation->upvotes = 0;
			$situation->downvotes = 0;
			$situation->user_id = $this->user->id;
			$situation->save();
			return Redirect::route('home');
		}

		return Redirect::to('/');
	}

}
