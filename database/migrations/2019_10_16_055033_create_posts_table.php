<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function (Blueprint $table) {
			$table->increments('id');
			// $table->unsignedInteger('user_id');
			$table->string('title');
			$table->integer('user_id')->unsigned();
			$table->string('description');
			$table->string('image');
			$table->integer('catagory_id')->unsigned();
			// $table->foreign('catagory_id')->references('id')->on('catagories')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::dropIfExists('post');
	}
}
