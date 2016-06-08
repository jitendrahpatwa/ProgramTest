<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->string('title', 100);
			$table->text('desc');
			$table->date('datetime');
			$table->string('time');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post', function(Blueprint $table)
		{
			//
		});
	}

}
