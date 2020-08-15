<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question\VoteQuestion; 
use App\Models\Question\Question;
use App\User;
use Illuminate\Support\Facades\Auth;

class VoteQuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']); 
    }

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

        // If there's a flight from Oakland to San Diego, set the price to $99.
        // If no matching model exists, create one.
        $vote = VoteQuestion::where('user_id', '=',  Auth::user()->id)
                    ->where('question_id', '=',  $request->question_id)
                    ->get();

        if (count($vote) > 0){
            return redirect(route('question.show', ['question' => $request->question_id]))->with('success','hanya bisa vote satu kali')->with('alert', "warning");
        }

        $vote = VoteQuestion::updateOrCreate(
            ['user_id' => Auth::user()->id, 'question_id' => $request->question_id],
            ['status' => $request->status]
        );

        if ($request->status == 1) {
            Question::find($request->question_id)->increment('votes'); 
            if ($user_id != Auth::user()->id) {
                User::find($user_id)->increment('point_reputasi', 10);  
            }
        }else{ 
            Question::find($request->question_id)->decrement('votes'); 
            if ($user_id != Auth::user()->id) {
                User::find($user_id)->decrement('point_reputasi', 1);  
            }
        }

        return redirect(route('question.show', ['question' => $request->question_id]))
            ->with('success','Vote updated')->with('alert','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VoteQuestion  $voteQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(VoteQuestion $voteQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VoteQuestion  $voteQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(VoteQuestion $voteQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VoteQuestion  $voteQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoteQuestion $voteQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VoteQuestion  $voteQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoteQuestion $voteQuestion)
    {
        //
    }

    public function count_vote($question_id)
    {  
        $vote = Question::find($question_id);
        //dd($vote);
        return $vote->votes;
    }
}
