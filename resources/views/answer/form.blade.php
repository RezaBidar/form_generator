@extends('main2')

@section('content_title' , $form->title)
@section('content_subtitle' , $form->description)
@section('panel_size' , 'span12')

@section('content')
<p><b>بازگشایی از تاریخ :</b>{{ toJalali($form->open_at) }} </p>
<p><b>تاریخ بسته شدن :</b>{{ toJalali($form->close_at) }} </p>

<hr />
{!! BootForm::open(['url' => route('forms.submit' , ['link' => $form->link])])!!}
@foreach($form->inputs as $input)
	{!! makeInput($input) !!}
	<br/>
@endforeach
{!! BootForm::hidden('form_id' , $form->id) !!}
{!! BootForm::submit('ارسال') !!}
{!! BootForm::close()!!}
@endsection

@section('javascript')

$(document).ready(function(){

	$('.datepicker').datepicker();
});

@endsection