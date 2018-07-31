@extends('layouts.frontLayout.front_design')
@section('content')


<section>
    <div class="container">
        <div class="row">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color: #ce8483">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>  {!! session('flash_message_error') !!}</strong>
                </div>

            @endif
            <div class="col-sm-3">


                @include('layouts.frontLayout.front_sidebar')
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                <a href="{{ asset('uploads/products/images.png') }}">
                            <img style="width:350px;" class="mainImage" src="{{ asset('uploads/products/'.$productDetail->image, true) }}" alt="" />
                                </a>
                            {{--<h3>ZOOM</h3>--}}
                            </div>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active thumbnails">
                                    @foreach($productAltImages as $image)
                                        <a href="javascript:void(0);" >
                                            <img class="changeImage" style="width:80px;cursor: pointer;" src="{{ asset('uploads/products/'.$image->image, true) }}" alt="">
                                        </a>
                                        @endforeach

                                </div>


                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">


                        <form name="addtocartForm" id="addtocartForm" action="{{url('add-cart')}}" method="post">
                            {{csrf_field()}}
                        <input type="hidden" name="product_id" name="product_id" value="{{$productDetail->id}}">
                            <input type="hidden" name="product_name" name="product_name" value="{{$productDetail->product_name}}">
                            <input type="hidden" name="product_color" name="product_color" value="{{$productDetail->product_color}}">
                            <input type="hidden" name="product_code" name="product_code" value="{{$productDetail->product_code}}">
                            <input type="hidden" name="price" name="price" value="{{$productDetail->price}}">

                        <div class="product-information"><!--/product-information-->
                            <img src="{{asset('images/frontend_images/product-details/new.jpg')}}" class="newarrival" alt="" />
                            <h2>{{$productDetail->product_name}}</h2>
                            <p>Web ID: {{$productDetail->product_code}}</p>
                            <p>
                                <select name="size"id="selSize" style="width:150px;">
                                    <option value="">Select Size</option>
                                    @foreach($productDetail->attributes as $size)
                                    <option value="{{$productDetail->id}}-{{$size->size}}">{{$size->size}}</option>
                                        @endforeach
                                </select>
                            </p>
                            <img src="{{asset('images/frontend_images/product-details/rating.png')}}" alt="" />
                            <span>
                                <span>KD <span id="getPrice">{{$productDetail->price}}</span></span>
									<label>Quantity:</label>
									<input type="text" name="quantity" id="quantity" value="1" />
                                @if($total_stock > 0)
									<button type="submit" id="cartButton" type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
                                    @endif
								</span>
                            <p><b>Availability:</b> <span id="avaibility">@if($total_stock > 0)In Stock @else Out Of Stock @endif</span></p>
                            <p><b>Condition:</b> New</p>

                            <a href="#"><img src="{{asset('images/frontend_images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                        </form>




                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#Description" data-toggle="tab">Description</a></li>
                            <li><a href="#care" data-toggle="tab">Material & Care</a></li>
                            <li><a href="#delivery" data-toggle="tab">Delivery Option</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="Description" >
                          <p>
                              {{$productDetail->description}}
                          </p>
                        </div>

                        <div class="tab-pane fade" id="care" >
                           <p>
                               {{$productDetail->care}}
                           </p>
                        </div>

                        <div class="tab-pane fade" id="delivery" >
                            <p class="">
                                10% Instant Discount on HDFC Cards<br/>
                                10% Instant Discount on HDFC Credit and Debit cards. TCA
                            </p>
                        </div>

                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p><b>Write Your Review</b></p>

                                <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="{{asset('images/frontend_images/product-details/rating.png')}}" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $count = 1; ?>
                            @foreach($relatedProducts->chunk(3) as $chunk)
                            <div <?php if($count == 1) { ?> class="item active" <?php } else { ?> class="item" <?php } ?>>
                                @foreach($chunk as $item)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('uploads/products/'.$item->image, true) }}" alt="" />
                                                <h2>KWD {{$item->price}}</h2>
                                                <p>{{$item->product_name}}</p>
                                                <a href="{{url('product/'.$item->id)}}"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               @endforeach

                            </div>
                                <?php $count++; ?>
                           @endforeach
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>



@endsection