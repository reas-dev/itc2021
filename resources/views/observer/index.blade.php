@extends('layouts.observerLayout')
@section('title', 'Home')
@section('customStyle')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen,projection" />
@endsection
@section('content')
<div class="card min-vh-80">
    <div class="card-content center">
        <h4 class=" indigo-text"><b>ITC 2021</b></h4>
        <h6 class="indigo-text mb-5"><b><i>"tagline"</i></b></h6>
        <a href="{{ url('observer/answer') }}" class="btn indigo lighten-1 mt-5">Input Score</a>
</div>
</div>
@endsection
