<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_internships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');

            $table->date('start_date');
            $table->date('end_date');

            $table->boolean('is_paid')->default(0);

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
        Schema::dropIfExists('student_internships');
    }
}
