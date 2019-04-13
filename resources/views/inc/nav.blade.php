
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                   
                  <div class="container">
                      <a class="navbar-brand" href="{{ url('/') }}">
                          {{ __('API') }}
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                          <span class="navbar-toggler-icon"></span>
                      </button>
      
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <!-- Left Side Of Navbar -->
                          <ul class="navbar-nav mr-auto">
                          
                                <li class="nav-item active">
                                <a class="nav-link" href="{{route('about')}}">about<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/posts">blog</a>
                                </li>
                             @if(!auth::guest())
                               <li class="nav-item">
                                    <a class="nav-link" href="/home">Profile</a>
                                </li>
                              @endguest   
                    
                            <li class="nav-item">
                                 <a class="nav-link" href="{{route('shop')}}">shopping</a>
                             </li>
                          
                          </ul>
           
                          <ul class="navbar-nav mr-0">
                              <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle fas fa-user-friends" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Customer management
                                      </a>
                                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="#">Leads</a>
                                      <a class="dropdown-item" href="#">Add leads</a>
                                      <a class="dropdown-item" href="#">Add leads activity</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                      </div>
                                  </li>
                             
                                  </ul>
                          
                          <!-- Right Side Of Navbar -->
                          <ul class="navbar-nav ml-auto">
                              <!-- Authentication Links -->
                              @guest
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                  </li>
                                  @if (Route::has('register'))
                                      <li class="nav-item">
                                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                      </li>
                                  @endif
                              @else
                                  <li class="nav-item dropdown">

  
                                      <a id="navbarDropdown" class="nav-link dropdown-toggle far fa-user" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                          {{ Auth::user()->name }} <span class="caret"></span>
                                      </a>
      
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                          <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                              {{ __('Logout') }}
                                          </a>
      
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                                          </form>
                                      </div>
                                  </li>
                              @endguest
                          </ul>
                          <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                        <a class="nav-link fas fa-cart-plus" href="{{ route('cart') }}">{{ __('') }}<span class="badge" style="background:orange">{{Session::has('cart')? Session::get('cart')->totalQTY : ''}}</span></a>
                                 </li>
                          </ul>
                      </div>
                  </div>
              </nav>