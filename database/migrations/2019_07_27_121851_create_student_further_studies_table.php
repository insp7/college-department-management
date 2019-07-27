<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFurtherStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_further_studies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('hasOpted')->default('0');
            $table->text('type')->nullable();
            $table->boolean('hasGiven');
            $table->text('obtained')->nullable();
            $table->text('outof')->nullable();
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
        Schema::dropIfExists('student_further_studies');
    }
}
