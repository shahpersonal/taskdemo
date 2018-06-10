@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> Add Country</a>
            </div>
            <h1>Add User</h1>
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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="container-fluid"><hr>


            <div class="row-fluid">

                <div class="span12">
                    <div class="widget-box">

                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add User</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/add_customer')}}" name="add_country" id="add_country" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="control-group">
                                    <label class="control-label">First Name :</label>
                                    <div class="controls">
                                        <input type="text" name="first_name" id="first_name" class="span11" placeholder="First name" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Last Name :</label>
                                    <div class="controls">
                                        <input type="text" id="last_name" name="last_name" class="span11" placeholder="Last name" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Emial Address:</label>
                                    <div class="controls">
                                        <input type="text" id="email" name="email" class="span11" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Phone:</label>
                                    <div class="controls">
                                        <input type="text" id="phone" name="phone" class="span11" placeholder="Phone" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Password </label>
                                    <div class="controls">
                                        <input type="password"  name="password" id="password" class="span11" placeholder="Enter Password"  />
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Add User</button>
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