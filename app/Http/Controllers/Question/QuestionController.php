<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question\Question; 
use App\Models\Question\QuestionHasTag; 
use App\Models\Question\Tag; 
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
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
        //$questions = Question::all()->sortByDesc("id");
        $questions = DB::table('questions')
            ->leftJoin('answers', 'questions.id', '=', 'answers.question_id')
            ->leftJoin('users', 'questions.user_id', '=', 'users.id')
            ->selectRaw('questions.*, users.name, users.photo_dir, users.point_reputasi, count(answers.question_id) as answer_count')
            ->groupBy('questions.id')
            ->get();   
        /* 
        $questions = DB::table('questions')
            ->select(DB::raw('questions.*, count(answers.question_id) as answer_count'))
            ->join('answers', 'questions.id', '=', 'answers.question_id') 
            ->get();*/

        return view('questions.index', ['questions' => $questions])
            ->with('page', 'Top Question'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question) 
    {
        //dd($question);
        return view('questions.show', ["question" => $question,])
            ->with('page', 'Detail Question'); ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
