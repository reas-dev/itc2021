@extends('layouts.participantLayout')
@section('title', 'Competition')
@section('customStyle')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen,projection" />
@endsection
@section('content')
<div class="card min-vh-80">
    <div class="card-content center">
        <div class="center">
            <h4><b>Penyisihan {{ $question->session }}</b></h4>
            @if ($question->session == 1)
                <h5>Soal {{ $question->id }}</h5>
            @elseif ($question->session == 2)
                <h5>Soal {{ $question->id-25 }}</h5>
            @else
            @endif
        </div>
        <div class="divider mb-2"></div>
        <div class="row">
            <div class="col s6">
                <form method="post" action="{{ url('participant/answer/a') }}">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-large btn-block min-vh-20 indigo lighten-1"><h5 class="black-text"><b>A</b></h5></button>
                </form>
            </div>
            <div class="col s6">
                <form method="post" action="{{ url('participant/answer/b') }}">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-large btn-block min-vh-20 amber lighten-1"><h5 class="black-text"><b>B</b></h5></button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <form method="post" action="{{ url('participant/answer/c') }}">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-large btn-block min-vh-20 teal lighten-1"><h5 class="black-text"><b>C</b></h5></button>
                </form>
            </div>
            <div class="col s6">
                <form method="post" action="{{ url('participant/answer/d') }}">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-large btn-block min-vh-20 red lighten-2"><h5 class="black-text"><b>D</b></h5></button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <form method="post" action="{{ url('participant/answer/z') }}">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-large btn-block grey lighten-1 black-text"><b>Tidak memilih</b></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
