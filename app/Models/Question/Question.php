<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = ['judul','isi', 'tag', 'user_id'];

	/**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the answer for the question.
     */
    public function answer()
    {
        return $this->hasMany('App\Models\Answer\Answer');
    }

    /**
     * Get the comment for the question.
     */
    public function comment()
    {
        return $this->hasMany('App\Models\Question\QuestionComment');
    }

    /**
     * Get all of the tags for the post.
     * ManyToMany [question, tag, question_has_tag]
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Question\Tag', 'question_has_tags');
    }
 
}
