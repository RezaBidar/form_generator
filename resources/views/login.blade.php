<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>{{config('app.appName')}}</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet"> -->
    
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/pages/signin.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			
			<a class="brand pull-right" style="float:right" href="#">
				{{config('app.app_name')}}
			</a>		
			
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		@if(Session::has('error'))
	        <div class="alert alert-danger">
	        {!! Session::get('error') !!}
	        <button type="button" class="close" data-dismiss="alert">×</button>
	        </div>
	    @endif		
		<form action="{{ route('auth.login') }}" method="post">
			{{ csrf_field() }}

			<h1>ورود اعضا</h1>		
			
			<div class="login-fields">
				
				<p>لطفا اطلاعات خود را وارد نمایید</p>
				
				<div class="field">
					<label for="username">نام کاربری :</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">رمز عبور :</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				
									
				<input type="submit" value="ورود" class="button btn btn-success btn-large" />
				<a  href="{{ url('signup')}}" style="margin-right:2px;" class="button btn btn-info btn-large">ثبت نام</a>		
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->






<script src="{{ URL::asset('js/jquery-1.7.2.min.js') }}"></script> 
<script src="{{ URL::asset('js/excanvas.min.js') }}"></script> 
<script src="{{ URL::asset('js/chart.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('js/bootbox.min.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ URL::asset('js/full-calendar/fullcalendar.min.js') }}"></script>
 
<script src="{{ URL::asset('js/signin.js') }}"></script>


</body>

</html>
