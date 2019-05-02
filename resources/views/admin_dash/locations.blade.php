@extends('layouts.admin_dash')
@section('content')
    <div class="row">
        <div class="col-md-12 c_text login_page col-md-4 wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
            <table class="method-table table table-responsive table-striped ">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>long</th>
                    <th>lat</th>
                    <th>doctor_id</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($locations as $location)

                    <tr class="location-{{$location->id}}">
                        <td>{{ $location->id }} </td>
                        <td>{{ $location->name }}</td>
                        <td>{{ $location->long }}</td>
                        <td>{{ $location->lat }}</td>
                        <td>{{ $location->d_id }}</td>
                        <td><button class="edit-location btn btn-success"  data-toggle="modal" data-target="#edit-modal-location" data-id="{{ $location->id }}" data-name="{{ $location->name }}" data-long="{{ $location->long }}" data-lat="{{ $location->lat }}" data-doctor="{{ $location->d_id }}">update</button></td>
                        <td><button class="delete-location btn btn-danger" data-id="{{ $location->id }}">delete</button></td>
                    </tr>

                @endforeach



                </tbody>
            </table>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalCenter-new">Add new</button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">new method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('id'=>'add-location-form'))}}
                    {{Form::label('name', 'name')}}
                    {{Form::text('name','',['class' => 'form-control'])}}<br>
                    {{Form::label('long', 'long')}}
                    {{Form::number('long','',['class' => 'form-control','step'=>'0.0000000001'])}}<br>
                    {{Form::label('lat', 'lat')}}
                    {{Form::number('lat','',['class' => 'form-control','step'=>'0.0000000001'])}}<br>
                    {{Form::label('doctor_id', 'doctor_id')}}
                    {{Form::number('d_id','',['class' => 'form-control'])}}<br><br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'new-location'])}}
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

    <!-- Modal -->
    <div class="modal fade" id="edit-modal-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">update item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('id'=>'edit-location-form'))}}
                    {{Form::label('name', 'name')}}
                    {{Form::text('name','',['class' => 'form-control','id'=>'name-edit'])}}<br>
                    {{Form::label('long', 'long')}}
                    {{Form::number('long','',['class' => 'form-control','id'=>'long-edit','step'=>'0.0000000001'])}}<br>
                    {{Form::label('lat', 'lat')}}
                    {{Form::number('lat','',['class' => 'form-control','id'=>'lat-edit','step'=>'0.0000000001'])}}<br>
                    {{Form::label('doctor_id', 'doctor_id')}}
                    {{Form::number('d_id','',['class' => 'form-control','id'=>'d_id-edit'])}}<br><br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'edit-location'])}}
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


