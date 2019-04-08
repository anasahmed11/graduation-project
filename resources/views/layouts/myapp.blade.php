<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <!--    internet explorer compatibility meta-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--    first mobile meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>THERAPO</title>
    <link rel="icon" href="{{ url('/images/favicon.bmp') }}" type="image/x-icon">
    <!--    bootstrap-->
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/animate.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet"href="{{ url('/css/style.css') }}">
</head>
<body>
<!-- main -->
<div id="main">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <img src="{{ url('/images/4.png') }}">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="navv">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light ">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ url('/blog') }}">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/start') }}">Start App</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/newdoctor') }}">New Doctor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/contact-us') }}">Contact-Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

    </header>
    @yield('content')
    <footer>
        <div class="row">
            <div class="col-md-12">
                <p> <i class="fa fa-copyright" aria-hidden="true"></i>
                    ALL Rights Reserved, THERAPO Team 2019</p>
            </div>

        </div>
    </footer>

</div>
<!-- end main -->
<!-- scripts -->
<script src="{{ url('/js/html5shiv.min.js') }}"></script>
<script src="{{ url('/js/jquery/jquery-2.2.4.min.js') }}"></script>
<script src="{{ url('/js/bootstrap.min.js') }}"></script>
<!--    wow.js file-->
<script src="{{ url('/js/wow.min.js') }}"></script>
<script>
    new WOW().init();

</script>
<script src="{{ url('/js/my-app.js') }}"></script>
<script src="{{ url('/js/mainpages.js') }}"></script>
</body>
</html>
