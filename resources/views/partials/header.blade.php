<nav class="colorlib-nav" role="navigation">
			
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div id="colorlib-logo"><a href="{{ route('home') }}">Blog</a></div>
                </div>
                <div class="col-md-10 text-right menu-1">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                  
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('show.contact') }}">Contact</a></li>
                        @auth
                        <li class="has-dropdown">
                            <a href="courses.html">{{ auth()->user()->name }}</a>
                            <ul class="dropdown">
                              <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn">Log out</button>
                             </form>
                            </ul>
                        </li>
                        @endauth
                        @guest
                        <li class="btn-cta"><a href="{{ route('login') }}"><span>Sign in</span></a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
           
          </ul>
      </div>
</aside>