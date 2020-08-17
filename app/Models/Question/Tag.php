<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

   	protected $fillable = ['tag_name'];
    /**
     * The question that belong to the tag.
     */
    public function questions()
    {
        return $this->belongsToMany('App\Models\Question\Question', 'question_has_tags'); 
    }

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function questions_morp()
    {
        return $this->morphedByMany('App\Models\Question\Question', 'question_has_tag');
    }
}
