<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = ['judul','isi', 'tag', 'user_id'];
}
