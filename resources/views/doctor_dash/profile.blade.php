@extends('layouts.doctor_dash')
@section('content')
    <div class="container">
            @foreach($doctors as $doctor)
                @if(Auth::user()->id == $doctor->u_id )
                    <div class="row">
                        <div class="col-md-4 offset-4 profile-img">
                            <img class="wow fadeInDown" data-wow-duration="2s" data-wow-offset="300" src="{{ url("/uploads/$doctor->photo") }}" width="150px" ><br>
                            <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="300">{{$doctor->name}}</h2>
                            @foreach($rates as $rate)
                                @if(Auth::user()->id == $rate->d_id )
                                    @if($rate->rate/$rate->times <=5 )
                                        <span class=" wow flash"data-wow-duration="2s" data-wow-offset="300">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half"></i>
                                            <br>
                                        </span>
                                     @else
                                        <span class=" wow flash"data-wow-duration="2s" data-wow-offset="300">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half"></i>
                                            <br>
                                        </span>
                                     @endif
                                @endif
                             @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 profile-info wow fadeInLeft"data-wow-duration="2s" data-wow-offset="300" >
                            <p class="certificate"><i class="fas fa-graduation-cap"></i>Certificates : </p>
                            <p class="certificate-desc">{{$doctor->Certificates}}</p>
                        </div>
                        <div class="col-md-4 profile-mail wow fadeInDown"data-wow-duration="2.3s" data-wow-offset="300" >
                            <p class="p-email"><span class="certificate">Email : </span><i class="fas fa-address-card"></i>{{ $doctor->email}}</p>
                            <p class="p-address"><span class="certificate">city : </span><i class="fas fa-map-marker-alt"></i>{{$doctor->address}}</p>
                        </div>
                        <div class="col-md-4 profile-prices wow fadeInRight"data-wow-duration="2.6s" data-wow-offset="300">
                            @foreach($methods as $method)
                                @foreach($prices as $price)
                                    @if(Auth::user()->id == $price->d_id)
                                        @if($method->id==$price->type_id)
                                            <p class="p-price"><span class="certificate">{{$method->type}} : </span>@if($method->id===1)<i class="fas fa-clinic-medical"></i>@else<i class="fas fa-video"></i>@endif{{ $price->price }} EGP</p>

                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-offset="300">
                            <button class="set-price1 btn btn-block btn-primary"  data-toggle="modal" data-target="#set-modal-1" data-id="{{ $doctor->u_id }}"  >Set Ordinary visit price</button><br>
                        </div>
                        <div class="col-md-6 wow fadeInRight" data-wow-duration="2s" data-wow-offset="300">
                            <button class="set-price2 btn btn-block btn-primary"  data-toggle="modal" data-target="#set-modal-2" data-id="{{ $doctor->u_id }}"  >Set Video chat price</button><br>
                        </div>
                    </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 wow fadeInDown" data-wow-duration="2s" data-wow-offset="300">
                                @foreach($locations as $location)
                                    @if($location->d_id == Auth::user()->id)
                                        <div id="map" data-id="{{$location->d_id}}" data-name="{{$location->name}}" data-long="{{$location->long}}" data-lat="{{$location->lat}}"></div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <button class="edit-doctor btn btn-block btn-success"  data-toggle="modal" data-target="#edit-modal-doc" data-id="{{ $doctor->u_id }}" data-name="{{ $doctor->name }}" data-email="{{ $doctor->email }}" data-photo="{{ $doctor->photo }}" data-cert="{{ $doctor->Certificates }}" data-address="{{ $doctor->address }}">Edit Profile</button>
                        </div>
                    </div>
                    </div>

                @endif
            @endforeach
    </div>
    <!-- Modal -->
    <div class="modal fade" id="edit-modal-doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">update profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('id'=>'edit-doctor-form','enctype'=>'multipart/form-data'))}}
                    {{Form::label('name', 'name')}}
                    {{Form::text('name','',['class' => 'form-control','id'=>'doc-name-edit'])}}<br>
                    {{Form::label('email', 'email')}}
                    {{Form::email('email','',['class' => 'form-control','placeholder'=>'Email','id'=>'doc-email-edit'])}}<br>
                    {{Form::password('password',['class' => 'form-control','placeholder'=>'password'])}}<br>
                    {{Form::password('password_confirmation',['class' => 'form-control','placeholder'=>'password','id' => 'password-confirm'])}}<br>
                    {{Form::label('city', 'city')}}
                    {{Form::text('address','',['class' => 'form-control','id'=>'address-edit'])}}<br>
                    {{Form::textarea('certificates','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'Write certificates','id'=>'certificates-edit'])}}<br><br>
                    {{Form::label('photo', 'photo')}}
                    {{Form::file('photo',['id'=>'photo-doc-edit'])}}<br><br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'new-doctor-edit'])}}
                    {{ Form::close() }}
                    <br>
                    <div class="met alert alert-success">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- price 1 Modal -->
    <div class="modal fade" id="set-modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">update profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="price-hint">
                            please set your prices for first time only <br>
                            if you want to change your  prices make a <br>
                            request to the admin
                        </p>
                    </div>
                    {{Form::open(array('id'=>'set-price1-form'))}}
                    {{Form::label('Ordinary visit', 'Ordinary visit')}}
                    {{Form::number('price','',['class' => 'form-control'])}}<br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'set-price1'])}}
                    {{ Form::close() }}
                    <br>
                    <div class="met alert alert-success">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- price 2 Modal -->
    <div class="modal fade" id="set-modal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">update profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="price-hint">
                            please set your prices for first time only <br>
                            if you want to change your  prices make a <br>
                            request to the admin
                        </p>
                    </div>
                    {{Form::open(array('id'=>'set-price2-form'))}}
                    {{Form::label('Video Chat', 'Video Chat')}}
                    {{Form::number('price','',['class' => 'form-control'])}}<br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'set-price2'])}}
                    {{ Form::close() }}
                    <br>
                    <div class="met alert alert-success">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- price 1 edit  Modal -->
    <div class="modal fade" id="edit-modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">update profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('id'=>'edit-price1-form'))}}
                    {{Form::label('Ordinary visit', 'Ordinary visit')}}
                    {{Form::number('price','',['class' => 'form-control'])}}<br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'edit-price1'])}}
                    {{ Form::close() }}
                    <br>
                    <div class="met alert alert-success">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- price 2 edit Modal -->
    <div class="modal fade" id="edit-modal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">update profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('id'=>'edit-price2-form'))}}
                    {{Form::label('Video Chat', 'Video Chat')}}
                    {{Form::number('price','',['class' => 'form-control'])}}<br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'edit-price2'])}}
                    {{ Form::close() }}
                    <br>
                    <div class="met alert alert-success">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

