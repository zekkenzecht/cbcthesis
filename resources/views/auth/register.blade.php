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
<body style="padding-top: 0px;">
<div class="container-fluid bg">

  <div class="row">
   <div class="col-md-4 col-sm-4 col-xs-12"></div>
   <div class="col-md-4 col-sm-4 col-xs-12">
     <form class="regpanel" action="/registration" method="post">
       {{ csrf_field() }}
     <h1 class="scolor">Sign Up</h1>
       <!-- <div class="form-group">
           <label>First Name</label>
           <input type="name" class="form-control" id="fname" placeholder="First Name" required>
       </div> -->

       <div class="form-group input-group">
           <span class="input-group-addon">
             <span class="glyphicon glyphicon-user"></span>
           </span>
           <input type="name" class="form-control" id="fname" placeholder="Full name" name="name" required>
       </div>


       <div class="form-group input-group">
           <span class="input-group-addon">
             <span class="glyphicon glyphicon-align-left"></span>
           </span>
           <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required>
       </div>

       <div class="form-group input-group">
           <span class="input-group-addon">
             <span class="glyphicon glyphicon-lock"></span>
           </span>
           <input type="password" class="form-control" id="password1" placeholder="Password" required>
       </div>

       <div class="form-group input-group">
           <span class="input-group-addon">
             <span class="glyphicon glyphicon-exclamation-sign"></span>
           </span>
           <input type="password" class="form-control" id="password" placeholder="Confirm Password" name="password" required>
       </div>

       <div class="signup">
           <button type="submit" class="btn btn-success btn-block">Sign Up</button>
       </div>

   </div>
     </form>
   </div>
   <div class="col-md-4 col-sm-4 col-xs-12"></div>
       </div>
</body>
   <script type="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script type="{{ asset('front/js/bootstrap.min.js') }}"></script>
</html>
