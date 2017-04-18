@extends('main')

@section('content_title' , 'فیلد متنی')
@section('panel_size' , 'span12')

@section('content')

	{!! BootForm::open(['url' => route('input.store')]) !!}
	{!! BootForm::text('label' , 'برچسب') !!}
	{!! BootForm::text('help' , 'متن راهنمایی') !!}
	{!! BootForm::text('validation' , 'اعتبارسنجی (regex)') !!}
	{!! BootForm::checkbox('required' , 'اجباری') !!}
	{!! BootForm::hidden('type' , 'text') !!}
	{!! BootForm::hidden('form_id' , $form->id) !!}
	{!! BootForm::submit('اضافه کردن فیلد' , ['class' => 'btn btn-primary']) !!}
	{!! BootForm::close() !!}

@endsection
