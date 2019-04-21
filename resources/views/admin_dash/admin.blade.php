@extends('layouts.admin_dash')
@section('content')
    <div class="row">
        <div class="col-md-12 c_text login_page col-md-4 wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
            <table class="doc-table table table-responsive table-striped ">
                <thead>
                <tr>
                    <th>u_id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>city</th>
                    <th>certificates</th>
                    <th>photo</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($doctors as $doctor)

                    <tr class="doc-{{$doctor->u_id}}">
                        <td>{{ $doctor->u_id }} </td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->address }}</td>
                        <td>{{ $doctor->Certificates }}</td>
                        <td><img src="{{ url("/uploads/$doctor->photo") }}" width="100px" ></td>
                        <td><button class="delete-blog btn btn-danger" data-id="{{ $doctor->id }}">delete</button></td>
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
                    {{Form::open(array('id'=>'add-doctor-form','enctype'=>'multipart/form-data'))}}
                    {{Form::label('name', 'name')}}
                    {{Form::text('name','',['class' => 'form-control'])}}<br>
                    {{Form::label('email', 'email')}}
                    {{Form::email('email','',['class' => 'form-control','placeholder'=>'Email'])}}<br>
                    {{Form::password('password',['class' => 'form-control','placeholder'=>'password'])}}<br>
                    {{Form::password('password_confirmation',['class' => 'form-control','placeholder'=>'password','id' => 'password-confirm'])}}<br>
                    {{Form::label('city', 'city')}}
                    {{Form::text('address','',['class' => 'form-control'])}}<br>
                    {{Form::textarea('certificates','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'Write certificates'])}}<br><br>
                    {{Form::label('photo', 'photo')}}
                    {{Form::file('photo',['id'=>'photo-doc-new'])}}<br><br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'new-doctor-add'])}}
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
                    {{Form::open(array('id'=>'edit-blog-form'))}}
                    {{Form::label('title', 'title')}}
                    {{Form::text('name','',['class' => 'form-control','id'=>'doc-nam-edit'])}}<br>
                    {{Form::label('article', 'article')}}
                    {{Form::textarea('article','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'Write article','id'=>'article-edit'])}}<br>
                    {{Form::label('photo', 'photo')}}
                    {{Form::file('photo',['class' => 'btn btn-dark'])}}<br><br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'edit-blog'])}}
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
