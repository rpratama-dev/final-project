<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{ 
    protected $fillable = ['comment','user_id', 'question_id'];

    /**
     * Get the question that post.
     */
    public function question()
    {
        return $this->belongsTo('App\Models\Question\Question');
    }

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}


