@extends('layouts.myapp')
@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-6 offset-md-3 text-center wow fadeInDown" data-wow-duration="2s" data-wow-offset="300">
                <br><br>
                <h2>Are You A New Doctor ?</h2>
                <br><br>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="newdoctor">
        <div class="row">
            <div class="col-md-4 wow fadeInLeft"data-wow-duration="2s" data-wow-offset="300">
                <div class="newdoctor-img">
                    <img src="{{ url('/images/person_2.jpg') }}"  width="100%" alt="html5 bootstrap template" >
                </div>
            </div>
            <div class="col-md-8 newdoctor-desc wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
                <div>
                    <h2>Join-Us</h2><br>
                    <p>In order to maintain the credibility of the application and patient safety and security
                        of the site and also your information and patients and seriousness in the application <br>
                        we ask you to <span>fill this form</span>  to contact with our admin to add you in the application<br>
                        and we will send email for you or coll you soon , Thank You
                    </p>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="newdoctor">
        <div class="row">
            <div class="container">
                <div class="col-md-6 offset-md-3  wow fadeInUp"data-wow-duration="2s" data-wow-offset="300">
                    <div class="form-login">
                        <h2 class="text-center">Join-us</h2>
                        {{Form::open(array('id'=>'new-doctorreq-form'))}}
                        {{Form::text('name','',['class' => 'form-control','placeholder'=>'Your Name'])}}<br>
                        {{Form::email('email','',['class' => 'form-control','placeholder'=>'Email'])}}<br>
                        {{Form::text('phone','',['class' => 'form-control','placeholder'=>'Phone'])}}<br>
                        {{Form::text('certificates','',['class' => 'form-control','placeholder'=>'certificates'])}}<br>
                        {{Form::number('age','',['class' => 'form-control','placeholder'=>'age'])}}<br>
                        {{Form::number('experience','',['class' => 'form-control','placeholder'=>'Years Of Experience'])}}<br><br>
                        {{Form::submit('Send Data',['class' => 'btn btn-lg btn-review','id'=>'new-doctor-req'])}}<br>
                        {{Form::close()}}
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
