
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>پیغام</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet"> -->
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet"> -->
<link href="{{ URL::asset('css/jquery-ui-1.8.14.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> 
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </a>
      

      <a class="brand pull-right" style="float: right" href="#">{{config('app.app_name')}}</a>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row" style="float:right;">
        <div class="span12">
          <div class="widget">
            {{-- <div class="widget-header"> <i class="icon-list-alt"></i> --}}
              {{-- <h3>{{ $title }}</h3> --}}
            {{-- </div> --}}
            <!-- /widget-header -->
            <div class="widget-content">
                <h3>{{ $title }}</h3>
                <p>{{ $message }}</p>
            </div>
          </div>
          <!-- /widget -->
          
        </div>
        <!-- /span6 -->
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<div class="extra">
  <div class="extra-inner">
    <div class="container">
      <div class="row">
                    
                    <!-- /span3 -->
       </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /extra-inner --> 
</div>
<!-- /extra -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{ URL::asset('js/jquery-1.7.2.min.js') }}"></script> 
<script src="{{ URL::asset('js/excanvas.min.js') }}"></script> 
<script src="{{ URL::asset('js/chart.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('js/bootbox.min.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ URL::asset('js/full-calendar/fullcalendar.min.js') }}"></script>
 
<script src="{{ URL::asset('js/jquery.ui.datepicker-cc.all.min.js') }}"></script> 
<script src="{{ URL::asset('js/base.js') }}"></script> 
</body>
</html>
