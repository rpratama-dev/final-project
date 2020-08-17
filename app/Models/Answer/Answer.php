<?php

namespace App\Models\Answer;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer','user_id', 'question_id'];

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

    /**
     * Get the comment for the question.
     */
    public function comment()
    {
        return $this->hasMany('App\Models\Answer\AnswerComment');
    }
}
