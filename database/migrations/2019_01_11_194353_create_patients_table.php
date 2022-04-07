<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pid');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->default('patient.png'); 
            $table->integer('gender')->default(1);
            $table->integer('age');
            $table->string('country');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->text('summary');
            $table->rememberToken();
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
        Schema::dropIfExists('patients');
    }
}
