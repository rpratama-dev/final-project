<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul', 255);
            $table->longText('isi');
            $table->string('tag', 255); 
            $table->integer('votes')->unsigned()->nullable(); 
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('jawaban_terbaik_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable()->constrained()->onDelete('cascade'); 

         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('questions');
    }
}
