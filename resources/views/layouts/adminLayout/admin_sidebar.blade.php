<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin/dashboard')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li  class="submenu {{Request::is('admin/view_country') ? 'active' : ''}}"> <a href="{{url('/admin/view_country')}}"><i class="icon icon-th-list"></i> <span>Country</span> </a>
            <ul>
                {{--<li><a href="{{url('/admin/add_country')}}">Add Country</a></li>--}}
                <li><a href="{{url('/admin/view_country')}}">View Country</a></li>

            </ul>
        </li>
        <li class="submenu {{Request::is('admin/view_city') ? 'active' : ''}}"> <a href="{{url('/admin/view_city')}}"><i class="icon icon-th-list"></i> <span>City</span> </a>
            <ul>
                {{--<li><a href="{{url('/admin/add_city')}}">Add City</a></li>--}}
                <li class="active"><a href="{{url('/admin/view_city')}}">View City</a></li>

            </ul>
        </li>
        <li class="submenu {{Request::is('admin/view_area') ? 'active' : ''}}"> <a href="{{url('/admin/view_area')}}"><i class="icon icon-th-list"></i> <span>Area</span> </a>
            <ul>
                {{--<li><a href="{{url('/admin/add_area')}}">Add Area</a></li>--}}
                <li><a href="{{url('/admin/view_area')}}">View Area</a></li>

            </ul>
        </li>

        <li class="submenu {{Request::is('admin/view_category') ? 'active' : ''}}"> <a href="{{url('/admin/view_country')}}"><i class="icon icon-pencil"></i> <span>Category</span> </a>
            <ul>
                {{--<li><a href="{{url('/admin/add_category')}}">Add Category</a></li>--}}
                <li><a href="{{url('/admin/view_category')}}">View Category</a></li>

            </ul>
        </li>
        <li class="submenu {{Request::is('admin/view_product') ? 'active' : ''}}"> <a href="{{url('/admin/view_product')}}"><i class="icon icon-pencil"></i> <span>Product</span> </a>
            <ul>
                {{--<li><a href="{{url('/admin/add_category')}}">Add Category</a></li>--}}
                <li><a href="{{url('/admin/view_product')}}">View Product</a></li>

            </ul>
        </li>
        <li class="submenu {{Request::is('admin/view_coupon') ? 'active' : ''}}"> <a href="{{url('/admin/view_product')}}"><i class="icon icon-pencil"></i> <span>Coupon</span> </a>
            <ul>

                <li><a href="{{url('/admin/view_coupon')}}">View Coupon</a></li>

            </ul>
        </li>
        @role('admin')
        <li class="submenu {{Request::is('role') ? 'active' : ''}}"> <a href="{{url('role')}}"><i class="icon icon-info-sign"></i> <span>Role</span> </a>
            <ul>
                <li><a href="{{url('role')}}">Role</a></li>


            </ul>
        </li>
        @endrole

        <li class="submenu {{Request::is('home') ? 'active' : ''}}"> <a href="{{url('/admin/view_customer')}}"><i class="icon-user"></i> <span>Users</span> </a>
            <ul>
                {{--<li><a href="{{url('/admin/add_customer')}}">Add User</a></li>--}}
                <li><a href="{{url('/home')}}">User List</a></li>

            </ul>
        </li>



        {{--<li> <a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>--}}
        {{--<li> <a href="widgets.html"><i class="icon icon-inbox"></i> <span>Widgets</span></a> </li>--}}
        {{--<li><a href="tables.html"><i class="icon icon-th"></i> <span>Tables</span></a></li>--}}
        {{--<li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Full width</span></a></li>--}}

        {{--<li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>--}}
        {{--<li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>--}}
        {{--<li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>--}}
            {{--<ul>--}}
                {{--<li><a href="index2.html">Dashboard2</a></li>--}}
                {{--<li><a href="gallery.html">Gallery</a></li>--}}
                {{--<li><a href="calendar.html">Calendar</a></li>--}}
                {{--<li><a href="invoice.html">Invoice</a></li>--}}
                {{--<li><a href="chat.html">Chat option</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>--}}
            {{--<ul>--}}
                {{--<li><a href="error403.html">Error 403</a></li>--}}
                {{--<li><a href="error404.html">Error 404</a></li>--}}
                {{--<li><a href="error405.html">Error 405</a></li>--}}
                {{--<li><a href="error500.html">Error 500</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="content"> <span>Monthly Bandwidth Transfer</span>--}}
            {{--<div class="progress progress-mini progress-danger active progress-striped">--}}
                {{--<div style="width: 77%;" class="bar"></div>--}}
            {{--</div>--}}
            {{--<span class="percent">77%</span>--}}
            {{--<div class="stat">21419.94 / 14000 MB</div>--}}
        {{--</li>--}}
        {{--<li class="content"> <span>Disk Space Usage</span>--}}
            {{--<div class="progress progress-mini active progress-striped">--}}
                {{--<div style="width: 87%;" class="bar"></div>--}}
            {{--</div>--}}
            {{--<span class="percent">87%</span>--}}
            {{--<div class="stat">604.44 / 4000 MB</div>--}}
        {{--</li>--}}
    </ul>
</div>
<!--sidebar-menu-->