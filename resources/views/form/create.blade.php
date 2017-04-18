@extends('main')

@section('content_title' , 'فرم جدید')
@section('panel_size' , 'span12')

@section('content')

	{!! BootForm::open(['url' => route('form.store')]) !!}
	{!! BootForm::text('title' , 'عنوان') !!}
	{!! BootForm::textarea('description' , 'توضیحات') !!}
	<p>اجازه ی پاسخگویی</p>
	{!! BootForm::text('open_at' , 'از' , '' , ['class' => 'datepicker']) !!}
	{!! BootForm::text('close_at' , 'تا' , '' , ['class' => 'datepicker']) !!}
	{!! BootForm::checkbox('only_once' , 'فقط یک بار پاسخگویی') !!}
	{!! BootForm::checkbox('login_required' , 'فقط لوگین شده ها') !!}
	{!! BootForm::submit('ساخت فرم' , ['class' => 'btn btn-primary']) !!}
	{!! BootForm::close() !!}

@endsection


@section('javascript')

$(document).ready(function(){

	$('.datepicker').datepicker();
});

@endsection
