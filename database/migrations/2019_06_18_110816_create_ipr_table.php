<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIprTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ipr', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('staff_id');
			$table->string('year');
			$table->integer('patents_published_count');
			$table->integer('patents_granted_count');
            $table->text('additional_columns');

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
		Schema::drop('ipr');
	}

}
