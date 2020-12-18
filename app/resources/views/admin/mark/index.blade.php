@extends('layouts.app')

@section('content')
	<div class="container">
		<table class="table">
			<tr>
				<th><a href="{{route('marks.create')}}" class="btn btn-success">Добавить</a></th>
				<th>Название</th>
				<th>Кузов</th>
				<th>Страна</th>
				<th>Иконка</th>
				<th>Сортировка</th>
				<th>Статус</th>
			</tr>
			@foreach($marks as $itemMark)
				<tr data-id="{{$itemMark->id}}">
					<td>
						<div class="btn-group">
							<a href="{{route('marks.edit',$itemMark)}}" class="btn btn-primary">Открыть</a>
							<a href="" class="btn btn-danger">Удалить</a>
						</div>
					</td>

					<td>
						{{$itemMark->brand->name}} {{$itemMark->name}}
					</td>

					<td>
						{{$itemMark->body->name}}
					</td>

					<td>
						{{$itemMark->country->full_name}}
					</td>

					<td>
						<img src="{{asset('storage/'.$itemMark->icon)}}">
					</td>

					<td>
						{{Form::select(
							'sort',
							range(0,$marks->count()),
							$itemMark->sort,
							[
								'class'=>'form-control sort-control',
								'data-url'=>route('ajax.mark.sort',$itemMark)
							]
						)}}
					</td>

					<td>
						{{Form::checkbox(
							'status',
							1,
							$itemMark->status,
							[
								'class'=>'status-control',
								'data-url'=>route('ajax.mark.status',$itemMark)
							]
						)}}
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection