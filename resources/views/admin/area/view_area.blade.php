@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> View Area</a>
            </div>
            <h1>View Area</h1>
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
                <a href="{{url('/admin/add_area')}}" class="btn btn-success" style="float:right;">Add Area</a>
                <div class="span12">




                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Area List</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Area Id</th>
                                    <th>City Name</th>
                                    <th>Area Name(English)</th>
                                    <th>Area Name(Arabic)</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($areas as $area)
                                <tr class="gradeX">
                                    <td>{{$area->id}}</td>
                                    <td>{{$area->city_name}}</td>
                                    <td>{{$area->areaName}}</td>
                                    <td>{{$area->areaName_arb}}</td>

                                    <td class="center"><a href="{{url('/admin/edit_area/'.$area->id)}}" class="btn btn-primary btn-mini">Edit</a>
                                        @if(Auth::id() == 1)
                                        <a id="delCon" href="{{url('/admin/delete_area/'.$area->id)}}" class="btn btn-danger btn-mini area">Delete</a></td>
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