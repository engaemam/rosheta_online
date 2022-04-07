<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_status');
            $table->integer('to_status');
            $table->integer('seen')->default(0);
            $table->string('subject');
            $table->text('body');
            $table->integer('doctor_id')->unsigned()->index()->nullable();
            $table->integer('patient_id')->unsigned()->index()->nullable();  
            $table->integer('pharmacist_id')->unsigned()->index()->nullable();
            $table->foreign('pharmacist_id')->references('id')->on('pharmacists')->onDelete('cascade');          
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
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
        Schema::dropIfExists('messages');
    }
}
