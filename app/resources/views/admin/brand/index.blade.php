@extends('layouts.app')

@section('content')
	<div class="container">
		
		<div class="row">
			<div class="col">
				<div class="h2 m-0">
					Список брендов
				</div>
			</div>
			<div class="col text-right">
				<div class="btn-group">
					<a href="{{route('brands.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
					<a href="{{route('brands.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
				</div>
			</div>
		</div>

		<div class="row pt-3">
			<table class="table">
				<tr class="thead-dark">
					<th>
						
					</th>
					<th>Название</th>
					<th>Иконка</th>
				</tr>
				@foreach($brands as $itemBrand)
				<tr>
					<td style="width: 100px;">
						<div class="btn-group btn-block">
							<a href="{{route('brands.edit',$itemBrand)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
							<button class="btn btn-danger fa fa-close"></button>
						</div>
					</td>
					<td>{{$itemBrand->name}}</td>
					<td class="text-right">
						<img src="{{asset('storage/'.$itemBrand->icon)}}">
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection