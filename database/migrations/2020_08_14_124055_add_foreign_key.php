<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //untuk menambahkan foreign key dengan migration
        Schema::table('questions', function (Blueprint $table) { 
            $table->foreign('jawaban_terbaik_id')->references('id')->on('answers')->nullable()->constrained()->onDelete('cascade'); 
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
