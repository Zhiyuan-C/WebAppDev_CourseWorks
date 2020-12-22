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
    <div class="container">
      
      <!-- Header -->
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <!-- Site name -->
          <div class="col-8">
            <a class="blog-header-logo text-dark" href="{{ secure_url('/') }}">BRV - Book Review</a>
          </div>
          
          <!-- Search -->
          <div class="col-3 no_padding">
            <form class="form-inline" method="post" action="/search_result">
              {{csrf_field()}}
              <input class="form-control mr-sm-1 w-75" type="search" name="search" placeholder="Search" />
              <button class="btn btn-sm btn-outline-secondary" type="submit">Search</button>
            </form>
          </div>
          
          <!-- Add book -->
          <div class="col-1">
            <a class="btn btn-sm btn-outline-secondary" href="{{ secure_url('/action/add') }}">Add Book</a>
          </div>
          
        </div> <!-- end row -->
      </header>
        
      <!-- Navigation -->
      <ul class="nav nav-tabs">
        <!-- Home -->
        <li class="nav-item">
          <a @yield('home_class') class="nav-link"  href="{{ secure_url('/') }}">Home</a>
        </li>
        <!-- Sorting -->
        <li class="nav-item dropdown">
          <a @yield('sort') class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sort by reviews</a>
          <div class="dropdown-menu">
            <a @yield('num_rev') class="dropdown-item" href="{{ secure_url('/num_rev') }}">Number of reviews</a>
            <a @yield('ave_rev') class="dropdown-item" href="{{ secure_url('/ave_rev') }}">Average rating</a>
          </div>
        </li>
        <!-- Categories -->
        <li class="nav-item">
          <a @yield('fantasy') class="nav-link"  href="{{ secure_url('/fantasy') }}">Fantasy</a>
        </li>
        <li class="nav-item">
          <a @yield('fiction') class="nav-link"  href="{{ secure_url('/fiction') }}">Fiction</a>
        </li>
        <li class="nav-item">
          <a @yield('detective') class="nav-link"  href="{{ secure_url('/detective') }}">Detective</a>
        </li>
        <li class="nav-item">
          <a @yield('romance') class="nav-link"  href="{{ secure_url('/romance') }}">Romance</a>
        </li>
        <!-- Documentation -->
        <li class="nav-item">
          <a @yield('documentation') class="nav-link"  href="{{ secure_url('/documentation') }}">Documentation</a>
        </li>
      </ul>
      
      <!-- Main Content -->
      <div class="home_jumb">@yield('homeJumb')</div>
      <div>@yield('content')</div>
 
    </div> <!--End container-->
    
    <!-- Bootstrap jQuery, Bootstrap Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Customise JS -->
    <script src="{{secure_asset('js/main.js')}}"></script>
  </body>
</html>