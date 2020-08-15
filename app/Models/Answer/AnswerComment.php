<?php

namespace App\Models\Answer;

use Illuminate\Database\Eloquent\Model;

class AnswerComment extends Model
{
    protected $fillable = ['comment','user_id', 'answer_id'];
}
