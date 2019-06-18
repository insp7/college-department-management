<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('middle_name');
			$table->string('last_name');
			$table->bigInteger('contact_no');
			$table->date('date_of_birth');
			$table->integer('roll_no');
			$table->integer('current_year'); // why is this boolean
			$table->integer('current_semester'); // // why is this boolean
			$table->date('year_of_admission');
			$table->date('expected_year_of_passing');
			$table->string('status');
			$table->string('email');
			$table->string('password');
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
		Schema::drop('students');
	}

}
