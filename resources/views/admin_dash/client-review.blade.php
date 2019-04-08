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
                    <th>review</th>
                    <th>created_at</th>
                </tr>
                </thead>
                <tbody>

                @foreach($client_r as $client)

                    <tr >
                        <td>{{ $client->id }} </td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->review }}</td>
                        <td>{{ $client->created_at }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection


