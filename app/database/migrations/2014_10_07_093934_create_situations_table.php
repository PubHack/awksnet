<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSituationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('situations', function($t) {
			$t->increments('id');
			$t->text('body');
			$t->integer('upvotes');
			$t->integer('downvotes');
			$t->timestamps();
			$t->integer('user_id')->unsigned();
			$t->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('situations');
	}

}
