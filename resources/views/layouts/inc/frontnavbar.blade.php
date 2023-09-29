<nav class="navbar navbar-expand-lg navbar-dark  bg-dark nav  " >
  <div class="container  ">
    <a class="navbar-brand title" href="{{ url('/') }}">E_MonsefBey</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Accueille</a>
        </li>
        @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="{{url('category')}}">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('cart')}}">Panier
            <span class="badge badge-pill bg-primary cart-count">0</span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="{{url('wishlist')}}">Liste de souhaits
          <span class="badge badge-pill bg-success wishlist-count">0</span>

          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{url('my-order')}}">Mes commandes</a>
        </li>
        @endif
      
      @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>

    </div>
  </div>
</nav>