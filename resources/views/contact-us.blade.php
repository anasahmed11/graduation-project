@extends('layouts.myapp')
@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-6 offset-md-3 text-center wow fadeInDown" data-wow-duration="2s" data-wow-offset="300">
                <br><br>
                <h2>Send Review And Contact-Us </h2>
                <br><br>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 wow fadeInDown"data-wow-duration="2s" data-wow-offset="300">
                <div class="home-img">
                    <img src="{{url('/images/pexels-photo-941572.jpeg')}}"  width="100%" class="img-responsive" alt="html5 bootstrap template">
                </div>
                <div class="h-desc desc wow fadeInUp"data-wow-duration="2s" data-wow-offset="300">
                    <h2>We Need Your Feedback</h2><br>
                    <p>
                       - we need your review to improve our services, and solve all problems you have ,
                        we hope to help you To the maximum extent possible .<br><br> - as a patient to find your doctor
                        and Healed completely and use our services In good form .<br><br> - as a doctor to use our integrated system
                        and we hope that our system help you in booking and in organizing your clinic, check your reservations<br><br>
                        - please send your review ,Thank You.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="review">
        <div class="row">
            <div class="container">
                <div class="col-md-6 offset-md-3 wow fadeInDown" data-wow-duration="2s" data-wow-offset="300">
                    <div class="form-login">
                        <h2 class="text-center">Send Review</h2>
                        {{Form::open(array('id'=>'new-clientrev-form'))}}
                        {{Form::text('name','',['class' => 'form-control','placeholder'=>'Enter Name'])}}<br>
                        {{Form::email('email','',['class' => 'form-control','placeholder'=>'E-mail Address'])}}<br>
                        {{Form::textarea('review','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'Write Your Review'])}}<br><br>
                        {{Form::submit('Send Review',['class' => 'btn btn-review btn-lg','id'=>'new-client-rev'])}}<br>
                        {{Form::close()}}
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
