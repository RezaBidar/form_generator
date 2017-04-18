@extends('main')

@section('content_title' , 'ویرایش فرم')
@section('panel_size' , 'span12')

@section('content')

	{!! BootForm::open(['method'=>'put' , 'url' => route('form.update' , ['form' => $form->id])]) !!}

	{!! BootForm::text('title' , 'عنوان' , $form->title) !!}
	{!! BootForm::textarea('description' , 'توضیحات' , $form->description) !!}
	<p>اجازه ی پاسخگویی</p>
	{!! BootForm::text('open_at' , 'از' , ($form->open_at)?toJalali($form->open_at):'' , ['class' => 'datepicker']) !!}
	{!! BootForm::text('close_at' , 'تا' , ($form->close_at)?toJalali($form->close_at):'' , ['class' => 'datepicker']) !!}
	{!! BootForm::checkbox('only_once' , 'فقط یک بار پاسخگویی' , null , $form->only_once) !!}
	{!! BootForm::checkbox('login_required' , 'فقط لوگین شده ها' , null , $form->login_required) !!}
	{!! BootForm::submit('به روز رسانی' , ['class' => 'btn btn-primary']) !!}
	{!! BootForm::close() !!}

@endsection


@section('javascript')

$(document).ready(function(){

	$('.datepicker').datepicker();
});

@endsection
