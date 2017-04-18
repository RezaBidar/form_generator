@extends('main')

@section('content_title' , 'لیست فرم ها')
@section('panel_size' , 'span12')

@section('content')
	
<div class="table-responsive">
	<table class="table table-hover table table-bordered" style="">
		<thead>
			<tr>
				<th>عنوان</th>
				<th>مشاهده</th>
				<th>فایل جوابها</th>
			</tr>
		</thead>
		<tbody>

		@foreach($forms as $form)
	  		<tr>
	  			<td>{{ $form->title }}</td>
	  			<td>
	  				<a href="{{ route('form.show' , $form->id)}}" class="btn btn-small btn-info">
	  					<i class="btn-icon-only icon-ok"></i>
	  				</a>
	  			</td>
	  			<td><a href="{{route('results' , $form->id)}}" class="badge">{{ $form->answers->count() }}</a></td>
	  		</tr>
	  	@endforeach
	  	</tbody>
	</table>
	{{ $forms->links() }}
</div>

@endsection


