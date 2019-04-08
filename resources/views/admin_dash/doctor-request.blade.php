@extends('layouts.admin_dash')
@section('content')
    <div class="row">
        <div class="col-md-12 c_text login_page col-md-4 wow fadeInRight"data-wow-duration="2s" data-wow-offset="300">
            <table class="method-table table table-responsive table-striped ">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>certificates</th>
                    <th>age</th>
                    <th>experience</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($doctor_r as $doctor)

                    <tr class="doctorreq-{{$doctor->id}}">
                        <td>{{ $doctor->id }} </td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->certificates }}</td>
                        <td>{{ $doctor->age }}</td>
                        <td>{{ $doctor->experience }}</td>
                        <td><button class="delete-doctorreq btn btn-danger" data-id="{{ $doctor->id }}">delete</button></td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection

