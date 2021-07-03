<div class="row">
  <div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/home') }}"><img src="{{asset('images/logo.png')}}" class="logo" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{{ url('/login') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Publikasi</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="{{ url('saldopdf')}}" class="btn btn-info"><i class="fas fa-file fa-1x"></i>Unduh Data</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{{ url('/login') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">MyAkun
                @if(empty(Auth::user()->name))
                {{ '' }}
                @else
                {{ Auth::user()->name }}
                @endif
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ url('/login') }}">Profil</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ url('/register') }}">Sign Up</a></i></li>
                <li><a class="dropdown-item" href="{{ url('/login') }}">Log in</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
              </ul>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
          </form>
        </div>
      </div>
    </nav>
  </div>
</div>