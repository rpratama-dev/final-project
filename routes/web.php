<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
| Cara buat Route, menggunakan resource. supaya semua route di generate otomatis.
| Cek Route : php artisan route:list
 */

//ROUTE : Resource Question (All in one)
Route::resource('question', 'Question\QuestionController');
//ROUTE : Resource Answer (All in one)
Route::resource('question-comment', 'Question\QuestionCommentController');
//ROUTE : Resource Answer (All in one)
Route::resource('answer-comment', 'Answer\AnswerCommentController');
//ROUTE : Resource Answer (All in one)
Route::resource('vote-answer', 'Answer\VoteAnswerController');
//ROUTE : Resource Answer (All in one)
Route::resource('vote-question', 'Question\VoteQuestionController');

//ROUTE : Resource Answer (All in one)
Route::resource('answer', 'Answer\AnswerController');


Route::get('/', function () {
    return redirect('question');
})->name('welcome');

Route::get('/detail', function () {
    return view('questions.detail');
});

Route::get('/master', function () {
    return view('layouts.master');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/users', function () {
    return view('users');
});
   
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/tag', 'Question\TagController@store')->name('tag.store');

Route::get('/question/{user_id}/user-question', 'Question\QuestionController@user_question')->name('question.user-post');
Route::get('/question/{tag_id}/tag-question', 'Question\QuestionController@tag_question')->name('question.tag-post');

