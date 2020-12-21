@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="row">
			<div class="col">
				<div class="h2 m-0">
					Список характеристик
				</div>
			</div>
			<div class="col text-right">
				<div class="btn-group">
					<a href="{{route('properties.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
					<a href="{{route('properties.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
				</div>
			</div>
		</div>

		<div class="row pt-3">
			<table class="table">
				<tr class="thead-dark">
					<th></th>
					<th>Название</th>
				</tr>
				@foreach($properties as $itemProperty)
					<tr>
						<td style="width: 100px;">
							<div class="btn-group">
								<a class="btn btn-primary fa fa-pencil-square-o" href="{{route('properties.edit',$itemProperty)}}"></a>
								<button type="button" class="btn btn-danger fa fa-close"></button>
							</div>
						</td>
						<td>
							{{$itemProperty->name}}
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection