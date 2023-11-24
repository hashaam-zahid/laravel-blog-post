  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">About</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{url('/my-posts')}}">Your Posts</a>
          </li>
          @endauth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
          </li>
          @if (Route::has('login'))
               
                    @auth
                        <li class="nav-item">

                            <a  class="nav-link" href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">

                            <a  class="nav-link" href="{{ route('userlogout') }}">
                                logout
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                         <a class="nav-link" href="{{ route('login') }}">Login</a>
                     </li>

                        @if (Route::has('register'))
                         <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">Register</a>
                      </li>
                        @endif
                    @endauth
          
            @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url( {{ url('storage/img/home-bg.jpg') }})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>