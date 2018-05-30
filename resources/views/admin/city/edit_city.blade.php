@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> Edit City</a>
            </div>
            <h1>Edit City</h1>
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
                            <h5>Edit City</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/edit_city/'.$cityDetails->id)}}" name="edit_city" id="edit_city" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="control-group">
                                    <label class="control-label">Select input</label>
                                    <div class="controls">
                                        <select class="form-control" name="country_id" id="country_id" style="width: 223px;">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" @if($country->id == $cityDetails->cntrID) selected @endif>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">City Name (English)</label>
                                    <div class="controls">
                                        <input type="text" name="city_name" id="city_name" value="{{$cityDetails->ctName}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">City Name (Arabic)</label>
                                    <div class="controls">
                                        <input type="text" name="city_name_arb" id="city_name_arb" value="{{$cityDetails->ctName_arb}}">
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Edit City" class="btn btn-success">
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