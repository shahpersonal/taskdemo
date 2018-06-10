@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> View Customer</a>
            </div>
            <h1>Edit User Role</h1>

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
                            <h5>Edit User Role</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/edit_role/'.$user->id)}}" name="edit_role" id="edit_role" novalidate="novalidate">
                                {{csrf_field()}}
                                <input type="hidden" name="password" id="password" value="{{$user->password}}">
                                <div class="control-group">
                                    <label class="control-label">name</label>
                                    <div class="controls">
                                        {{$user->name}}
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Role</label>
                                    <div class="controls">
                                        <select name="roles[]" multiple  style="display:block;">
                                            @foreach($allRoles as $role)

                                                <option value="{{$role->id}}"> {{$role->name}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Edit Role" class="btn btn-success">
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
