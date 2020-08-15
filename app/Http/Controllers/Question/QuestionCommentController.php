<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Question\QuestionComment; 
use Illuminate\Support\Facades\Auth;

class QuestionCommentController extends Controller
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
        QuestionComment::create([
            'comment' => $request->ques_comment,
            'user_id' => Auth::user()->id,
            'question_id' => $request->question_id,

        ]);
        return redirect(route('question.show', ['question' => $request->question_id]))->with('success','Comment submited')->with('alert',"success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionComment  $questionComment
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionComment $questionComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionComment  $questionComment
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionComment $questionComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionComment  $questionComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionComment $questionComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionComment  $questionComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionComment $questionComment)
    {
        //
    }

    // Function Validasi
    private function validasi($request){
        $rules = [
            'ques_comment' => 'required|max:255', 
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field is max: 255 char'
        ];

        $request->validate($rules, $customMessages);
    }
}
