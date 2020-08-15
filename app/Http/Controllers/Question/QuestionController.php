<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question\Question; 
use App\Models\Question\QuestionHasTag;  
use App\Models\Question\Tag; 
use Illuminate\Support\Facades\DB;
use App\User; 

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
        $this->validasi($request);
        
        //dd($request->input('tags')); //print value as array
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question) 
    {
        // Retrieve a model by its primary key...
        $user = User::find($question->user_id);
        $question_comments = DB::table('question_comments') 
            ->leftJoin('users', 'question_comments.user_id', '=', 'users.id')
            ->selectRaw('question_comments.*, users.name')
            ->where('question_comments.question_id','=', $question->id)
            ->groupBy('question_comments.id')
            ->get();

        //dd($question_comments);
        return view('questions.show', ["question" => $question, "user" => $user, 'question_comments' => $question_comments])
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

    // Function Validasi
    private function validasi($request){
        $rules = [
            'title' => 'required|max:255',
            'question' => 'required',
            'tags' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field is max: 255 char'
        ];

        $request->validate($rules, $customMessages);
    }
}
