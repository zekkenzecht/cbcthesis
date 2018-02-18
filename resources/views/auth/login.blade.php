 <!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- start -->
                <form class="form-container" action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }}
                <div class="form-group">
                    <h1 style="color: white !important;">Login</h1>
                </div>

                  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                  </div> -->

                  <div class="form-group input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user" style="color: black !important;"></span>
                    </span>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                  </div>
                   @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                     @endif

                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                  </div> -->

                  <div class="form-group input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-lock" style="color: black !important;"></span>
                    </span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                  </div>

                  <div class="checkbox">
                    <label style="color: black !important">
                      <input type="checkbox"> <label style="color:white;">Remember me</label>
                    </label>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block">Login</button>
                  </div>

                  <div class="form-group forgotpassword">
                    <a href="#" style="color: white !important">Forgot Password?</a>
                  </div>

                  <div>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true" style="color: white !important;"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true" style="color: white !important;"></i></a></li>
                        </ul>
                  </div>
                </form>
            <!-- end -->
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </div>
        </div>
</body>
    <script type="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="{{ asset('front/js/bootstrap.min.js') }}"></script>
</html>
