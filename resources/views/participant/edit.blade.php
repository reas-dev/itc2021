@extends('layouts.participantLayout')
@section('title', 'Edit Profile')
@section('customStyle')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen,projection" />
@endsection
@section('content')
<div class="card min-vh-80">
    <div class="card-content center">
        <h4 class="red- indigo-text"><b>ITC 2021</b></h4>
        <h6 class=" indigo-text mb-5"><b><i>"tagline"</i></b></h6>
        <form method="post" action="{{ url('participant/profile/edit') }}">
            @csrf
            @method('post')
            <div class="row">
                <div class="input-field indigo-text text-lighten-1">
                    <i class="material-icons prefix">person</i>
                    <input id="name" type="text" name="name" value="{{ $user->name }}" required>
                    <label for="name">Name</label>
                    @error('name')
                    <span class="omrs-input-helper red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @if($status == 'notYet')
            <div class="row">
                <div class="input-field indigo-text text-lighten-1">
                    <i class="material-icons prefix">phone</i>
                    <input id="phone" type="text" name="phone" required>
                    <label for="phone">Phone</label>
                    @error('phone')
                    <span class="omrs-input-helper red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field indigo-text text-lighten-1">
                    <i class="material-icons prefix">school</i>
                    <input id="school" type="text" name="school" required>
                    <label for="school">School</label>
                    @error('school')
                    <span class="omrs-input-helper red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @else
            <div class="row">
                <div class="input-field indigo-text text-lighten-1">
                    <i class="material-icons prefix">phone</i>
                    <input id="phone" type="text" name="phone" value="{{ $participant->phone }}" required>
                    <label for="phone">Phone</label>
                    @error('phone')
                    <span class="omrs-input-helper red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field indigo-text text-lighten-1">
                    <i class="material-icons prefix">school</i>
                    <input id="school" type="text" name="school" value="{{ $participant->school }}" required>
                    <label for="school">School</label>
                    @error('school')
                    <span class="omrs-input-helper red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col s6">
                    <button type="submit" class="btn btn-block indigo lighten-1">Edit Profile</button>
                </div>
                <div class="col s6">
                    <a href="{{ url('participant/profile') }}" class="btn btn-block grey lighten-1">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
