<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class QuestionHasTag extends Model
{
    protected $fillable = ['question_id', 'tag_id'];

    
}
