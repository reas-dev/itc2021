<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}" media="screen,projection" />
    @yield('customStyle')
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
</head>

<body class="grey lighten-4">

    <nav>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <div class="nav-wrapper teal">
            <a href="{{ url('/admin') }}" class="brand-logo ml-3">ITC Admin Panel</a>
            <ul class="right hide-on-med-and-down mr-3">
                <li class="{{ (request()->is('observer')) ? 'active' : '' }}"><a class="white-text waves-effect"
                    href="{{ url('observer') }}">Observer</a></li>
                <li class="{{ (request()->is('admin/participant/table')) ? 'active' : '' }}"><a
                        href="{{ url('/admin/participant/table') }}">Peserta</a></li>
                <li class="{{ (request()->is('admin/observer/table')) ? 'active' : '' }}"><a
                        href="{{ url('/admin/observer/table') }}">Pengawas</a></li>
                <li class="{{ (request()->is('admin/question/table')) ? 'active' : '' }}"><a
                        href="{{ url('/admin/question/table') }}">Soal</a>
                </li>
                <li><a class="dropdown-trigger" href="#!" data-target="competition_controll">Kontrol Lomba<i
                            class="material-icons right">arrow_drop_down</i></a></li>
                <li>
                    <a href="{{ url('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <ul id="competition_controll" class="dropdown-content">
        <li><a href="{{ url('/admin/competition/statistic') }}">Statistik</a></li>
        <li><a href="{{ url('/admin/competition/session-panel') }}">Sesi</a></li>
        <li><a href="{{ url('/admin/competition/eliminate') }}">Eliminasi</a></li>
    </ul>

    <ul id="slide-out" class="sidenav teal">
        <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a class="white-text waves-effect"
                href="{{ url('admin') }}"><i class="white-text material-icons">home</i>Home</a></li>
        <li>
        <div class="divider"></div>
        <li class="{{ (request()->is('observer')) ? 'active' : '' }}"><a class="white-text waves-effect"
                href="{{ url('observer') }}"><i class="white-text material-icons">person</i>Observer</a></li>
        <li>
        <div class="divider"></div>
        <li class=""><a class="white-text waves-effect" href="{{ url('logout') }}"><i
                    class="white-text material-icons">power_settings_new</i>Logout</a>
        </li>
    </ul>

    <ul id="competition_controlll" class="dropdown-content">
        <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>

    <div class="container mt-4">
        @yield('content')
    </div>
    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        M.AutoInit()
    </script>
    @yield('js')
</body>

</html>
