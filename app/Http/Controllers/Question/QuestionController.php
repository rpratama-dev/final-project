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
        //$this->validasi($request);
        
        //dd($request); //print value as array

        $user = auth()->user();
        $query = DB::table('questions') -> insert([
            'judul' => $request['title'], 
            'isi' => $request['question'],
            'tag' => $request['tags'][0],
            'created_at' => $ldate = date('Y-m-d H:i:s'),
            'updated_at' => $ldate = date('Y-m-d H:i:s'),
            'user_id' => $user->id,
        ]);

        return redirect()->route('question.index');

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
        // get question_comment
        $question_comments = DB::table('question_comments') 
            ->leftJoin('users', 'question_comments.user_id', '=', 'users.id')
            ->selectRaw('question_comments.*, users.name')
            ->where('question_comments.question_id','=', $question->id)
            ->groupBy('question_comments.id')
            ->get();  
            
        // get best answer where jawaban_terbaik_id
        $answers = DB::table('answers') 
            ->leftJoin('users', 'answers.user_id', '=', 'users.id')
            ->selectRaw('answers.*, users.name, users.name, users.photo_dir, users.point_reputasi')
            ->where('answers.question_id','=', $question->id)
            ->groupBy('answers.id')
            ->get();
    
        
        //dd($answers); 
        $best_answer = array();
        // get best answer where question_id
        if (!empty($question->jawaban_terbaik_id)) {
        $best_answer = DB::table('answers') 
            ->leftJoin('users', 'answers.user_id', '=', 'users.id')
            ->selectRaw('answers.*, users.name, users.name, users.photo_dir, users.point_reputasi')
            ->where('answers.id','=', $question->jawaban_terbaik_id)
            ->groupBy('answers.id')
            ->get();
        }
         

        //dd($question_comments);
        return view('questions.show', [
            "question" => $question, "user" => $user, 
            'question_comments' => $question_comments,
            'answers' => $answers,
            'answer' => $best_answer,
        ])
            ->with('page', 'Detail Question');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($question)
    {
        $question = DB::table('questions')->where('id', $question)->first();

        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update($question, Request $request)
    {
        $query = DB::table('questions') 
        -> where('id', $question)
        -> update([
            'judul' => $request['title'], 
            'isi' => $request['question'],
            'updated_at' => $ldate = date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($question)
    {
        $query = DB::table('questions') 
        -> where('id', $question) 
        -> delete();

        return redirect()->route('question.index');
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
