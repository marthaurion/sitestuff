<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddModerationToCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->boolean('approved');
		});

        Schema::table('commenters', function(Blueprint $table)
        {
            $table->boolean('approved');
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
			$table->dropColumn('approved');
		});

        Schema::table('commenters', function(Blueprint $table)
        {
            $table->dropColumn('approved');
        });
	}

}
