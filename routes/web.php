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
    return redirect('/login');
});

Route::get('/tes', 'ParticipantController@show');

Auth::routes();

Route::get('/logout', 'HomeController@logout');

// Public Route
Route::get('/peserta', 'PublicController@showPeserta');
Route::get('/lihat-soal', 'PublicController@showQuestion');

// Admin Routes
Route::group(['middleware' => ['admin','auth'], 'prefix' => 'admin'], function(){

    Route::get('/', 'AdminCompetitionController@adminPanel');

    // Participant
    Route::group(['prefix' => 'participant'], function(){
        // Table
        Route::get('table', 'AdminParticipantController@showParticipantsTable');

        // Add
        Route::get('create', 'AdminParticipantController@showAddParticipant');
        Route::post('create', 'AdminParticipantController@addParticipant');

        // Update
        Route::post('edit/{participant}', 'AdminParticipantController@showUpdateParticipant');
        Route::patch('edit/{participant}', 'AdminParticipantController@updateParticipant');

        // Delete
        Route::delete('table/{participant}', 'AdminParticipantController@deleteParticipant');
    });

    // Question
    Route::group(['prefix' => 'question'], function(){
        // Table
        Route::get('table', 'AdminQuestionController@showQuestionsTable');
        Route::get('table/{question}', 'AdminQuestionController@showQuestion');

        // Add
        Route::get('create', 'AdminQuestionController@showAddQuestion');
        Route::post('create', 'AdminQuestionController@addQuestion');

        // Update
        Route::post('edit/{question}', 'AdminQuestionController@showUpdateQuestion');
        Route::patch('edit/{question}', 'AdminQuestionController@updateQuestion');

        // Delete
        Route::delete('table/{question}', 'AdminQuestionController@deleteQuestion');
    });

    // Observer
    Route::group(['prefix' => 'observer'], function(){
        // Table
        Route::get('table', 'AdminObserverController@showObserversTable');

        // // Add
        // Route::get('add', 'AdminObserverController@showAddObserver');
        // Route::post('add', 'AdminObserverController@addObserver');

        // // Update
        // Route::get('update/{user}', 'AdminObserverController@showUpdateObserver');
        // Route::post('update/{user}', 'AdminObserverController@updateObserver');

        // Delete
        Route::delete('table/{user}', 'AdminObserverController@deleteObserver');
    });

    // Competition
    Route::group(['prefix' => 'competition'], function(){
        // Statistic
        Route::get('statistic', 'AdminCompetitionController@showStatisticTable');
        Route::put('statistic/add-point/{id}', 'AdminCompetitionController@updateStatusInc');
        Route::put('statistic/min-point/{id}', 'AdminCompetitionController@updateStatusDec');
        Route::put('statistic/kick/{id}', 'AdminCompetitionController@kickParticipant');

        // Ban
        // Route::get('ban/{id}', 'AdminCompetitionController@showBan');
        // Route::post('ban/{id}', 'AdminCompetitionController@ban');

        // Question
        Route::get('question/{id}', 'AdminCompetitionController@showQuestion');
        // Session Panel
        Route::get('session-panel', 'AdminCompetitionController@showSessionPanel');
        // Route::put('session-panel', 'AdminCompetitionController@sessionPanel');
        Route::patch('session-panel', 'AdminCompetitionController@updateSessionPanel');
        // // Next Session
        // Route::post('next-session', 'AdminCompetitionController@nextSession');
        // // Previous Session
        // Route::get('previous-session', 'AdminCompetitionController@previousSession');
        // // Next Session
        // Route::get('next-question', 'AdminCompetitionController@nextQuestion');
        // // Previous Session
        // Route::get('previous-question', 'AdminCompetitionController@previousQuestion');

        // eliminate
        Route::get('eliminate', 'AdminCompetitionController@showEliminate');
        Route::put('eliminate', 'AdminCompetitionController@eliminate');
        Route::put('undo-eliminate', 'AdminCompetitionController@undoEliminate');
    });
});

// Observer Route
Route::group(['middleware' => ['auth','admin'], 'prefix' => 'observer'], function(){
    Route::get('/', 'ObserverController@show');
    Route::get('answer', 'ObserverController@showScoring');
    Route::post('answer', 'ObserverController@scoring');
});

Route::group(['middleware' => ['auth','participant'], 'prefix' => 'participant'], function(){
    Route::get('/', 'ParticipantController@show');
    Route::get('profile', 'ParticipantController@showProfile');
    Route::get('profile/edit', 'ParticipantController@showUpdateProfile');
    Route::post('profile/edit', 'ParticipantController@updateProfile');
    Route::get('answer', 'ParticipantController@showAnswer');
    Route::post('answer/a', 'ParticipantController@answerA');
    Route::post('answer/b', 'ParticipantController@answerB');
    Route::post('answer/c', 'ParticipantController@answerC');
    Route::post('answer/d', 'ParticipantController@answerD');
    Route::post('answer/z', 'ParticipantController@answerNo');
});

Route::group(['middleware' => ['auth','admin'], 'prefix' => 'absent'], function(){
    Route::get('/', 'AbsentController@participantsTable');
    Route::post('check/{participant}', 'AbsentController@absent');
    Route::put('uncheck/{participant}', 'AbsentController@absentCancel');
});

// Public Route
Route::get('/peserta', 'PublicController@showPeserta');
Route::get('/lihat-soal', 'PublicController@showQuestion');
