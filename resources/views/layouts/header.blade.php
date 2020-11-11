<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/">Polinema</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          {{-- <li><a href="#portfolio">Portfolio</a></li> --}}
            <li class="nav-item {{ Route::is('post.index') ? 'active' : '' }}">
              @can('isUser')
                    <a href="posts">Post</a>
                @endcan              
            </li>
            <li class="nav-item {{ Route::is('article') ? 'active' : '' }}">
                @can('isUser')
                    <a href="articles">Article</a>
                @endcan              
            </li>
            @guest
                <li >
                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li >
                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="drop-down">
                    <a href="#">{{ Auth::user()->name }} <span class="caret"></span></a>
                <ul>
                    <li>
                         <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>                    
                </li>
            @endguest
        </ul>
      </nav><!-- .nav-menu -->

      {{-- <a href="#about" class="get-started-btn scrollto">Get Started</a> --}}

    </div>
  </header><!-- End Header -->