@extends('layouts.admin_dash')
@section('content')
    <div class="row">
        <div class="col-md-12 c_text login_page col-md-4 wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
            <table class="method-table table table-responsive table-striped ">
                <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>article</th>
                    <th>photo</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($blogs as $blog)

                    <tr class="blog-{{$blog->id}}">
                        <td>{{ $blog->id }} </td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->article }}</td>
                        <td><img src="{{ url("/uploads/$blog->photo") }}" width="100px" ></td>
                        <td><button class="edit-blog btn btn-success"  data-toggle="modal" data-target="#edit-modal-method" data-id="{{ $blog->id }}" data-title="{{ $blog->title }}" data-article="{{ $blog->article }}" data-photo="{{ $blog->photo }}" >update</button></td>
                        <td><button class="delete-blog btn btn-danger" data-id="{{ $blog->id }}">delete</button></td>
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
                    {{Form::open(array('id'=>'add-blog-form','enctype'=>'multipart/form-data'))}}
                    {{Form::label('title', 'title')}}
                    {{Form::text('title','',['class' => 'form-control'])}}<br>
                    {{Form::label('article', 'article')}}
                    {{Form::textarea('article','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'Write article'])}}<br>
                    {{Form::label('photo', 'photo')}}
                    {{Form::file('photo',['id'=>'photo-new'])}}<br><br>
                    {{Form::submit('save changes',['class' => 'btn btn-primary btn-lg btn-block','id'=>'new-blog'])}}
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
                    {{Form::open(array('id'=>'edit-blog-form','enctype'=>'multipart/form-data'))}}
                    {{Form::label('title', 'title')}}
                    {{Form::text('title','',['class' => 'form-control','id'=>'title-edit'])}}<br>
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

