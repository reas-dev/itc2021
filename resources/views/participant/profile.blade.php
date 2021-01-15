@extends('layouts.participantLayout')
@section('title', 'My Profile')
@section('customStyle')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen,projection" />
@endsection
@section('content')
<div class="card min-vh-80">
    <div class="card-content">
        <h4 class="indigo-text center"><b>ITC 2021</b></h4>
        <h6 class="indigo-text mb-5 center"><b><i>"tagline"</i></b></h6>
        <div class="row">
            <div class="col s3">
                <h6>Name</h6>
            </div>
            <div class="col s1">
                <h6>:</h6>
            </div>
            <div class="col s8">
                <h6>{{ $user->name }}</h6>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <h6>Username</h6>
            </div>
            <div class="col s1">
                <h6>:</h6>
            </div>
            <div class="col s8">
                <h6>{{ $user->username }}</h6>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <h6>Email</h6>
            </div>
            <div class="col s1">
                <h6>:</h6>
            </div>
            <div class="col s8">
                <h6>{{ $user->email }}</h6>
            </div>
        </div>
    @if ($status == 'notYet')
        <div class="row">
            <div class="col s3">
                <h6>Phone</h6>
            </div>
            <div class="col s1">
                <h6>:</h6>
            </div>
            <div class="col s8">
                <h6>-</h6>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <h6>School</h6>
            </div>
            <div class="col s1">
                <h6>:</h6>
            </div>
            <div class="col s8">
                <h6>-</h6>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col s3">
                <h6>Phone</h6>
            </div>
            <div class="col s1">
                <h6>:</h6>
            </div>
            <div class="col s8">
                <h6>{{ $participant->phone }}</h6>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <h6>School</h6>
            </div>
            <div class="col s1">
                <h6>:</h6>
            </div>
            <div class="col s8">
                <h6>{{ $participant->school }}</h6>
            </div>
        </div>
    @endif
        <div class="center">
            <a href="{{ url('participant/profile/edit') }}" class="btn indigo lighten-1">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
