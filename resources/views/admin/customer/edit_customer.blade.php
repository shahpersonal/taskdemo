@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> Edit User</a>
            </div>
            <h1>Edit User</h1>
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
        <div class="container-fluid"><hr>


            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit User</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/edit_customer/'.$user->id)}}" name="edit_country" id="edit_country" novalidate="novalidate">
                                {{csrf_field()}}
                                <input type="hidden" name="password" id="password" value="{{$user->password}}">
                                <div class="control-group">
                                    <label class="control-label">name</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input type="text" name="email" id="email" value="{{$user->email}}">
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Edit User" class="btn btn-success">
                                </div>
                            </form>
                        </div>
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