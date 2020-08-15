<?php

namespace App\Models\Answer;

use Illuminate\Database\Eloquent\Model;

class AnswerComment extends Model
{
    protected $fillable = ['answer','user_id', 'question_id'];
}
