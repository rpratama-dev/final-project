<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{ 
    protected $fillable = ['comment','user_id', 'question_id'];
}
