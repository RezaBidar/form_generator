@extends('main')

@section('content_title' , 'فیلد چند انتخابی')
@section('panel_size' , 'span12')

@section('content')

	{!! BootForm::open(['url' => route('input.store')]) !!}
	{!! BootForm::text('label' , 'برچسب') !!}
	{!! BootForm::text('choices' , 'گزینه ها' , '' , ['help_text' => 'با خط فاصله گزینه ها را جدا کنید (-)']) !!}
	{!! BootForm::text('help' , 'متن راهنمایی') !!}
	{!! BootForm::checkbox('required' , 'اجباری') !!}
	{!! BootForm::hidden('type' , 'multiselect') !!}
	{!! BootForm::hidden('form_id' , $form->id) !!}
	{!! BootForm::submit('اضافه کردن فیلد' , ['class' => 'btn btn-primary']) !!}
	{!! BootForm::close() !!}

@endsection
