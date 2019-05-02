@extends('layouts.patient_dash')
@section('content')
<div class="container">
    <div class="row">
        @foreach($doctors as $doctor)
            <div class="col-md-4 doctor-book wow fadeIn" data-wow-duration="2s" data-wow-offset="300">
                <img class="wow fadeInDown" data-wow-duration="2s" data-wow-offset="300" src="{{ url("/uploads/$doctor->photo") }}" width="150px" ><br>
                <h2 >{{$doctor->name}}</h2>
                @foreach($rates as $rate)
                    @if($doctor->u_id == $rate->d_id )
                        @if($rate->rate <=5 )
                            <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half"></i>
                                            <br>
                            </span>
                        @else
                            <span>
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

                @foreach($methods as $method)
                    @foreach($prices as $price)
                        @if($doctor->u_id == $price->d_id)
                            @if($method->id==$price->type_id)

                                <p class="p-price"><span class="certificate">{{$method->type}} : </span>@if($method->id===1)<i class="fas fa-clinic-medical"></i>@else<i class="fas fa-video"></i>@endif{{ $price->price }} EGP</p>

                            @endif
                        @endif
                    @endforeach
                @endforeach
                @foreach($locations as $location)
                    @if($doctor->u_id == $location->d_id)
                        <br>
                        <button class="see-location btn btn-block btn-primary"  data-toggle="modal" data-target="#see-location" data-id="{{ $location->d_id }}" data-lat="{{ $location->lat }}" data-long="{{ $location->long }}" data-name="{{ $location->name }}">See Location</button><br>
                    @endif
                @endforeach
                <button class="book btn btn-block btn-book"  data-toggle="modal" data-target="#book-modal" data-id="{{ $doctor->u_id }}" data-patient="{{ Auth::user()->id }}" ><i class="fas fa-stethoscope"></i> Book</button><br>
            </div>
        @endforeach
    </div>
</div>
<!-- see location Modal -->
<div class="modal fade" id="see-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div id="doctor-map"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- see location Modal -->
<div class="modal fade" id="book-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Book Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                {{Form::open(array('id'=>'book-form'))}}
                {{ Form::hidden('d_id', '', ['class' => 'form-control','id'=>'visit-doc-id']) }}
                {{ Form::hidden('p_id', '', ['class' => 'form-control','id'=>'visit-patient-id']) }}
                {{Form::label('date', 'date')}}
                {{ Form::date('date', '', ['class' => 'form-control','id'=>'visit-date'])}}<br>
                {{Form::label('date', 'date')}}
                {{ Form::time('date', '', ['class' => 'form-control','id'=>'visit-date'])}}<br>
                {{Form::label('city', 'city')}}
                {{Form::text('address','',['class' => 'form-control','id'=>'address-edit'])}}<br>
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
@endsection
