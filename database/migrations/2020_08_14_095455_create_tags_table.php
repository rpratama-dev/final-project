<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Question\Tag; 

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag_name', 100);
            $table->timestamps();
        });
        
        $request = ['Laravel', 'PHP', 'HTML', 'JavaScript', 'CSS', 'Blade', 'React.JS'];

        foreach ($request as $value) { 
            $tag = Tag::updateOrCreate( 
                        ['tag_name' => $value] 
                    );
        } 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tags');
    }
}
