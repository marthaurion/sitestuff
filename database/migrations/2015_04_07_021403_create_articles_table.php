<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->string('slug')->unique();
			$table->text('body');
			$table->text('excerpt')->nullable();
			$table->timestamps();
			$table->timestamp('published_at');
			$table->integer('cat_id')->unsigned();

			$table->foreign('user_id')->references('id')->on('users')
				  ->onDelete('cascade');
			$table->foreign('cat_id')->references('id')->on('categories')
				  ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
