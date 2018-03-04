
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="{{ asset('/front/assets/img/cbc/cbc_brand.png') }}"></a>
          <a class="navbar-brand" href="/">City Bible Church</a>
        @auth()
          <li class="dropdown navbar-brand" style="list-style: none;">
        <a href="#" class="dropdown-toggle" style='color:white;' data-toggle="dropdown">Says Hi to you {{ Auth::user()->name }} ! <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/dashboard">Visit Dashboard</a></li>
          <li>
            <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();" class="btn btn-danger btn-lg">
              Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
        @endauth
         
        </ul>
      </li>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="events.html">EVENTS</a></li>
            <li><a href="contact.html">CONTACT</a></li>
            <li><a href="contact.html">LOCATE</a></li>
            <li><a href="contact.html">TESTIMONIES</a></li>
            <li><a href="contact.html">DEVOTIONS</a></li>
            @guest
            <li><a href="/login">LOGIN</a></li>
            <li><a href="/register">SIGN UP</a></li>
             @else
             <li><a href="#">OFFICERS</a></li>
             <li><a href="#">CLASSES</a></li>

            @endguest

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
