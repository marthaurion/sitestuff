<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplaceUserIdCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->dropForeign('comments_user_id_foreign');
            $table->dropColumn('user_id');
            $table->integer('commenter_id')->unsigned()->default('1');
            $table->foreign('commenter_id')->references('id')->on('commenters')
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
		Schema::table('comments', function(Blueprint $table)
		{
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->dropForeign('comments_commenter_id_foreign');
            $table->dropColumn('commenter_id');
		});
	}

}
