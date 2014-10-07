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
			'email' 	=> 'shout@jakecleary.net',
			'password' 	=> Hash::make('jake'),
			'city'		=> 'Worthing'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I once had to present my app at a hackathon',
			'upvotes' 	=> 84300,
			'downvotes' => 239,
			'user_id' 	=> $jake->id
		));

		$craig = User::create(array(
			'username' 	=> 'craig',
			'email' 	=> 'childscraig17@gmail.com',
			'password' 	=> Hash::make('craig'),
			'city'		=> 'Littlehampton'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I once had to work with Jake Cleary',
			'upvotes' 	=> 34123,
			'downvotes' => 89,
			'user_id' 	=> $craig->id
		));

		$john = User::create(array(
			'username' 	=> 'john',
			'email' 	=> 'john@example.com',
			'password' 	=> Hash::make('john'),
			'city'		=> 'East Preston'
		));

		$situation = Situation::create(array(
			'body' 		=> 'A girl once smiled at me.',
			'upvotes' 	=> 54,
			'downvotes' => 43,
			'user_id' 	=> $john->id
		));

		$steve = User::create(array(
			'username' 	=> 'steve',
			'email' 	=> 'steve@example.com',
			'password' 	=> Hash::make('steve'),
			'city'		=> 'East Preston'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I accidentally went to a pubhack in Portsmouth',
			'upvotes' 	=> 432,
			'downvotes' => 8,
			'user_id' 	=> $steve->id
		));

		$rebecca = User::create(array(
			'username' 	=> 'rebecca',
			'email' 	=> 'rebecca@example.com',
			'password' 	=> Hash::make('rebecca'),
			'city'		=> 'London'
		));

		$situation = Situation::create(array(
			'body' 		=> 'No one ever laughs at my jokes, apart from my cat',
			'upvotes' 	=> 2,
			'downvotes' => 8,
			'user_id' 	=> $rebecca->id
		));

		$jimmy = User::create(array(
			'username' 	=> 'jimmy',
			'email' 	=> 'jimmy@example.com',
			'password' 	=> Hash::make('jimmy'),
			'city'		=> 'Paris'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I once tripped over my own leg',
			'upvotes' 	=> 4,
			'downvotes' => 8,
			'user_id' 	=> $jimmy->id
		));

		$patrick = User::create(array(
			'username' 	=> 'patrick',
			'email' 	=> 'patrick@example.com',
			'password' 	=> Hash::make('patrick'),
			'city'		=> 'Tokyo'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I once had to talk to a human being for more than 5 seconds.',
			'upvotes' 	=> 42,
			'downvotes' => 128,
			'user_id' 	=> $patrick->id
		));

		$sophie = User::create(array(
			'username' 	=> 'sophie',
			'email' 	=> 'sophie@example.com',
			'password' 	=> Hash::make('sophie'),
			'city'		=> 'London'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I once sent a snapchat of my penis to my mum',
			'upvotes' 	=> 432,
			'downvotes' => 8211,
			'user_id' 	=> $sophie->id
		));

		$lemon = User::create(array(
			'username' 	=> 'lemon',
			'email' 	=> 'lemon@example.com',
			'password' 	=> Hash::make('lemon'),
			'city'		=> 'London'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I love eating puppy feet',
			'upvotes' 	=> 432,
			'downvotes' => 811,
			'user_id' 	=> $lemon->id
		));

		$robert = User::create(array(
			'username' 	=> 'robert',
			'email' 	=> 'robert@example.com',
			'password' 	=> Hash::make('robert'),
			'city'		=> 'London'
		));

		$situation = Situation::create(array(
			'body' 		=> 'I once took a girl on a date to the local tip',
			'upvotes' 	=> 2,
			'downvotes' => 8,
			'user_id' 	=> $robert->id
		));
	}

}
