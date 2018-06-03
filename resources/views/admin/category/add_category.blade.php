@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> Add Category</a>
            </div>
            <h1>Add Category</h1>
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
                            <h5>Add Category</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/add_category')}}" name="add_category" id="add_category" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="control-group">
                                    <label class="control-label">Category Name (English)</label>
                                    <div class="controls">
                                        <input type="text" name="cat_name" id="cat_name">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Category Name (Arabic)</label>
                                    <div class="controls">
                                        <input type="text" name="cat_name_arb" id="cat_name_arb">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">URL</label>
                                    <div class="controls">
                                        <input type="text" name="url" id="url">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <input type="text" name="description" id="description">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Add Country" class="btn btn-success">
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