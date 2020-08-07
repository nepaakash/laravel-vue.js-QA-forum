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

Route::get('/', 'QuestionController@viewAll')->name('ViewQuestions');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/login', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/questions', 'QuestionController@viewAll')->name('ViewQuestions');
Route::match(['get', 'post'],'/questions/create', 'QuestionController@create')->name('CreateQuestions');
Route::match(['get', 'post'],'/questions/edit/{id}', 'QuestionController@edit')->name('EditQuestions');
Route::get('/delete-question/{id}', 'QuestionController@delete')->name('DeleteQuestions');
Route::get('/questions/{slug}', 'QuestionController@index')->name('IndexQuestions');



