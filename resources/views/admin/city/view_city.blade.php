@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> View City</a>
            </div>
            <h1>View City</h1>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>  {!! session('flash_message_error') !!}</strong>
                </div>

            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>  {!! session('flash_message_success') !!}</strong>
                </div>

            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <a href="{{route('add_city')}}" class="btn btn-success" style="float:right;">Add City</a>
                <div class="span12">




                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>City List</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>City Id</th>
                                    <th>Country Name</th>
                                    <th>city Name(English)</th>
                                    <th>city Name(Arabic)</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cities as $city)
                                <tr class="gradeX">
                                    <td>{{$city->id}}</td>
                                    <td>{{$city->country_name}}</td>
                                    <td>{{$city->ctName}}</td>
                                    <td>{{$city->ctName_arb}}</td>

                                    <td class="center"><a href="{{url('/admin/edit_city/'.$city->id)}}" class="btn btn-primary btn-mini">Edit</a>
                                        @if(Auth::id() == 1)
                                        <a id="delCon" href="{{url('/admin/delete_city/'.$city->id)}}" class="btn btn-danger btn-mini city">Delete</a></td>
                                    @endif
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