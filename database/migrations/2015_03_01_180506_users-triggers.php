<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTriggers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trigger_user', function(Blueprint $table) {
			$table->integer('trigger_id')->unsigned();
			$table->foreign('trigger_id')->references('id')->on('triggers');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trigger_user');
	}

}
