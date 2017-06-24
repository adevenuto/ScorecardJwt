<div id="overlay"></div>
<div id="hamburger">
    <span></span>
    <span></span>
    <span></span>
</div>{{-- hanmbuger end --}}
<div id="mySidenav" class="sidenav">
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
    <hr>
    <div class="auth">
        @if (Auth::guest())
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @else
        <a id="logout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @endif
    </div>
</div>{{-- mySidenav end --}}