<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/observer.css') }}" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/observer-custom.css') }}" media="screen,projection" />
    @yield('customStyle')

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
</head>

<body class="grey lighten-4">

    <nav>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <div class="nav-wrapper indigo lighten-1">
            <a href="#" class="brand-logo center">@yield('title')</a>
        </div>
    </nav>

    <ul id="slide-out" class="sidenav indigo lighten-1">
        <li>
            <div class="user-view">
                <a href="#" class="brand-logo"><img src="{{ asset('img/anmlogo.gif') }}" height="40" class="mt-1" alt="" srcset=""></a>
                <a href="#name"><span class="white-text name">{{ $user->name }}</span></a>
                <a href="#email"><span class="white-text email">{{ $user->email }}</span></a>
            </div>
        </li>
        <li class="{{ (request()->is('participant')) ? 'active' : '' }}"><a class="waves-effect white-text"
                href="{{ url('participant') }}"><i class="material-icons white-text">home</i>Home</a></li>
        <li>
        <li class="{{ (request()->is('participant/profile')) ? 'active' : '' }}"><a class="waves-effect white-text"
                href="{{ url('participant/profile') }}"><i class="material-icons white-text">person</i>Profile</a></li>
        <li>
        <div class="divider"></div>
        <li class="{{ (request()->is('participant/answer')) ? 'active' : '' }}"><a class="waves-effect white-text"
                href="{{ url('participant/answer') }}"><i class="material-icons white-text">assignment</i>Competition</a></li>
        <div class="divider"></div>
        <li class=""><a class="waves-effect white-text" href="{{ url('logout') }}"><i
                    class="material-icons white-text">power_settings_new</i>Logout</a>
        </li>
    </ul>

    <ul id="competition_controll" class="dropdown-content">
        <li><a href="#!">Statistik</a></li>
        <li><a href="#!">Sesi</a></li>
        <li><a href="#!">Eliminasi</a></li>
        <li><a href="#!">Kick</a></li>
    </ul>

    <div class="container mt-2">
        @yield('content')
    </div>


    <!-- Modal Structure -->
    <div id="msg" class="modal">
        <div class="modal-content center">
            <i class="material-icons large red-text">info_outline</i>
            <h4 class="red-text"><b>Belum menginputkan peserta</b></h4>
            <h5>mau input peserta sekarang ?</h5>
        </div>
        <div class="modal-footer">
            <a href="{{ url('observer/participant/add') }}"
                class="modal-close waves-effect waves-green btn-flat">Iya</a>
            <a href="#" class="modal-close waves-effect waves-green btn-flat">Tidak</a>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script>
            M.AutoInit()
        </script>
    <script>
        $(document).ready(function () {
            $('#participant_number').on('input propertychange paste', function () {
                var input = $('#participant_number').val()
                var count = input.length
                var result = $.trim(input).split(',')
                var r_count = result.length
                if (count < 1) {
                    $('#info').text("")
                } else {
                    $('#info').text("anda mengawasi " + r_count + " orang")
                }
            })

        });
    </script>

    @if (Session::has('status') && Session::get('status') == 'sessionEnded')
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Ups!',
            text: 'Sesi telah berakhir',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @elseif (Session::has('status') && Session::get('status') == 'profile-done')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Yeay!',
            text: 'Data berhasil diupdate',
            showConfirmButton: false,
            timer: 1000
        })
    </script>
    @elseif (Session::has('status') && Session::get('status') == 'answer')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Yeay!',
            text: 'Jawaban sudah disimpan',
            showConfirmButton: false,
            timer: 1000
        })
    </script>
    @endif
    @yield('js')
</body>
@if (Session::get('status') == 1)
<script>
    $(document).ready(function () {
        M.AutoInit()
        var Modalelem = document.querySelector('#msg')
        var instance = M.Modal.init(Modalelem)
        instance.open()
    });
</script>
@php
session()->pull('status', 'default');
@endphp
@endif


</html>
