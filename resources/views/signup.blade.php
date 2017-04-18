<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>{{config('app.app_name')}}</title>

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
	    @if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif	
		<form action="{{ route('auth.signup') }}" method="post">
			{{ csrf_field() }}

			<h1>ثبت نام</h1>		
			
			<div class="login-fields">
				
				<p>لطفا اطلاعات خود را وارد نمایید</p>
				
				<div class="field">
					<label for="name">نام :</label>
					<input type="text" id="name" name="name" value="" placeholder="نام" class="login name-field" />
				</div> <!-- /field -->

				<div class="field">
					<label for="username">نام کاربری :</label>
					<input type="text" id="username" name="username" value="" placeholder="نام کاربری" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">رمز عبور :</label>
					<input type="password" id="password" name="password" value="" placeholder="رمز عبور" class="login password-field"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="password_confirmation">تکرار رمز عبور :</label>
					<input type="password_confirmation" id="password_confirmation" name="password_confirmation" value="" placeholder="تکرار رمز عبور" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				
									
				<input type="submit" value="ثبت نام" class="button btn btn-success btn-large" />
						

				
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

<script type="text/javascript">
	
</script>
</body>

</html>
