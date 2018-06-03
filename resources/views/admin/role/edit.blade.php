@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> Edit Role</a>
            </div>
            <h1>Edit Role</h1>
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
                            <h5>Edit Role</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{route('role.update',$role->id)}}" name="edit_role" id="edit_role" novalidate="novalidate" role="form">
                                {{method_field('PATCH')}}
                                {{csrf_field()}}
                                <div class="control-group">
                                    <label class="control-label"> Name</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" value="{{$role->name}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Display Name</label>
                                    <div class="controls">
                                        <input type="text" name="display_name" id="display_name" value="{{$role->display_name}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <input type="text" name="description" id="description" value="{{$role->description}}">
                                    </div>
                                </div>
                                <div class="control-group text-left">
                                    <label class="control-label">Permission</label>
                                  @foreach($permissions as $permission)
                                        <div class="controls">

                                        <input  style="opacity: 50 !important" type="checkbox" {{ in_array($permission->id,$role_permission)?"checked":"" }} name="permission[]" id="permission" value="{{$permission->id}}"> {{$permission->name}}<br/>
                                        </div>
                                   @endforeach
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