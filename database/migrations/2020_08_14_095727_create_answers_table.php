<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('answer');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->nullable()->constrained()->onDelete('cascade'); 
            $table->foreign('question_id')->references('id')->on('questions')->nullable()->constrained()->onDelete('cascade'); 
            
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
        Schema::dropIfExists('answers');
    }
}
