@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">Home<i class="icon-home"></i> Add Product</a>
            </div>
            <h1>Add Prodcut</h1>
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
                            <h5>Add Product</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/add_product')}}" name="add_product" id="add_product" novalidate="novalidate" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="control-group">
                                    <label class="control-label">Select Category</label>
                                    <div class="controls">
                                        <select class="form-control" name="category_id" id="category_id" style="width: 223px;">
                                            <option value="">Product Category</option>
                                            <?php echo $cat_dropdown; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Name (English)</label>
                                    <div class="controls">
                                        <input type="text" name="product_name" id="product_name">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Name (Arabic)</label>
                                    <div class="controls">
                                        <input type="text" name="product_name_arb" id="product_name_arb">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Product Code</label>
                                    <div class="controls">
                                        <input type="text" name="product_code" id="product_code">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Color</label>
                                    <div class="controls">
                                        <input type="text" name="product_color" id="product_color">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <input type="text" name="description" id="description">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Price</label>
                                    <div class="controls">
                                        <input type="text" name="price" id="price">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Add Product" class="btn btn-success">
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