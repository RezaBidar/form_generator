@extends('main')

@section('content_title' , 'فیلد عددی')
@section('panel_size' , 'span12')

@section('content')

	{!! BootForm::open(['url' => route('input.store')]) !!}
	{!! BootForm::text('label' , 'برچسب') !!}
	{!! BootForm::number('from' , 'از' , '' , ['help_text' => 'کمترین مقدار مجاز']) !!}
	{!! BootForm::number('to' , 'تا' , '' , ['help_text' => 'بیشترین مقدار مجاز']) !!}
	{!! BootForm::text('help' , 'متن راهنمایی') !!}
	{!! BootForm::checkbox('required' , 'اجباری') !!}
	{!! BootForm::hidden('type' , 'number') !!}
	{!! BootForm::hidden('form_id' , $form->id) !!}
	{!! BootForm::submit('اضافه کردن فیلد' , ['class' => 'btn btn-primary']) !!}
	{!! BootForm::close() !!}

@endsection
