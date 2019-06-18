<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsFeedImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news__feed_images', function(Blueprint $table)
		{

			$table->increments('id');
			$table->integer('news_feed_id');
			$table->string('image_path');

			$table->integer('created_by');
			$table->integer('updated_by')->nullable();
			$table->softDeletes();
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
		Schema::drop('news_images');
	}

}
