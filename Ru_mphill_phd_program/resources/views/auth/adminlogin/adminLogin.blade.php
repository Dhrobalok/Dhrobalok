{{--  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Maddhapara Granite Mining Company Ltd.</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="css/style-b.css">

{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/font-awesome.min.css') }}
		{{ HTML::style('css/bootstrap-datepicker3.min.css') }}
		{{ HTML::style('css/style-b.css') }}
        

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body class="login-page">
<div class="header">
	<div class="login-overlay overlay">
<section id="main-container" class="section-padding container-fluid">
<div class="container">
  <div class="row">
    
    <div class="col-md-7 col-sm-12">
    <div class="logo">
    	<img src="{{asset('img/logo.png')}}"/>
    	
    	
    </div>
    </div>
     <div class="col-md-5 col-sm-12">
    <div class="menu">
    	<a class="btn" href="#" title="" ><i class="fa fa-home"></i> <span>Home</span></a>
        
    </div>
    </div>
</div>
</div>
</section>
</div></div>
<div class="header-below">
<section id="main-container" class="section-padding container-fluid">
<div class="container">
<div class="row">  
	<h2 class="text-center">Start Your Account Now!</h2>
	<h3 class="text-center">Please Fill Up Below Field and Login Your Admin Panel For Do your Desired Work</h3>
</div>
</div>
</section>
</div>
<div class="login-section">
<script type="text/javascript">
  jQuery(document).ready(function() {
    $('.carousel').carousel({interval: 5000});
  });
</script>

<div id="myCarousel" class="carousel slide carousel-fade">
<div class="carousel-inner">
        <div class="active item one"></div>
        <div class="item two"></div>
        <div class="item three"></div>
        <div class="item four"></div>
</div>
</div>

<div class="login-overlay overlay">
<section id="main-container" class="section-padding container-fluid">
<div class="container">
<div class="row"> 
 
	<h2 class="text-center">Inventory Management System</h2>
	<p class="text-center">Please Fill Up Below Field and Login </p>
	<div class="col-md-3 col-sm-3">&nbsp;
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="error-message">
		@if(Session::has('message'))
			<p class='msg'>{{ Session::get('message') }}</p>
		@endif

		@if(Session::has('error_message'))
			<p class='error_msg'>{{ Session::get('error_message') }}</p>
		@endif
	</div>
		<div class="login-form">

		 <form action="{{ action('UserController@postLogin') }}" method="post" role="form" class="LoginForm"> 
			<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			<input type="text" required="required" name="name" class="name" id="name" placeholder="User Name" />
			<input type="password" required="required" class="password" name="password" id="password" placeholder="Your Password"  />
			<button type="submit" id="submit" name="submit" class="btn form login-form-button text-center">Login Now</button>
		</form>

		
	</div>
	</div>
	<div class="col-md-3 col-sm-3">
		&nbsp;
	</div>
</div>
</div>
</section>
</div></div>
<div class="footer">
<section id="main-container" class="section-padding container-fluid">
<div class="container">
<div class="row">  
<h4 class="text-center">Powered by: <a href="http://rajit.net/" target="_blank">raj IT Solutions Ltd.</a> | An ISO 9001:2015 Certified Company.</h4>
</div>
</div>
</section>
<section>
</section>
</div>

<script type="js/jquery.min.js"></script>
<script type="js/bootstrap.min.js"></script>
<script type="js/bootstrap-datepicker.min.js"></script>
<script type="js/app.js"></script>
  
{{ HTML::script('js/jquery.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::script('js/bootstrap-datepicker.min.js') }}
		{{ HTML::script('js/app.js') }}
        
</body>
</html>
--}}


@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
           <div class="text-center">
               <img src="{{ asset('public/company_pic/ru-logo.png') }}" alt="">
              <div class="text-center">
                 <p style="font-size:16px;display: flex;flex-direction:column; justify-content:center">Mphill,Phd Programe, IBSC, RU</p>
                 <h1 style="font-size:16px; font-weight:bold;; font-weight:bold" class="">IBSC Accounting Management System</h1>
              </div>
                 
           </div>
            <div class="card">
                
                 <div class="card-header text-center">Admin login</div> 
                @if (Session::has('message'))
                <div class="alert alert-info">
                    <p style="text-align: center;">
                        {{ Session::get('message') }}
                    </p>
                    
                </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('loginadmin') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="1" name="admin">

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">User Login </div>
                @if (Session::has('message'))
                <div class="alert alert-info">
                    <p style="text-align: center;">
                        {{ Session::get('message') }}
                    </p>
                    
                </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
@endsection

