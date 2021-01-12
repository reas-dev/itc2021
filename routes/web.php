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

Auth::routes();

Route::get('/logout', 'HomeController@logout');


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
Route::group(['middleware' => ['auth','observer'], 'prefix' => 'observer'], function(){
    // Participant
    // Route::group(['prefix' => 'participant'], function(){
    //     // Table
    //     Route::get('table', 'ObserverParticipantController@showParticipantsTable');

    //     // Add
    //     Route::get('add', 'ObserverParticipantController@showAddParticipant');
    //     Route::post('add', 'ObserverParticipantController@addParticipant');

    Route::get('/', 'ObserverController@showHome');

    Route::get('/participant/table', 'ObserverParticipantController@participantsTable');
    Route::get('/participant/add', 'ObserverParticipantController@showCreate');
    Route::put('/participant/add', 'ObserverParticipantController@create');

    // Update
    Route::get('update/{participant}', 'ObserverCompetitionController@showUpdateParticipant');
    Route::patch('update/{participant}', 'ObserverCompetitionController@updateParticipant');

    // Delete
    Route::get('/delete/{participant}', 'ObserverCompetitionController@deleteParticipant');

    //     // Delete
    //     Route::delete('delete', 'ObserverParticipantController@deleteParticipant');
    // });
    // Route::get('/', 'ObserverParticipantController@showParticipantsTable');
    // Competition
    Route::group(['prefix' => 'competition'], function(){

        Route::get('/', 'ObserverParticipantController@gotoAnswer');
        // Answer
        Route::get('answer', 'ObserverCompetitionController@showAnswer');
        Route::patch('answer', 'ObserverCompetitionController@answer');
    });
});

Route::group(['middleware' => ['auth','finale'], 'prefix' => 'participant'], function(){
    Route::get('/', 'ParticipantCompetitionController@show');
    Route::get('final', 'ParticipantCompetitionController@finale');
    Route::patch('final', 'ParticipantCompetitionController@finaleSubmit');
});

Route::group(['middleware' => ['auth','admin'], 'prefix' => 'absent'], function(){
    Route::get('/', 'AbsentController@participantsTable');
    Route::post('check/{participant}', 'AbsentController@absent');
    Route::put('uncheck/{participant}', 'AbsentController@absentCancel');
});

// Public Route
Route::get('/peserta', 'PublicController@showPeserta');
Route::get('/lihat-soal', 'PublicController@showQuestion');
