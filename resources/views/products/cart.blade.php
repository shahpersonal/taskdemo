@extends('layouts.frontLayout.front_design')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
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
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php $totalAmt = 0 ?>
                @foreach($userCart as $item)
                <tr>
                    <td class="cart_product">
                        <a href=""><img style="height:100px" class="media-object img-circle" src="{{ asset('uploads/products/'.$item->image) }}" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$item->product_name}}</a></h4>
                        <p>Code: {{$item->product_code}} | {{$item->size}}</p>

                    </td>
                    <td class="cart_price">
                        <p>KWD {{$item->price}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$item->id.'/1')}}"> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->quantity}}" autocomplete="off" size="2">
                            @if($item->quantity > 1)
                            <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$item->id.'/-1')}}"> - </a>
                                @endif
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">KWD {{$item->price*$item->quantity}}</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" onclick="javascript:confirm('Are You Sure Want to delete?');" href="{{url('/cart/delete-product/'.$item->id)}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
               <?php echo $totalAmt = $totalAmt + ($item->price*$item->quantity); ?>
               @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        {{--<li>Cart Sub Total <span>$59</span></li>--}}
                        {{--<li>Eco Tax <span>$2</span></li>--}}
                        {{--<li>Shipping Cost <span>Free</span></li>--}}
                        <li>Total <span>KWD <?php echo $totalAmt; ?></span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->








@endsection