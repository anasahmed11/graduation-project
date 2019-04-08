@extends('layouts.admin_dash')
@section('content')
    <div class="row">
        <div class="col-md-12 c_text login_page col-md-4 wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
            <table class="method-table table table-responsive table-striped ">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)

                    <tr class="category-{{$category->id}}">
                        <td>{{ $category->id }} </td>
                        <td>{{ $category->name }}</td>
                        <td><button class="edit-category btn btn-success"  data-toggle="modal" data-target="#edit-modal-method" data-id="{{ $category->id }}" data-title="{{ $category->name }}" >update</button></td>
                        <td><button class="delete-category btn btn-danger" data-id="{{ $category->id }}">delete</button></td>
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
                    {{Form::open(array('id'=>'add-category-form'))}}
                    {{Form::label('name', 'name')}}
                    {{Form::text('name','',['class' => 'form-control'])}}<br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'new-category'])}}
                    {{ Form::close() }}
                    <br>
                    <div class="cat alert alert-success">

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
                    {{Form::open(array('id'=>'edit-category-form'))}}
                    {{method_field('PUT')}}
                    {{Form::label('name', 'name')}}
                    {{Form::text('name', '' ,['class' => 'form-control','id' => 'category-edit'])}}<br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'edit-category'])}}
                    {{ Form::close() }}
                    <br>
                    <div class="cat alert alert-success">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection

