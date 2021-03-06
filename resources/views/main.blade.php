
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{config('app.app_name')}} @yield('title')</title>
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

<style type="text/css">@yield('css')</style>

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
      
      <div class="nav-collapse">
        <ul class="nav pull-left">
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i>{{ \Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{ url('logout') }}">خروج</a></li>
            </ul>
          </li>
        </ul>
      </div>

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
        <!-- <li class="active"><a href="index.html"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="reports.html"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
          </ul>
        </li> -->
        {!! showMenu() !!}

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
        <div class=" @yield('panel_size' , 'span12') ">
          <div class="widget">
            {{-- <div class="widget-header"> <i class="icon-list-alt"></i> --}}
              {{-- <h3>@yield('content_title')</h3> --}}
            {{-- </div> --}}
            <!-- /widget-header -->
            <div class="widget-content">
                  <h3>@yield('content_title')</h3>
                  <p>@yield('content_subtitle')</p>
                  <hr/>
                  @if ($errors->any())
                  <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>
                  <br />
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                    </div>
                  @endif

                  @if(Session::has('message'))
                    <div class="alert {{ Session::get('alert_class') }}">
                    {!! Session::get('message') !!}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
                  @endif
                  @yield('content') 
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
        
        <!-- /span12 --> 
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
<script>     

     @yield('javascript')   
</script>
</body>
</html>
