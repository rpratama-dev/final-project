<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer\Answer; 
use App\Models\Question\Question; 
use Illuminate\Http\Request; 
use App\User;  

class AnswerController extends Controller
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

        Answer::create([
            'answer' => $request->answer,
            'user_id' => Auth::user()->id,
            'question_id' => $request->question_id,
        ]);

        return redirect(route('question.show', ['question' => $request->question_id]))
                    ->with('success','Your answer submited')
                    ->with('alert','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $answer_id = $request->input('answer_id');
        $question_id = $request->input('question_id');
        $user_id = $request->input('user_id');
        $flight = Question::find($question_id); 
        $flight->jawaban_terbaik_id = $answer_id; 
        $flight->save();  

        $answer = Answer::find($answer_id); 
        $answer->is_best_answer = 1; 
        $answer->save(); 

        User::find($user_id)->increment('point_reputasi', 15);    

        return redirect(route('question.show', ['question' => $question_id]))
                    ->with('success','Best answer selected.')
                    ->with('alert','success'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }


    public function getTotalAnswerByUser()
    {
        $answer = Answer::where('user_id', '=',  Auth::user()->id) 
                    ->get();
        return count($answer);
    }


    // Function Validasi
    private function validasi($request){
        $rules = [
            'answer' => 'required', 
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.', 
        ];

        $request->validate($rules, $customMessages);
    }
}
