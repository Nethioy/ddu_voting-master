
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{ asset('css/adm/theme.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('fonts/fontawesome-webfont.woff2') }}" type="text/css">
         <link rel="stylesheet" href="{{ asset('fonts/glyphicons-halflings-regular.woff2') }}" type="text/css">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
      <script src="{{ asset('ck/ckeditor.js') }}"></script>
  
  <script src="{{ asset('ck/config.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <i class="fa d-inline fa-lg fa-cloud"></i>
        <b>{{ config('app.name', 'Laravel') }} </b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa d-inline fa-lg fa-bookmark-o"></i> News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa d-inline fa-lg fa-envelope-o"></i> Events</a>
          </li>
          <li class="nav-item">
            
          </li>
        </ul>
        @guest
        @if(!route('login'))
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="{{ route('login') }}">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign in</a>
          @endif
          @if(!route('register'))
          <a class="btn navbar-btn ml-2 text-white btn-secondary" href="{{ route('register') }}">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Register</a>
          @endif
        @else
        

 <div class="btn-group">
            <button class="btn navbar-btn ml-2 text-white btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="fa d-inline fa-lg fa-user-circle-o"></i> {{ Auth::user()->fname }} {{ Auth::user()->lname }} <span class="caret"></span> </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item"  href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('profile-form').submit();">
                                        {{ __('Profile') }}</a>
             <form id="profile-form" action="home/profile/{{Auth::user()->id }}" method="POST" style="display: none;">
                        @csrf
            </form>
          
            </div>
          </div>               
          <a class="btn navbar-btn ml-2 text-white btn-secondary" role="button" aria-haspopup="true" aria-expanded="false" v-pre href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-btn fa-sign-out"></i>Logout
                                    </a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
          @endguest
      </div>
    </div>
  </nav>

        <main class="py-4  ">
           <div class="p-1 w-100 h-100 mx-1">
    <div class="container-fluid w-100 h-100">
      <div class="row">
        <div class="col-md-12 w-100 h-100 py-3">
          <div class="row">
            <div class="col-3 bg-dark py-2">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="{{route('home')}}" class="active nav-link">
                    <i class="fa fa-home fa-home"></i>&nbsp;Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('posts.index')}}">News</a>
             
                 
                </li>
                <li class="nav-item">
                  <a href="{{route('users.index')}}" class="nav-link">Users</a>
                </li>
                <li class="nav-item">
                  <a href="/new/notification" class="nav-link">Create Notification</a>
                </li>
                 <li class="nav-item">
                  <a href="/setup/vote" class="nav-link">Setup voting</a>
                </li>
                 <li class="nav-item">
                  <a href="/report" class="nav-link">Generate Report</a>
                </li>
                 <li class="nav-item">
                  <a href="/user/privilage" class="nav-link">User Privilage</a>
                </li>
              </ul>
            </div>
            <div class="col-9 w-100 h-100 bg-light">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  


            
        </main>
    </div>
    <footer>
      <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-secondary">Student Union</h2>
          <p class="text-white">A r you may need, from website prototyping to publishing</p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-secondary">Mapsite</h2>
          <ul class="list-unstyled">
            <a href="#" class="text-white">Home</a>
            <br>
            <a href="#" class="text-white">About us</a>
            <br>
            <a href="#" class="text-white">Vote</a>
            <br>
            <a href="#" class="text-white">Events</a>
          </ul>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4">Contact</h2>
          <p>
            <a href="tel:+994" class="text-white">
              <i class="fa d-inline mr-3 text-secondary fa-phone"></i>+251 - 111 111 111</a>
          </p>
          <p>
            <a href="mailto:info@ddustudentunion.com" class="text-white">
              <i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>info@ddustudentunion.com</a>
          </p>
          <p>
            <a href="#" class="text-white" target="_blank">
              <i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>ddu</a>
          </p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-light">Subscribe</h2>
          <form>
            <fieldset class="form-group text-white">
              <label for="exampleInputEmail1">Get our newsletter</label>
              <input type="email" class="form-control" placeholder="Enter email"> </fieldset>
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-white">© Copyright {{date('Y')}}. DDU Student Union - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
    </footer>
  
</body>

</html>
                                                                                                                                                                                                                                                    