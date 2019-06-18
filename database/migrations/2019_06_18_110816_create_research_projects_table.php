<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResearchProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('research_projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('staff_id');
			$table->string('principal_investigator');
			$table->string('grant_details');
			$table->string('title');
			$table->integer('amount');
			$table->date('year');

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
		Schema::drop('research_projects');
	}

}
