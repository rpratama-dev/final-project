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
}
