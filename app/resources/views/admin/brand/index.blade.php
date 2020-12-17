@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<table class="table">
				<tr>
					<th>
						<a href="{{route('brands.create')}}" class="btn btn-success">Добавить</a>
					</th>
					<th>Название</th>
					<th>Иконка</th>
				</tr>
				@foreach($brands as $itemBrand)
				<tr>
					<td>
						<div class="btn-group">
							<a href="{{route('brands.edit',$itemBrand)}}" class="btn btn-primary">Открыть</a>
							<button class="btn btn-danger">Удалить</button>
						</div>
					</td>
					<td>{{$itemBrand->name}}</td>
					<td>
						<img src="{{asset('storage/'.$itemBrand->icon)}}">
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection