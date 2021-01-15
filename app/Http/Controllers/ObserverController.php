<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Participant;
use App\CurrentStatus;
use App\Question;
use App\Log;
use Illuminate\Http\Request;

class ObserverController extends Controller
{
    public function show(){
        $id = Auth::user()->id;
        $user = User::select(['name','email'])->find($id);

        return view('observer.index')->with(compact('user'));
    }

    public function showScoring(){
        $id = Auth::user()->id;
        $user = User::select(['name','email'])->find($id);
        $status = CurrentStatus::first();
        $question = Question::where('id', $status->question)->first();
        $participants = Participant::where('status', $status->session)->select(['id', 'name'])->get();
        return view('observer.answer')->with(compact('user', 'participants', 'question'));
    }




    public function scoring(Request $request){
        $request->validate([
            'participant' => 'required|numeric',
            'score' => 'required|numeric|min:0|max:10',
        ]);
        $id = Auth::user()->id;
        $user = User::select(['name','email'])->find($id);
        $status = CurrentStatus::first();
        $question = Question::where('id', $status->question)->select(['id'])->first();
        $participant = Participant::where('id', $request->participant)->select(['point_3', 'point_4'])->first();
        if($status->session == 3){
            Participant::where('id', $request->participant)
            ->update([
                'point_3' => $participant->point_3+$request->score,
            ]);
        }
        elseif ($status->session == 4){
            Participant::where('id', $request->participant)
            ->update([
                'point_4' => $participant->point_4+$request->score,
            ]);
        }
        else{
            return redirect('/observer')->with('status', 'SessionNotBegin')->with(compact('user'));
        }
        Log::create([
            'user_id' => $id,
            'question_id' => $question->id,
            'answer' => +$request->score,
            'calc' => +$request->score,
        ]);

        return redirect('/observer')->with('status', 'answer')->with(compact('user'));
    }
}
