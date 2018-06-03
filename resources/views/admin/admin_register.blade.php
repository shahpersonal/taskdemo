<!DOCTYPE html>
<html lang="en">

<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/backend_css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/matrix-login.css')}}" />
    <link href="{{asset('fonts/backend_fonts/font-awesome/css/font-awesome.css" rel="stylesheet')}}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
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
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Personal-info</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="#" method="get" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">First Name :</label>
                        <div class="controls">
                            <input type="text" name="first_name" id="first_name" class="span11" placeholder="First name" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Last Name :</label>
                        <div class="controls">
                            <input type="text" id="last_name" name="last_name" class="span11" placeholder="Last name" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Emial Address:</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" class="span11" placeholder="Last name" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Phone:</label>
                        <div class="controls">
                            <input type="text" id="phone" name="phone" class="span11" placeholder="Last name" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password </label>
                        <div class="controls">
                            <input type="password"  name="password" id="password" class="span11" placeholder="Enter Password"  />
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Add User</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<script src="{{asset('js/backend_js/jquery.min.js')}}"></script>
<script src="{{asset('js/backend_js/matrix.login.js')}}"></script>
<script src="{{asset('js/backend_js/bootstrap.min.js')}}"></script>
</body>

</html>
