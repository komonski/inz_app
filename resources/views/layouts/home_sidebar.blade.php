<div class="sidebar">
    <div class="sidebar--logo">
        <img src="{{ asset('public/images/logo.png') }}">
    </div>

    <nav class="sidebar--nav">
        <p class="sidebar--nav--title">Klasa</p>
        <ul>
        @foreach($schoolrooms as $schoolroom)
            <li class="{{ ($active_schoolroom == $schoolroom->schoolroom_id) ? 'active' : '' }}"><a href="{{ url('index/'.$schoolroom->schoolroom_id.'/A') }}">{{ $schoolroom->schoolroom_name }}</a></li>
        @endforeach
        </ul>
    </nav>

    <footer class="sidebar--footer">
        <ul>
        <li><a href="{{ url('/') }}">Rozkład zajęć</a></li>
        @if (auth()->user())
            <li><a href="{{ url('logout') }}">Wyloguj się</a></li>
        @else
            <li><a href="{{ url('login') }}">Zaloguj się</a></li>
        @endif
        </ul>

        <p class="sidebar--footer--copyright">&copy; Copyright 2019</p>
    </footer>
    </div>
