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

Route::get('/', function () {
    return view('questions.index');
});

Route::get('/detail', function () {
    return view('questions.detail');
});

Route::get('/master', function () {
    return view('layouts.master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ROUTE : Pertanyaan
Route::get('/pertanyaan/create', 'PertanyaanController@create');


//Route : Jawaban
Route :: get('/jawaban/{idq}/create', 'JawabanController@create');
