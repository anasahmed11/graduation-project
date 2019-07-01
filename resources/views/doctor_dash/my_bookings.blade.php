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
                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


