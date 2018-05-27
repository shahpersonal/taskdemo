@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registered User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="panel panel-default">
                            <!-- Default panel contents -->


                            <!-- Table -->
                            <table class="table">
                               <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>

                                <th>Registered Date</th>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>

                                    <td>{{$user->created_at}}</td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
