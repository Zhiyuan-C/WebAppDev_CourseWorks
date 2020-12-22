<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Customise CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/style.css')}}">
  </head>
  
  <body>
    <!-- Header -->
    <div class="sticky_header">
      <div class="container">
        <header class="blog-header py-3">
          <div class="row flex-nowrap justify-content-between align-items-center">
            <!-- Site name -->
            <div class="col-9">
              <a class="blog-header-logo text-dark" href="{{ secure_url('/') }}">ANRV - Anime Review</a>
            </div>
            <!-- login-logout-regist -->
            <div class="col-3 no_padding">
              <!-- Add anime -->
              <a class="btn btn-outline-secondary" href="{{ secure_url('/anime/create') }}">Add Anime</a>
              @if (Auth::guest())
                <!-- Login + Register -->
                <a class="btn btn-outline-secondary" href="{{ route('login') }}">Login</a>
                <a class="btn btn-outline-secondary" href="{{ route('register') }}">Register</a>
              @else
                <!-- User -->
                <span class="dropdown">
                  <button class="btn {{Auth::user()->type_id == 1 ? 'btn-secondary' : 'btn-info'}} dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->nick_name }}
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <!-- dashboard -->
                    <a class="dropdown-item" href="{{route('home')}}">Dashboard</a>
                    <!-- log out -->
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                </span>
              @endif
            </div> <!--end login-logout-regist -->
          </div> <!-- end row -->
          
        </header>
        
        <!-- Navigation -->
        <ul class="nav nav-tabs">
          <!-- Home -->
          <li class="nav-item">
            <a @yield('home_class') class="nav-link"  href="{{ secure_url('/') }}">Home</a>
          </li>
          <!-- studios $studios from ComposerServiceProvider -->
          @foreach ($studios as $studio)
            <li class="nav-item">
              <a @yield('{{$studio->name}}') class="nav-link"  href="{{route('anime.showStudio', ['studio' => $studio->id])}}">{{$studio->name}}</a>
            </li>
          @endforeach
          <!-- Documentation -->
          <li class="nav-item">
            <a @yield('documentation') class="nav-link"  href="{{ route('document.show') }}">Documentation</a>
          </li>
        </ul>
      </div>
    </div> <!--End sticky header-->
    
    <div class="container main_container">
      <!-- Main Content -->
      <div class="home_jumb">@yield('homeJumb')</div>
      <div class="main">@yield('content')</div>
    </div> <!--End container-->

    <!-- Bootstrap jQuery, Bootstrap Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Customise JS -->
    <script src="{{secure_asset('js/main.js')}}"></script>
  </body>
</html>