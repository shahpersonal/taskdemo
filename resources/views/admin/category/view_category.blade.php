@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> View Category</a>
            </div>
            <h1>View Category</h1>

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

                <a href="{{url('/admin/add_category')}}" class="btn btn-success" style="float:right;">Add Category</a>
                <div class="span12">




                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Country List</h5>
                        </div>
                        <div class="col-md-8 ">

                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Category Id</th>
                                    <th>Category Name(English)</th>
                                    <th>Category Name(Arabic)</th>
                                    <th>Description</th>
                                    <th>URL</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                <tr class="gradeX">
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->name_arb}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->url}}</td>
                                    <td class="center"><a href="{{url('/admin/edit_category/'.$category->id)}}" class="btn btn-primary btn-mini">Edit</a>
                                        @if(Auth::id() == 1)
                                        <a id="delCon" href="{{url('/admin/delete_category/'.$category->id)}}" class="btn btn-danger btn-mini country">Delete</a></td>
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
@section('scripts')
    <script type="text/javascript" src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js', true)}}"></script>
    @endsection