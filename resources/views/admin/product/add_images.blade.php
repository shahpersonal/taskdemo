@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> Add Product Attributes</a>
            </div>
            <h1>Add Prodcut Attributes</h1>
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
                        <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                            <h5>Product Information </h5>
                        </div>
                        <div class="widget-content">
                            <label class="control-label"><strong>Name :</strong> {{$productDetail->product_name}}</label>
                            <label class="control-label"><strong>Code : </strong>{{$productDetail->product_code}}</label>
                            <label class="control-label"><strong>Color :</strong> {{$productDetail->product_color}}</label>
                            <label class="control-label"><strong>Detail :</strong> {{$productDetail->description}}</label>
                            <label class="control-label"><strong>Main Image :</strong> <img width="100px;" src="{{ asset('uploads/products/'.$productDetail->image, true) }}" alt="" class="media-object img-circle"></label>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Image Id</th>
                                    <th>Product Id</th>
                                    <th>Image</th>

                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ProductsImage as $image)
                                    <tr class="odd gradeX">
                                        <td>{{$image->id}}</td>
                                        <td>{{$image->product_id}}</td>
                                        <td> <img width="100px;" src="{{ asset('uploads/products/'.$image->image, true) }}" alt="" class="media-object"></td>

                                        <td> <a id="delCon" href="{{url('/admin/delete_attribute/'.$image->id.'/'.$productDetail->id)}}" class="btn btn-danger btn-mini pro-attr">Delete</a></td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add Product Attributes</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/add-image/'.$productDetail->id)}}" name="add_image" id="add_image" novalidate="novalidate" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="product_id" id="product_id" value="{{$productDetail->id}}">
                                <div class="control-group">
                                    <label class="control-label">Alternate Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" id="image" multiple="multiple">
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Add Image" class="btn btn-success">
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