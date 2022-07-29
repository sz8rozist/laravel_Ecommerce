<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">E-shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto">
                <a href="{{url('/')}}" class="nav-item nav-link active"><i class="fa fa-home"></i><span>Home</span></a>
                <a href="#" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Projects</span></a>
                <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Team</span></a>
                <a href="#" class="nav-item nav-link"><i class="fa fa-pie-chart"></i><span>Reports</span></a>
                <a href="#" class="nav-item nav-link"><i class="fa fa-briefcase"></i><span>Careers</span></a>
                <a href="#" class="nav-item nav-link"><i class="fa fa-envelope"></i><span>Messages</span></a>
                <a href="#" class="nav-item nav-link"><i class="fa fa-bell"></i><span>Notifications</span></a>
                @guest
                    @if (Route::has('login'))
                            <a class="nav-item nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in"></i><span>{{ __('Login') }}</span></a>
                    @endif

                    @if (Route::has('register'))
                            <a class="nav-link nav-item" href="{{ route('register') }}"><i class="fa fa-user-plus"></i><span>{{ __('Register') }}</span></a>
                    @endif
                @else
                    <a class="nav-item nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i><span>{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
