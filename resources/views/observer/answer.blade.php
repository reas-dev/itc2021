@extends('layouts.observerLayout')
@section('title', 'Competition')
@section('customStyle')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen,projection" />
@endsection
@section('content')
<div class="card min-vh-80">
    <div class="card-content">
        <div class="center">
            <h4><b>Final {{ $question->session-2 }}</b></h4>
            @if ($question->session == 3)
                <h5>Soal {{ $question->id-50 }}</h5>
            @elseif ($question->session == 4)
                <h5>Soal {{ $question->id-70 }}</h5>
            @else
            @endif
        </div>
        <div class="mb-5"></div>
        <div class="row">
            <div class="col s12">
                <form method="post" action="{{ url('observer/answer') }}">
                    @csrf
                    @method('post')
                    <div class="input-field">
                        <select id="participant" name="participant" required>
                          <option disabled selected>-</option>
                          @if ($participants->isNotEmpty()){
                              @foreach ($participants as $participant)
                              <option value="{{ $participant->id }}">{{ $participant->name }} ({{ $participant->id }})</option>
                              @endforeach
                          }
                          @endif
                        </select>
                        <label for="participant">Participant</label>
                        @error('participant')
                        <span class="omrs-input-helper red-text">{{ $message }}</span>
                        @enderror
                      </div>
                    <div class="input-field">
                        <i class="material-icons prefix">assignment</i>
                        <input id="score" type="text" name="score" required>
                        <label for="score">Score</label>
                        <span class="helper-text" data-error="wrong" data-success="right">1-10</span>
                        @error('score')
                        <span class="omrs-input-helper red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-large btn-block black-text indigo lighten-1">
                        <b>Input Score</b>
                    </button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
