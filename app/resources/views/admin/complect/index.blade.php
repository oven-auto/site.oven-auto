@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="h2 m-0">
					Список комплектаций
				</div>
			</div>
			<div class="col text-right">
				<div class="btn-group">
					<a href="{{route('complects.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
					<a href="{{route('complects.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
				</div>
			</div>
		</div>

		{{Form::open([
			'url'=>route('options.index'),
			'method'=>'GET'
		])}}

		<div class="row pt-3">
			<table class="table">
				<tr class="thead-dark">
					<th></th>
					
					<th>Код</th>
					<th>Модель</th>
					<th>Название</th>
					<th>Наличие</th>
					<th>Агрегат</th>
					<th>Цена</th>
					<th>Порядок</th>
					<th>Статус</th>
				</tr>

				@foreach($complects as $itemComplect)
					<tr>
						<td></td>
						<td>{{$itemComplect->code}}</td>
						<td>{{$itemComplect->brand->name}} {{$itemComplect->mark->name}}</td>
						<td>{{$itemComplect->name}}</td>
						<td>Наличие</td>
						<td>{{$itemComplect->motor->adminName}}</td>
						<td>{{$itemComplect->formatPrice}}</td>
						<td>{{$itemComplect->sort}}</td>
						<td>{{$itemComplect->status}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection