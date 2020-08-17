<?php

namespace App\Models\Answer;

use Illuminate\Database\Eloquent\Model;

class AnswerComment extends Model
{
    protected $fillable = ['comment','user_id', 'answer_id'];

    /**
     * Get the answer that question.
     */
    public function answer()
    {
        return $this->belongsTo('App\Models\Answer\Answer');
    }

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
