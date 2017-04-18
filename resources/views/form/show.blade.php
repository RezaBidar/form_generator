@extends('main')

@section('content_title' , 'فرم جدید')
@section('panel_size' , 'span12')

@section('content')

<div class="row">
<div class="span5">
<p><b>عنوان :</b>{{ $form->title }} </p>
<p><b>توضیحات :</b>{{ $form->description }} </p>
<p><b>بازگشایی از تاریخ :</b>{{ ($form->open_at) ? toJalali($form->open_at) : ''}} </p>
<p><b>تاریخ بسته شدن :</b>{{ ($form->close_at) ? toJalali($form->close_at) : ''}} </p>
</div>

<div class="span5">
<p><b><a href="{{ route('forms.link', ['link' => $form->link]) }}" target="_blank">لینک فرم</a></b></p>
<p><b><a href="{{ route('form.edit' , ['form' => $form->id])}}">ویرایش فرم</a></b></p>
{{ Form::open(array('route' => array('form.destroy', $form->id), 'method' => 'delete')) }}
    <button type="submit" class="btn btn-danger">حذف</button>
{{ Form::close() }}
</div>

</div>
<hr/>

<a href="{{ route('input.create') . '?form_id='. $form->id .'&type=text' }}"  >ایجاد فیلد متنی</a><br/>
<a href="{{ route('input.create') . '?form_id='. $form->id .'&type=date' }}"  >ایجاد فیلد تاریخ</a><br/>
<a href="{{ route('input.create') . '?form_id='. $form->id .'&type=multiselect' }}"  >ایجاد فیلد چند انتخابی</a><br/>
<a href="{{ route('input.create') . '?form_id='. $form->id .'&type=number' }}"  >ایجاد فیلد عددی</a><br/>


<hr />

@foreach($form->inputs as $input)
	{!! makeInput($input) !!}
	<br/>
@endforeach

@endsection

@section('javascript')


$(document).ready(function(){

	$('.datepicker').datepicker();
});

@endsection