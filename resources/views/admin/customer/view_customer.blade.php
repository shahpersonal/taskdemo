@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> Edit Country</a>
            </div>
            <h1>Edit Country</h1>
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
                            <h5>Edit Country</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/edit_country/'.$countryDetails->id)}}" name="edit_country" id="edit_country" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="control-group">
                                    <label class="control-label">Country Name (English)</label>
                                    <div class="controls">
                                        <input type="text" name="cnt_name" id="cnt_name" value="{{$countryDetails->name}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Country Name (Arabic)</label>
                                    <div class="controls">
                                        <input type="text" name="cnt_name_arb" id="cnt_name_arb" value="{{$countryDetails->name_arb}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Currency</label>
                                    <div class="controls">
                                        <input type="text" name="currency" id="currency" value="{{$countryDetails->currency}}">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Edit Country" class="btn btn-success">
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