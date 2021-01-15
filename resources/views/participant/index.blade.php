@extends('layouts.participantLayout')
@section('title', 'Home')
@section('customStyle')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen,projection" />
@endsection
@section('content')
<div class="card min-vh-80">
    <div class="card-content center">
@if ($status == 'notYet')
        <h4 class="indigo-text"><b>ITC 2021</b></h4>
        <h6 class="indigo-text mb-5"><b><i>"tagline"</i></b></h6>
        <h6 class="indigo-text mb-5">Identitas belum terisi lengkap. Silahkan mengisi identitas terlebih dahulu</h6>
        <a href="{{ url('participant/profile') }}" class="btn mt-5 grey lighten-1">Isi Identitas</a>
@else
        <h4 class=" indigo-text"><b>ITC 2021</b></h4>
        <h6 class="indigo-text mb-5"><b><i>"tagline"</i></b></h6>
        <a href="{{ url('participant/answer') }}" class="btn indigo lighten-1 mt-5">Mulai Jawab</a>
@endif
</div>
</div>
@endsection
