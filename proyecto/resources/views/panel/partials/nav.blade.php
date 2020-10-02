<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#!"><img src="{{ asset("img/logos/nav.png") }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                @if (auth()->user()->admin=="si")
                    @include('panel.partials.nav_admin')
                @endif

                @if (auth()->user()->admin=="no")
                    @include('panel.partials.nav_user')
                @endif
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                
            </ul>
        </div>
    </div>
</nav>
