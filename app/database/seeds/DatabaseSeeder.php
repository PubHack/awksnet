<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('users')->delete();
		DB::table('situations')->delete();

		$user = User::create(array(
			'username' 	=> 'user',
			'email' 	=> 'childscraig17@gmail.com',
			'password' 	=> Hash::make('hello'),
			'city'		=> 'Littlehampton'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I am making a statement here',
			'upvotes' 	=> 10,
			'downvotes' => 2,
			'user_id' 	=> $user->id
		));
	}

}
