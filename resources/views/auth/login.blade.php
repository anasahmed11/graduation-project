@extends('layouts.myapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="col-md-6 offset-md-3 text-center wow fadeInDown" data-wow-duration="2s" data-wow-offset="300">
                <br><br>
                <h2>login and start app</h2>
                <br><br>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 wow fadeInLeft"data-wow-duration="2s" data-wow-offset="300">
                <div class="home-img">
                    <img src="{{url('/images/blog-6.jpg')}}" height="300px" width="100%"class="img-responsive" alt="html5 bootstrap template">

                </div>
                <div class="h-desc">
                    <h2>As A Patient</h2><br>
                    <p>Login now with your email and password to open your profile and find doctors</p>


                </div>
            </div>
            <div class="col-md-4 wow fadeInUp"data-wow-duration="2s" data-wow-offset="300" >
                <div class="home-img">
                    <img src="{{url('/images/blog-2.jpg')}}" height="400px" width="100%"class="img-responsive" alt="html5 bootstrap template">

                </div>
                <div class="h-desc">
                    <h2>Are You New Patient ?</h2><br>
                    <p>Click on <span>Patient Register</span> to fill the data and start the app and find your doctor</p>


                </div>
            </div>
            <div class="col-md-4 wow fadeInRight"data-wow-duration="2s" data-wow-offset="300" >
                <div class="home-img">
                    <img src="{{url('/images/pexels-photo-941693.jpeg')}}" height="300px" width="100%"class="img-responsive" alt="html5 bootstrap template">

                </div>
                <div class="h-desc">
                    <h2>As a Doctor</h2><br>
                    <p>Login now with your email and password to open your profile and manage your Reservations and check your statistics </p>


                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 wow fadeInUp"data-wow-duration="2s" data-wow-offset="300">
            <div class="card">
                <div class="card-header">
                    <h2>Sign In</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-8 offset-md-4">
                                <button class="btn  btn-register" data-toggle="modal" data-target="#exampleModalCenter-new">Patient Register</button>
                            </div>
                            @include('inc.messages')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Patient Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('age') }}</label>

                        <div class="col-md-6">
                            <input id="age" type="number" class="form-control" name="age" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="string" class="form-control" name="phone" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
