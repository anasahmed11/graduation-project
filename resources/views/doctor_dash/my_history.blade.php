@extends('layouts.doctor_dash')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 c_text login_page col-md-4 wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
                <table class="doc-table table table-responsive table-striped ">
                    <thead>
                    <tr>
                        <th>visit_id</th>
                        <th>patient_name</th>
                        <th>patient_phone</th>
                        <th>patient_age</th>
                        <th>payment_method</th>
                        <th>visit_type</th>
                        <th>date</th>
                        <th>time</th>
                        <th>notes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($visits as $visit)
                        @if(Auth::user()->id == $visit->d_id )
                            <tr class="visit-{{$visit->p_id}}">
                                <td>{{ $visit->id }} </td>
                                @foreach($patients as $patient)
                                    @if($visit->p_id == $patient->u_id )
                                        <td>{{ $patient->name }}</td>
                                    @endif
                                @endforeach
                                @foreach($patients as $patient)
                                    @if($visit->p_id == $patient->u_id )
                                        <td>{{ $patient->phone }}</td>
                                    @endif
                                @endforeach
                                @foreach($patients as $patient)
                                    @if($visit->p_id == $patient->u_id )
                                        <td>{{ $patient->age }}</td>
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
                                <td><button class="notes btn  btn-primary"  data-toggle="modal" data-target="#notes" data-id="{{ $visit->id }}" >notes</button><br>

                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- note Modal -->
    <div class="modal fade" id="notes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">add notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('id'=>'notes-form'))}}
                    {{ Form::hidden('v_id', '', ['class' => 'form-control','id'=>'visit-id']) }}
                    {{Form::label('notes', 'notes')}}
                    {{Form::textarea('notes','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'notes'])}}<br><br>
                    {{Form::label('drugs', 'drugs')}}
                    {{Form::textarea('drugs','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'drugs'])}}<br><br>
                    {{Form::submit('add notes',['class' => 'btn btn-block btn-book','id'=>'new-notes'])}}<br>
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

