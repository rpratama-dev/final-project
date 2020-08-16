<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = ['judul','isi', 'tag', 'user_id'];

	/**
     * Get the best answer record associated with the question.
     */
    public function getx()
    {
    	//return $this->hasOne('App\Models\Answer\Answer');
    	//return $this->belongsTo('App\Models\Answer\Answer', 'id')->where('jawaban_terbaik_id', 1)->first();
        //return $this->hasOne('App\Models\Answer\Answer');
    }
}
