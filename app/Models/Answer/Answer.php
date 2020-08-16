<?php

namespace App\Models\Answer;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer','user_id', 'question_id'];

    public function question()
	{
	    //return $this->belongsTo('App\Models\Question\Question', 'jawaban_terbaik');
	}
}
