<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question\Question; 
use App\Models\Question\QuestionHasTag;  
use App\Models\Question\Tag; 
use App\Models\Answer\Answer; 
use Illuminate\Support\Facades\DB;
use App\User; 

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        /**
        * Get the all of question.
        */
        $questions = Question::all()->sortByDesc('id'); 

        return view('questions.index', compact('questions'))
            ->with('page', 'Top Question'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::All();
        return view('questions.create', compact('tags'));
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
        $tags = $request->tags; 

        $affect = Question::create([
            'judul' => $request->title,
            'isi' => $request->question,
            'tag' => implode(",", $tags), 
            'user_id' => Auth::user()->id, 
        ]);
 
        foreach ($tags as $key => $tag) {
            $affect->tags()->attach($tag);
        } 

        return redirect(route('question.index'))
                    ->with('success','Comment submited')->with('alert',"success"); 
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
        return view('questions.show', compact('question')); 
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

        return view('questions.edit', compact('question'))->with('edit','Edit Your Question');
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
        $this->validasi($request);
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

    public function getTotalQuestionByUser()
    {
        $question = Question::where('user_id', '=',  Auth::user()->id) 
                    ->get();
        return count($question);
    }

    // Function get question by user id
    public function user_question($user_id)
    {
        $user = User::find($user_id); 
        $questions = $user->question()->orderBy('id', 'asc')->get();

        return view('questions.index', compact('questions'))
            ->with('page', 'Question by '. $user->name); 
    }

    // Function get question by tag
    public function tag_question($tag_id)
    {
        //**
        $tag = Tag::find($tag_id); 
        $questions = $tag->questions()->orderBy('id', 'asc')->get();

        return view('questions.index', compact('questions'))
            ->with('page', 'Question by Tag : '. $tag->tag_name); 
        //*/
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
