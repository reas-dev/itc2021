@extends('layouts.participantLayout')
@section('title', 'Koreksi Jawaban')
@section('content')
<div class="center">
    <h4><b>Penyisihan 1</b></h4>
    <h5 class="mt-1">Soal 1</h5>
</div>
<div class="divider mb-2"></div>
<form method="post" action="{{ url('observer/competition/answer/') }}">
    @csrf
    @method('patch')
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s3">
                    <div class="btn-floating btn-large waves-effect waves-light secondary">
                        <h5>1</h5>
                    </div>
                </div>
                <div class="col s9 mt-1">
                    <h5 class="my-none secondary-text"><b>andre</b></h5>
                </div>
                <div class="col s12 mt-3 center">
                    <p class="inline">
                        <label>
                            <input name="answer[1]" type="radio" value="A" />
                            <span class="blue-radio">A</span>
                        </label>
                    </p>
                    <p class="inline">
                        <label>
                            <input name="answer[1]" type="radio" value="B" />
                            <span class="yellow-radio">B</span>
                        </label>
                    </p>
                    <p class="inline">
                        <label>
                            <input name="answer[1]" type="radio" value="C" />
                            <span class="green-radio">C</span>
                        </label>
                    </p>
                    <p class="inline">
                        <label>
                            <input name="answer[1]" type="radio" value="Z" />
                            <span class="gray-radio">-</span>
                        </label>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s3">
                    <div class="btn-floating btn-large waves-effect waves-light secondary">
                        <h5>1</h5>
                    </div>
                </div>
                <div class="col s9 mt-1">
                    <h5 class="my-none secondary-text"><b>yola</b></h5>
                </div>
                <div class="col s12 mt-3 center">
                    <p class="inline">
                        <label>
                            <input name="answer[1]" type="radio" value="A" />
                            <span class="blue-radio">A</span>
                        </label>
                    </p>
                    <p class="inline">
                        <label>
                            <input name="answer[1]" type="radio" value="B" />
                            <span class="yellow-radio">B</span>
                        </label>
                    </p>
                    <p class="inline">
                        <label>
                            <input name="answer[1]" type="radio" value="C" />
                            <span class="green-radio">C</span>
                        </label>
                    </p>
                    <p class="inline">
                        <label>
                            <input name="answer[1]" type="radio" value="Z" />
                            <span class="gray-radio">-</span>
                        </label>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-1 mb-bottom">
        <button type="submit" class="btn btn-large btn-block">Masukan Jawaban</button>
    </div>
</form>
@endsection
