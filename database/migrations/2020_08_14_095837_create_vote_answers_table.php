<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoteAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('answer_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->nullable()->constrained()->onDelete('cascade'); 
            $table->foreign('answer_id')->references('id')->on('answers')->nullable()->constrained()->onDelete('cascade'); 
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
        Schema::dropIfExists('vote_answers');
    }
}
