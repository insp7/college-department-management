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
		Schema::create('news_feed_images', function(Blueprint $table)
		{

			$table->increments('id');

			$table->unsignedBigInteger('news_feed_id');
			$table->foreign('news_feed_id')
                ->references('id')
                ->on('news_feed')
                ->onDelete('cascade');
			$table->string('image_path');

			$table->integer('created_by')->nullable();
//			$table->integer('updated_by')->nullable();
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
		Schema::drop('news_feed_images');
	}

}
