<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class VoteQuestion extends Model
{
    protected $fillable = ['status','user_id','question_id'];
}
