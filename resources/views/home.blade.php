@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> View Customer</a>
            </div>
            <h1>View Customer</h1>

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

                <a href="{{url('/admin/add_customer')}}" class="btn btn-success" style="float:right;">Add Customer</a>
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
                                    <th>Customer Id</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Role</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($users as $user)
                                    <tr class="gradeX">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>

                                        <td>{{$user->email}}</td>
                                        <td>
                                        @foreach($user->roles as $role)
                                                {{$role->name}}<br/>
                                        @endforeach
                                        </td>

                                       <td> <a class="btn btn-primary btn-sm" href="{{url('/admin/edit_role',$user->id)}}">
                                            Edit Role
                                          </a></td>

                                          <!-- Modal -->
                                          {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
                                              {{--<div class="modal-dialog" role="document">--}}
                                                  {{--<div class="modal-content">--}}
                                                      {{--<div class="modal-header">--}}
                                                          {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                                                          {{--<h4 class="modal-title" id="myModalLabel">Edit Role</h4>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="modal-body">--}}
                                                          {{--<form id="edit-role" name="edit-role" action="{{url('/admin/edit_role',$user->id)}}" method="post">--}}

                                                              {{--{{csrf_field()}}--}}

                                                              {{--<div class="form-group">--}}
                                                                  {{--<select name="roles[]" multiple  style="display:block;">--}}
                                                                      {{--@foreach($allRoles as $role)--}}

                                                                          {{--<option value="{{$role->id}}"> {{$role->name}}</option>--}}

                                                                      {{--@endforeach--}}

                                                                  {{--</select>--}}

                                                              {{--</div>--}}

                                                          {{--</form>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="modal-footer">--}}
                                                          {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                                          {{--<button type="button" class="btn btn-primary" onclick="$('#edit-role').submit();">Save changes</button>--}}
                                                      {{--</div>--}}
                                                  {{--</div>--}}
                                              {{--</div>--}}
                                          {{--</div>--}}


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
