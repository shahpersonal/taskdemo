@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> Edit Area</a>
            </div>
            <h1>Edit Area</h1>
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
                            <h5>Edit Area</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/edit_area/'.$areaDetails->id)}}" name="edit_city" id="edit_city" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="control-group">
                                    <label class="control-label">Select Country</label>
                                    <div class="controls">
                                        <select class="form-control" name="country_id" id="country_id" style="width: 223px;">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" @if($country->id == $areaDetails->cntrID) selected @endif>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Select City</label>
                                    <div class="controls">
                                        <select class="form-control" name="city_id" id="city_id" style="width: 223px;">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" @if($city->id == $areaDetails->ctID) selected @endif>{{$city->ctName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Area Name (English)</label>
                                    <div class="controls">
                                        <input type="text" name="area_name" id="area_name" value="{{$areaDetails->areaName}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Area Name (Arabic)</label>
                                    <div class="controls">
                                        <input type="text" name="area_name_arb" id="area_name_arb" value="{{$areaDetails->areaName_arb}}">
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Edit Area" class="btn btn-success">
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