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
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SKU</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productDetail->attributes as $attr)
                                <tr class="odd gradeX">
                                    <td>{{$attr->sku}}</td>
                                    <td>{{$attr->size}}</td>
                                    <td>{{$attr->price}}</td>
                                    <td class="center"> {{$attr->stock}}</td>
                                   <td> <a id="delCon" href="{{url('/admin/delete_attribute/'.$attr->id.'/'.$productDetail->id)}}" class="btn btn-danger btn-mini pro-attr">Delete</a></td>

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
                            <form class="form-horizontal" method="post" action="{{url('/admin/add-attribute/'.$productDetail->id)}}" name="add_attribute" id="add_attribute" novalidate="novalidate">
                                {{csrf_field()}}
                                <input type="hidden" name="product_id" id="product_id" value="{{$productDetail->id}}">
                                <div class="control-group fieldGroup">
                                    <input required type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 60px; margin-left: 10px;"> <input required type="text" name="size[]" id="size" placeholder="Size" style="width: 60px;"> <input required type="text" name="price[]" id="price" placeholder="Price" style="width: 60px;"> <input required style="width: 60px;" type="text" name="stock[]" id="stock" placeholder="Stock">
                                    <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add More</a>
                                </div>
                                <div class="control-group fieldGroupCopy" style="display: none;">
                                    <input type="text" name="sku[]" placeholder="SKU" id="sku" style="width: 60px; margin-left: 10px;"><input type="text" name="size[]" id="size" placeholder="Size" style="width: 60px;"> <input type="text" name="price[]" id="price" placeholder="Price" style="width: 60px;"> <input type="text" name="stock[]" id="stock" style="width: 60px;" placeholder="Stock">

                                        <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>

                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Add Attribute" class="btn btn-success">
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