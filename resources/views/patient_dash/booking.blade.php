@extends('layouts.patient_dash')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 c_text login_page col-md-4 wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
                <table class="doc-table table table-responsive table-striped ">
                    <thead>
                    <tr>
                        <th>visit_id</th>
                        <th>doctor_name</th>
                        <th>doctor_photo</th>
                        <th>payment_method</th>
                        <th>visit_type</th>
                        <th>date</th>
                        <th>time</th>
                        <th>location</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($visits as $visit)
                        @if(Auth::user()->id == $visit->p_id )
                            <tr class="visit-{{$visit->p_id}}">
                                <td>{{ $visit->id }} </td>
                                @foreach($doctors as $doctor)
                                    @if($visit->d_id == $doctor->u_id )
                                        <td>{{ $doctor->name }}</td>
                                    @endif
                                @endforeach
                                @foreach($doctors as $doctor)
                                    @if($visit->d_id == $doctor->u_id )
                                        <td><img src="{{ url("/uploads/$doctor->photo") }}" width="100px" ></td>
                                    @endif
                                @endforeach
                                @foreach($methods as $method)
                                    @if($visit->pay_id == $method->id )
                                        <td>{{ $method->method }}</td>
                                    @endif
                                @endforeach
                                @foreach($types as $type)
                                    @if($visit->type_id == $type->id )
                                        <td>{{ $type->type }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $visit->date }}</td>
                                <td>{{ $visit->time }}</td>
                                @foreach($locations as $location)
                                    @if($visit->d_id == $location->d_id )
                                        <td><button class="doctor-info btn  btn-primary"  data-toggle="modal" data-target="#doctor-info" data-id="{{ $visit->d_id }}" data-lat="{{ $location->lat }}" data-long="{{ $location->long }}" data-name="{{ $location->name }}">location</button><br>
                                    @endif
                                @endforeach
                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- doctor_info Modal -->
    <div class="modal fade" id="doctor-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
@endsection

