@extends('layouts.adminLayout')
@section('customStyle')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
  th a {
    color: #212121 !important;
  }
</style>
@endsection
@section('title', 'Statistik')
@section('content')
<h2 class="center teal-text"><b>Peserta</b></h2>
<div class="card mt-3">
  <div class="card-content">
    <table class="centered highlight">
      <thead>
        <tr>
          <th>Rank</th>
          <th>@sortablelink('id', 'No Peserta')</th>
          <th>@sortablelink('name', 'Nama')</th>
          <th>@sortablelink('point_1', 'S-1')</th>
          <th>@sortablelink('point_2', 'S-2')</th>
          <th>@sortablelink('point_3', 'S-3')</th>
          <th>@sortablelink('point_4', 'S-4')</th>
          <th>@sortablelink('status', 'Status')</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($participants as $key => $participant)
        <tr
          class="@if ($participant->status == -1) red accent-1 @elseif($participant->status == $current->session) teal lighten-3 @else yellow @endif">
          <td>{{ $key+1 }}</td>
          <td>{{ $participant->id }}</td>
          <td>{{ $participant->name }}</td>
          <td>{{ $participant->point_1 }}</td>
          <td>{{ $participant->point_2 }}</td>
          <td>{{ $participant->point_3 }}</td>
          <td>{{ $participant->point_4 }}</td>
          <td>{{ $participant->status }}</td>
          <td>
            <div class="row">
              <form action="{{ url('admin/competition/statistic/add-point/'.$participant->id) }}" method="post"
                class="d-inline">
                @csrf
                @method('put')
                <button class="btn waves-effect green darken-1 waves-light tooltipped" data-position="top"
                  data-tooltip="Lolos" type="submit" name="action"><i class="material-icons">done</i>
                </button>
              </form>

              <form action="{{ url('admin/competition/statistic/min-point/'.$participant->id) }}" method="post"
                class="d-inline">
                @csrf
                @method('put')
                <button class="btn waves-effect red darken-1 waves-light tooltipped" data-position="top"
                  data-tooltip="Tidak Lolos" type="submit" name="action">
                  <i class="material-icons">highlight_off</i>
                </button>
              </form>

              <form action="{{ url('admin/competition/statistic/kick/'.$participant->id) }}" method="post"
                class="d-inline">
                @csrf
                @method('put')
                <button class="btn waves-effect grey darken-1 waves-light tooltipped" data-position="top"
                  data-tooltip="Kick Peserta" type="submit" name="action">
                  <i class="material-icons">do_not_disturb_alt</i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-3">
      {{$participants->links()}}
    </div>
  </div>
</div>
</div>
@endsection