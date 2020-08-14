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
Route::resource('answer', 'Answer\AnswerController');


Route::get('/', function () {
    return redirect('question');
});

Route::get('/detail', function () {
    return view('questions.detail');
});

Route::get('/master', function () {
    return view('layouts.master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 

