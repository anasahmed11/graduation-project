<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>doctor</title>
    <link rel="icon" href="{{ url('/images/favicon.bmp') }}" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ url('/css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="{{ url('/css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="{{ url('css/dashstyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="overlay"></div>
        <div class="sidebar-heading">{{ Auth::user()->name }} </div>
        <div class="list-group list-group-flush">
            <a href="{{ url('/profile') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-md"></i> My Profile</a>
            <a href="{{ url('/my-history') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-history"></i> My history</a>
            <a href="{{ url('/my-bookings') }}" class="list-group-item list-group-item-action bg-light"><i class="far fa-clock"></i> My bookings</a>
            <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fas fa-history"></i> statistics</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary green" id="menu-toggle">Toggle Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <!-- Authentication Links -->
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

            </div>
        </nav>

        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<!-- color-setting -->
<button id="change"><i class="fas fa-sliders-h"></i></button>
<button id="red"></button>
<button id="blue"></button>
<button id="black"></button>
<button id="purple"></button>
<button id="green"></button>
<!-- end-color-setting -->

<!-- Bootstrap core JavaScript -->
<script src="{{ url('/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ url('/vendor/jquery/jquery.min.js') }}"></script>
<!--    wow.js file-->
<script src="{{ url('/js/wow.min.js') }}"></script>
<script>
    new WOW().init();

</script>
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQrODKqlrBHsjLiYro2kGGKZEfne0X_xI&callback=initMap">
</script>
<script src="{{ url('/js/custom.js') }}"></script>

</body>
</html>


