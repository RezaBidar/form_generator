@extends('main')

@section('content_title' , 'فیلد تاریخ')
@section('panel_size' , 'span12')

@section('content')

	{!! BootForm::open(['url' => route('input.store')]) !!}
	{!! BootForm::text('label' , 'برچسب') !!}
	{!! BootForm::text('from' , 'از' , '' , ['help_text' => 'کمترین زمان مجاز','class' => 'datepicker']) !!}
	{!! BootForm::text('to' , 'تا' , '' , ['help_text' => 'بیشترین زمان مجاز','class' => 'datepicker']) !!}
	{!! BootForm::text('help' , 'متن راهنمایی') !!}
	{!! BootForm::checkbox('required' , 'اجباری') !!}
	{!! BootForm::hidden('type' , 'date') !!}
	{!! BootForm::hidden('form_id' , $form->id) !!}
	{!! BootForm::submit('اضافه کردن فیلد' , ['class' => 'btn btn-primary']) !!}
	{!! BootForm::close() !!}

@endsection

@section('javascript')
$(document).ready(function(){

	$('.datepicker').datepicker();
});

@endsection