@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> View Product</a>
            </div>
            <h1>View Product</h1>
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
                <a href="{{route('add_product')}}" class="btn btn-success" style="float:right;">Add Product</a>
                <div class="span12">




                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Product List</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Product Code</th>
                                    <th>Image</th>
                                    <th>Product Color</th>
                                    {{--<th>Description</th>--}}

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="gradeX">
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->catt_name}}</td>
                                        <td>{{$product->product_code}}</td>
                                        <td>@if($product->image !='') <img width="100px;" src="{{ asset('uploads/products/'.$product->image, true) }}" alt="" class="media-object img-circle"> @else
                                                <span class="glyphicons glyphicons-user-add"></span>
                                            @endif</td>
                                        <td>{{$product->product_color}}</td>
                                        {{--<td>{{$product->description}}</td>--}}

                                        <td class="center">
                                            <a title="Add Attribute" href="{{url('/admin/add-attribute/'.$product->id)}}" class="btn btn-primary btn-mini">Add</a>
                                            <a href="#myModal_{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini" >View</a>
                                            <a href="{{url('/admin/edit_product/'.$product->id)}}" class="btn btn-primary btn-mini">Edit</a>
                                            <a title="Add Image" href="{{url('/admin/add-image/'.$product->id)}}" class="btn btn-primary btn-mini">Add</a>
                                            @if(Auth::id() == 1)
                                                <a id="delCon" href="{{url('/admin/delete_product/'.$product->id)}}" class="btn btn-danger btn-mini product">Delete</a></td>
                                        @endif
                                    </tr>

                                        <div id="myModal_{{$product->id}}" class="modal hide">
                                            <div class="modal-header">
                                                <button data-dismiss="modal" class="close" type="button">×</button>
                                                <h3>{{$product->product_name}} Full Details</h3>
                                            </div>
                                            <div class="modal-body">
                                                <p>Product ID: {{$product->id}}</p>
                                                <p>Category ID: {{$product->category_id}}</p>
                                                <p>Product Code: {{$product->product_code}}</p>
                                                <p>Product Color: {{$product->product_color}}</p>
                                                <p>Price: {{$product->price}}</p>
                                                <p>Detail: {{$product->description}}</p>
                                            </div>
                                        </div>

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