@extends('main')

@section('content_title' , 'اطلاعات داوران')
@section('panel_size' , 'span12')

@section('content')
	
<input type="test" class="datepicker" id="datepicker1" />

@endsection

@section('javascript')

$('#datepicker1').datepicker();

@endsection

