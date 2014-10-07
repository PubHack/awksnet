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

		$jake = User::create(array(
			'username' 	=> 'jake',
			'email' 	=> 'shout@cleary.net',
			'password' 	=> Hash::make('jake'),
			'city'		=> 'Worthing'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I am making a statement here',
			'upvotes' 	=> 1,
			'downvotes' => 20000,
			'user_id' 	=> $jake->id
		));

		$craig = User::create(array(
			'username' 	=> 'craig',
			'email' 	=> 'childscraig17@gmail.com',
			'password' 	=> Hash::make('craig'),
			'city'		=> 'Littlehampton'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I am making a better statement here',
			'upvotes' 	=> 10113,
			'downvotes' => 2,
			'user_id' 	=> $craig->id
		));
	}

}
