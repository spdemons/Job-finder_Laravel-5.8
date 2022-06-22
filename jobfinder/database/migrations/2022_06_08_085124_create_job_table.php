<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->Increments('job_id');
            $table->integer('category_id');
            $table->integer('employer_id');
            $table->string('job_name');
            $table->integer('job_quantity');
            $table->string('job_salary');
            $table->string('job_desc');
            $table->string('job_requirement');
            $table->integer('job_status');
            $table->integer('province_id');
            $table->timestamp('job_createday')->useCurrent();
            $table->date('job_closeday');
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
        Schema::dropIfExists('job');
    }
}
