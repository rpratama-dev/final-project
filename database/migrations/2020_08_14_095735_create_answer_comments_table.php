<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('comment');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('answer_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('answer_id')->references('id')->on('answers')->nullable();
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
        Schema::dropIfExists('answer_comments');
    }
}
