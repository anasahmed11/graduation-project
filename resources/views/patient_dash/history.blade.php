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
                        <th>payment_method</th>
                        <th>visit_type</th>
                        <th>date</th>
                        <th>time</th>
                        <th>details</th>
                        <th>rate</th>
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
                                @foreach($notes as $note)
                                    @if($visit->id == $note->v_id )
                                        <td><button class="details btn btn-danger"  data-toggle="modal" data-target="#details" data-id="{{ $visit->id }}" data-note="{{ $note->notes }}" data-drug="{{ $note->drugs }}" >details</button></td>
                                    @endif
                                @endforeach
                                @foreach($rates as $rate)
                                    @if($visit->d_id == $rate->d_id )
                                        <td><button class="rate btn btn-send"  data-toggle="modal" data-target="#rate" data-id="{{ $rate->d_id }}" data-rate="{{ $rate->rate }}" data-times="{{ $rate->times }}" >rate</button></td>
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
    <!-- note Modal -->
    <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="note-view">
                        <p class="note-p"></p>
                    </div>
                    <div class="drug-view">
                        <p class="drug-p"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- rate Modal -->
    <div class="modal fade" id="rate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">rate doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('id'=>'rate-form'))}}
                    {{Form::label('rate', 'rate')}}
                    {{ Form::select('rates',array('5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10),null,['class' => 'form-control','id'=>'doctor-rates']) }}<br>
                    {{ Form::hidden('times','', ['class' => 'form-control','id'=>'doctor-times']) }}
                    {{ Form::hidden('rate','', ['class' => 'form-control','id'=>'doctor-rate']) }}
                    {{Form::submit('rate doctor',['class' => 'btn btn-block btn-book','id'=>'new-rate'])}}<br>
                    {{ Form::close() }}
                    <br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
