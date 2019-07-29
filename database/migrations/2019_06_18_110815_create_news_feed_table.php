<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsFeedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news_feed', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('title');

			$table->text('description');

			$table->integer('created_by');
            $table->integer('updated_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news_feed');
	}

}
