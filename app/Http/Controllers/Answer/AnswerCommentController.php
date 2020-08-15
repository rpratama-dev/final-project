<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer\AnswerComment; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswerCommentController extends Controller
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
        $this->validasi($request);
        AnswerComment::create([
            'comment' => $request->answ_comment,
            'user_id' => Auth::user()->id,
            'answer_id' => $request->answer_id,  
        ]);

        return redirect(route('question.show', ['question' => $request->question_id]))->with('success','Comment submited');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnswerComment  $answerComment
     * @return \Illuminate\Http\Response
     */
    public function show(AnswerComment $answerComment)
    { 
        
    }

    public function getCommentAnswer($id){
        $answer_comments = DB::table('answer_comments') 
            ->leftJoin('users', 'answer_comments.user_id', '=', 'users.id')
            ->selectRaw('answer_comments.*, users.name')
            ->where('answer_comments.answer_id','=', $id)
            ->groupBy('answer_comments.id')
            ->get(); 
        return $answer_comments;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnswerComment  $answerComment
     * @return \Illuminate\Http\Response
     */
    public function edit(AnswerComment $answerComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnswerComment  $answerComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnswerComment $answerComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnswerComment  $answerComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnswerComment $answerComment)
    {
        //
    }


    // Function Validasi
    private function validasi($request){
        $rules = [
            'answ_comment' => 'required|max:255', 
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field is max: 255 char'
        ];

        $request->validate($rules, $customMessages);
    }
}
