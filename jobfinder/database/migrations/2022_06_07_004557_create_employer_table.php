<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer', function (Blueprint $table) {
            $table->Increments('employer_id');
            $table->string('employer_name');
            $table->string('employer_username')->unique();
            $table->string('employer_password');
            $table->text('employer_address');
            $table->integer('employer_phone');   
            $table->text('employer_desc');
            $table->integer('employer_status')->default('1');
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
        Schema::dropIfExists('employer');
    }
}
