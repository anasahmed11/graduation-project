@extends('layouts.admin_dash')
@section('content')
    <div class="row">
        <div class="col-md-12 c_text login_page col-md-4 wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
            <table class="method-table table table-responsive table-striped ">
                <thead>
                <tr>
                    <th>id</th>
                    <th>type</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($methods as $method)

                    <tr class="method-{{$method->id}}">
                        <td>{{ $method->id }} </td>
                        <td>{{ $method->method }}</td>
                        <td><button class="edit-pay btn btn-success"  data-toggle="modal" data-target="#edit-modal-method" data-id="{{ $method->id }}" data-title="{{ $method->method }}" >update</button></td>
                        <td><button class="delete-pay btn btn-danger" data-id="{{ $method->id }}">delete</button></td>
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
                    {{Form::open(array('id'=>'add-pay-form'))}}
                    {{Form::label('method', 'method')}}
                    {{Form::text('method','',['class' => 'form-control', 'id'=>'new-method'])}}<br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'new-pay'])}}
                    {{ Form::close() }}
                    <br>
                    <div class="pay alert alert-success">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit-modal-method" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">update item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('id'=>'edit-pay-form'))}}
                    {{method_field('PUT')}}
                    {{Form::label('method', 'method')}}
                    {{Form::text('method', '' ,['class' => 'form-control','id' => 'pay-edit'])}}<br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'edit-pay'])}}
                    {{ Form::close() }}
                    <br>
                    <div class="pay alert alert-success">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection

