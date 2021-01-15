<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Participant;
use App\CurrentStatus;
use App\Question;
use App\Log;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function show(){
        $id = Auth::user()->id;
        $user = User::select(['name','email'])->find($id);
        $participant = Participant::where('user_id', $id)->first();
        if($participant == null) {
            return view('participant.index')->with('status', 'notYet')->with(compact('user'));
        }
        else {
            return view('participant.index')->with('status', 'done')->with(compact('user'));
        }
    }

    public function showProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $participant = Participant::where('user_id', $id)->first();
        if($participant == null) {
            return view('participant.profile')->with('status', 'notYet')->with(compact('user', 'participant'));
        }
        else {
            return view('participant.profile')->with('status', 'done')->with(compact('user', 'participant'));
        }
    }

    public function showUpdateProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $participant = Participant::where('user_id', $id)->first();
        if($participant == null) {
            return view('participant.edit')->with('status', 'notYet')->with(compact('user'));
        }
        else {
            return view('participant.edit')->with('status', 'done')->with(compact('user', 'participant'));
        }
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'phone' => 'required|numeric',
            'school' => 'required',
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $participant = Participant::where('user_id', $user->id)->first();
        if($participant == null) {
            Participant::create([
                'name' => $user->name,
                'user_id' => $user->id,
                'phone' => $request->phone,
                'school' => $request->school,
                'point_1' => 0,
                'point_2' => 0,
                'point_3' => 0,
                'point_4' => 0,
                'status' => 1
            ]);
        }
        else {
            Participant::where('user_id', $user->id)
                ->update([
                    'name' => $user->name,
                    'phone' => $request->phone,
                    'school' => $request->school,
                ]);
        }
        return redirect ('/participant/profile')->with('status', 'profile-done')->with(compact('user'));
    }

    public function showAnswer(){
        $id = Auth::user()->id;
        $user = User::select(['name','email'])->find($id);
        $status = CurrentStatus::first();
        $question = Question::where('id', $status->question)->first();
        $participant = Participant::where('user_id', $id)->select(['id', 'point_1', 'point_2', 'status'])->first();
        if ($status->session > 2){
            return redirect('/participant')->with('status', 'sessionEnded')->with(compact('user'));
        }
        if (($status->session == 1 && $participant->status == 1) || ($status->session == 2 && $participant->status == 2)) {
            return view('participant.answer')->with(compact('question', 'user'));
        }
        else {
            return redirect('/participant')->with('status', 'sessionEnded')->with(compact('user'));
        }
    }




    public function answerA(){
        $id = Auth::user()->id;
        $user = User::select(['name','email'])->find($id);
        $status = CurrentStatus::first();
        $question = Question::where('id', $status->question)->select(['id', 'answer_key'])->first();
        $participant = Participant::where('user_id', $id)->select(['id', 'point_1', 'point_2', 'status'])->first();
        if (($status->session == 1 && $participant->status == 1) || ($status->session == 2 && $participant->status == 2)) {
            if($question->answer_key == 'A' || $question->answer_key == 'a'){
                if ($status->session == 2 && $participant->status == 2){
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_2' => $participant->point_2+2,
                    ]);
                }
                else {
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_1' => $participant->point_1+2,
                    ]);
                }
                Log::create([
                    'user_id' => $id,
                    'question_id' => $question->id,
                    'answer' => 'A',
                    'calc' => '+2'
                ]);
            }
            else {
                if ($status->session == 2 && $participant->status == 2) {
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_2' => $participant->point_2-1,
                    ]);
                    Log::create([
                        'user_id' => $id,
                        'question_id' => $question->id,
                        'answer' => 'A',
                        'calc' => '-1'
                    ]);
                }
                else {
                    Log::create([
                        'user_id' => $id,
                        'question_id' => $question->id,
                        'answer' => 'A',
                        'calc' => '0'
                    ]);
                }
            }
        }
        return redirect('/participant')->with('status', 'answer')->with(compact('user'));
    }

    public function answerB(){
        $id = Auth::user()->id;
        $user = User::select(['name','email'])->find($id);
        $status = CurrentStatus::first();
        $question = Question::where('id', $status->question)->select(['id', 'answer_key'])->first();
        $participant = Participant::where('user_id', $id)->select(['id', 'point_1', 'point_2', 'status'])->first();
        if (($status->session == 1 && $participant->status == 1) || ($status->session == 2 && $participant->status == 2)) {
            if($question->answer_key == 'B' || $question->answer_key == 'b'){
                if ($status->session == 2 && $participant->status == 2){
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_2' => $participant->point_2+2,
                    ]);
                }
                else {
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_1' => $participant->point_1+2,
                    ]);
                }
                Log::create([
                    'user_id' => $id,
                    'question_id' => $question->id,
                    'answer' => 'B',
                    'calc' => '+2'
                ]);
            }
            else {
                if ($status->session == 2 && $participant->status == 2) {
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_2' => $participant->point_2-1,
                    ]);
                    Log::create([
                        'user_id' => $id,
                        'question_id' => $question->id,
                        'answer' => 'B',
                        'calc' => '-1'
                    ]);
                }
                else {
                    Log::create([
                        'user_id' => $id,
                        'question_id' => $question->id,
                        'answer' => 'B',
                        'calc' => '0'
                    ]);
                }
            }
        }
        return redirect('/participant')->with('status', 'answer')->with(compact('user'));
    }

    public function answerC(){
        $id = Auth::user()->id;
        $user = User::select(['name','email'])->find($id);
        $status = CurrentStatus::first();
        $question = Question::where('id', $status->question)->select(['id', 'answer_key'])->first();
        $participant = Participant::where('user_id', $id)->select(['id', 'point_1', 'point_2', 'status'])->first();
        if (($status->session == 1 && $participant->status == 1) || ($status->session == 2 && $participant->status == 2)) {
            if($question->answer_key == 'C' || $question->answer_key == 'c'){
                if ($status->session == 2 && $participant->status == 2){
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_2' => $participant->point_2+2,
                    ]);
                }
                else {
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_1' => $participant->point_1+2,
                    ]);
                }
                Log::create([
                    'user_id' => $id,
                    'question_id' => $question->id,
                    'answer' => 'C',
                    'calc' => '+2'
                ]);
            }
            else {
                if ($status->session == 2 && $participant->status == 2) {
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_2' => $participant->point_2-1,
                    ]);
                    Log::create([
                        'user_id' => $id,
                        'question_id' => $question->id,
                        'answer' => 'C',
                        'calc' => '-1'
                    ]);
                }
                else {
                    Log::create([
                        'user_id' => $id,
                        'question_id' => $question->id,
                        'answer' => 'C',
                        'calc' => '0'
                    ]);
                }
            }
        }
        return redirect('/participant')->with('status', 'answer')->with(compact('user'));
    }

    public function answerD(){
        $id = Auth::user()->id;
        $user = User::select(['name','email'])->find($id);
        $status = CurrentStatus::first();
        $question = Question::where('id', $status->question)->select(['id', 'answer_key'])->first();
        $participant = Participant::where('user_id', $id)->select(['id', 'point_1', 'point_2', 'status'])->first();
        if (($status->session == 1 && $participant->status == 1) || ($status->session == 2 && $participant->status == 2)) {
            if($question->answer_key == 'D' || $question->answer_key == 'd'){
                if ($status->session == 2 && $participant->status == 2){
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_2' => $participant->point_2+2,
                    ]);
                }
                else {
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_1' => $participant->point_1+2,
                    ]);
                }
                Log::create([
                    'user_id' => $id,
                    'question_id' => $question->id,
                    'answer' => 'D',
                    'calc' => '+2'
                ]);
            }
            else {
                if ($status->session == 2 && $participant->status == 2) {
                    Participant::where('id', $participant->id)
                    ->update([
                        'point_2' => $participant->point_2-1,
                    ]);
                    Log::create([
                        'user_id' => $id,
                        'question_id' => $question->id,
                        'answer' => 'D',
                        'calc' => '-1'
                    ]);
                }
                else {
                    Log::create([
                        'user_id' => $id,
                        'question_id' => $question->id,
                        'answer' => 'D',
                        'calc' => '0'
                    ]);
                }
            }
        }
        return redirect('/participant')->with('status', 'answer')->with(compact('user'));
    }

    public function answerNo(){
        $id = Auth::user()->id;
        $user = User::select(['name','email'])->find($id);
        $status = CurrentStatus::first();
        $question = Question::where('id', $status->question)->select(['id', 'answer_key'])->first();
        $participant = Participant::where('user_id', $id)->select(['id', 'point_1', 'point_2', 'status'])->first();
        if (($status->session == 1 && $participant->status == 1) || ($status->session == 2 && $participant->status == 2)) {
            Log::create([
                'user_id' => $id,
                'question_id' => $question->id,
                'answer' => 'NO',
                'calc' => '0'
            ]);
        }
        return redirect('/participant')->with('status', 'answer')->with(compact('user'));
    }
}
