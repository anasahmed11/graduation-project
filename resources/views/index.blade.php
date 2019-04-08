@extends('layouts.myapp')
@section('content')
    <div class="slider">
        <div class="row">
            <div class="col-md-12">
                <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img src="{{ url('/images/slider/slider1.jpeg') }}" class="d-block w-100" width="100%" height="560px" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>Find your Doctor</h2>
                                    <p>find your doctor by search or in the map</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ url('/images/slider/slider2.jpeg') }}" class="d-block w-100" width="100%" height="560px" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>Book video chat</h2>
                                    <p>you can book video chat with your doctor</p>
                                </div>
                            </div>
                            <div class="carousel-item active">
                                <img src="{{ url('/images/slider/slider3.jpeg') }}" class="d-block w-100" width="100%" height="560px" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>Provide Statistics </h2>
                                    <p>provide statistics for doctors</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end slider -->
    <div class="our-app">
        <div class="row">
            <div class="container">
                <div class="col-md-6 offset-md-3 text-center wow fadeInDown"data-wow-duration="2s" data-wow-offset="300">
                    <h2>For Patients</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="newdoctor">
                <div class="row">
                    <div class="col-md-4 wow fadeInLeft"data-wow-duration="2s" data-wow-offset="300">
                        <div class="newdoctor-img">
                            <img src="{{ url('/images/b6.jpg') }}"  width="100%" alt="html5 bootstrap template" >
                        </div>
                    </div>
                    <div class="col-md-8 for-doctor-desc wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
                        <div>
                            <h2 class="wow fadeInDown"data-wow-duration="2s" data-wow-offset="300">For Patients</h2>
                            <p class="wow fadeInUp"data-wow-duration="2s" data-wow-offset="300">you can find your doctor in many Psychiatry fields <br>
                                you can book online via <span>Fawry , Vodafone cash , visa card</span><br>
                                you can book video chat consultation <br>
                                you can find your doctor via map that enable easy searching<br>
                                find history for your visits and your appointments</p>
                            <a href ="{{ url('/start') }}"><button class="btn btn-send">Start App</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end our-app -->
    <div class="our-app">
        <div class="container">
            <div class="service">
            <div class="row">
                <div class="col-md-3 wow slideInLeft"data-wow-duration="2.5s" data-wow-offset="300">
                    <div class="services1">
                        <i class="fas fa-user-shield"></i>
                        <p>more security for patients,all information secured and secret ,only you can read it</p>
                    </div>
                </div>
                <div class="col-md-3 wow slideInLeft"data-wow-duration="2.4s" data-wow-offset="300">
                    <div class="services2">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>very fast responses and reservations, you can make it from home in minutes </p>
                    </div>
                </div>
                <div class="col-md-3 wow slideInLeft"data-wow-duration="2.2s" data-wow-offset="300">
                    <div class="services3">
                        <i class="fas fa-users-cog"></i>
                        <p>Easy to use our app ,easy booking , easy searching  , register only and we will help you </p>
                    </div>
                </div>
                <div class="col-md-3 wow slideInLeft"data-wow-duration="2s" data-wow-offset="300">
                    <div class="services4">
                        <i class="fas fa-location-arrow"></i>
                        <p>more accurate information  reliability , online history many doctors , many Psychiatry fields</p>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>
    <div class="our-app-doctor">
        <div class="row">
            <div class="container">
                <div class="col-md-6 offset-md-3 text-center wow fadeInDown"data-wow-duration="2s" data-wow-offset="300">
                    <h2>For Doctors</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="for-doctor">
                <div class="row">
                    <div class="col-md-4 wow fadeInLeft"data-wow-duration="2s" data-wow-offset="300">
                        <div class="for-doctor-img">
                            <img src="{{ url('/images/person_3.jpg') }}"  width="100%" alt="html5 bootstrap template" >
                        </div>
                    </div>
                    <div class="col-md-8 for-doctor-desc wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
                        <div>
                            <h2 class="wow fadeInDown"data-wow-duration="2s" data-wow-offset="300">For Doctors</h2>
                            <p class="wow fadeInUp"data-wow-duration="2s" data-wow-offset="300">as a doctor you can manage your Reservations<br>
                                you can gain more patients <br>
                                our app enable easy communications between you and patients <br>
                                we provide statistics for you and always up-to-date<br>
                                we provide integreated system for you </p>
                            <a href ="{{ url('/newdoctor') }}"><button class="btn btn-send">New doctor</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end our-app-doctor -->
    <div class="our-app-link">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center wow fadeInUp"data-wow-duration="2s" data-wow-offset="300">
                    <div class="links-form">
                        <h2>Our Links</h2><br><br>
                        <a href="#"><button class="btn btn-block btn-links btn-face"><i class="fab fa-facebook-f"></i> Facebook Page</button></a><br><br>
                        <a href="#"><button class="btn btn-block btn-links btn-insta"><i class="fab fa-instagram"></i> Instagram Page</button></a><br><br>
                        <a href="#"><button class="btn btn-block btn-links btn-twit"><i class="fab fa-twitter"></i> twitter Page</button></a><br><br>
                        <a href="#"><button class="btn btn-block btn-links btn-ios"><i class="fab fa-apple"></i> IOS App Link</button></a><br><br>



                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- end our-app-link -->
@endsection
