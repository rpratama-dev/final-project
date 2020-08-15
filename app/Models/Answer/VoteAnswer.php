<?php

namespace App\Models\Answer;

use Illuminate\Database\Eloquent\Model;

class VoteAnswer extends Model
{
    protected $fillable = ['status','user_id','answer_id'];
}
