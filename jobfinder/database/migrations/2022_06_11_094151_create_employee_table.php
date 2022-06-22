<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->Increments('employee_id');
            $table->string('employee_email')->unique();
            $table->string('employee_password');
            $table->string('employee_name');
            $table->string('employee_phone')->nullable();
            $table->date('employee_dob')->nullable();
            $table->Integer('employee_gender')->nullable();
            $table->Integer('employee_status')->default('1');
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
        Schema::dropIfExists('employee');
    }
}
