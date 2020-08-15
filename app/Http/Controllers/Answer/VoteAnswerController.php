<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer\VoteAnswer; 
use App\Models\Answer\Answer; 
use App\User; 
use Illuminate\Support\Facades\Auth;

class VoteAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer_id = $request->input('answer_ids');
        $status = $request->input('vote_status');
        $question_id = $request->input('question_id');
        $user_id = $request->input('user_id');

        $vote = VoteAnswer::where('user_id', '=',  Auth::user()->id)
                    ->where('answer_id', '=',  $answer_id)
                    ->get();

        //dd($answer_id);

        if (count($vote) > 0){
            return redirect(route('question.show', ['question' => $question_id]))
                    ->with('success','hanya bisa vote satu kali')
                    ->with('alert', "warning");
        }

        $vote = VoteAnswer::updateOrCreate(
            ['user_id' => Auth::user()->id, 'answer_id' => $answer_id],
            ['status' => $status]
        );

        if ($request->status == 1) {
            Answer::find($answer_id)->increment('votes'); 
            if ($user_id != Auth::user()->id) {
                User::find($user_id)->increment('point_reputasi', 10);  
            }
        }else{ 
            Answer::find($answer_id)->decrement('votes'); 
            if ($user_id != Auth::user()->id) {
                User::find($user_id)->decrement('point_reputasi', 1);  
            }
        }

        return redirect(route('question.show', ['question' => $question_id]))
            ->with('success','Vote updated')->with('alert','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VoteAnswer  $voteAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(VoteAnswer $voteAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VoteAnswer  $voteAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(VoteAnswer $voteAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VoteAnswer  $voteAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoteAnswer $voteAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VoteAnswer  $voteAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoteAnswer $voteAnswer)
    {
        //
    }


    public function count_vote($answer_id)
    {  
        $vote = Answer::find($answer_id);
        //dd($vote);
        return $vote->votes;
    }
}
