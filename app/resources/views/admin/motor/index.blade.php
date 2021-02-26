@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2 m-0">
				Список агрегатов
			</div>
		</div>
		<div class="col text-right">
			<div class="btn-group">
				<a href="{{route('motors.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
				<a href="{{route('motors.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
			</div>
		</div>
	</div>

	<div class="row pt-3">
		<table class="table">
			<tr class="thead-dark">
				<th></th>
				<th>Бренд</th>
				<th>Название</th>
				<th>Объем</th>
				<th>Мощность</th>
				<th>КПП</th>
				<th>Привод</th>
				<th>Тип</th>
			</tr>

			@foreach($motors as $itemMotor)
				<tr>
					<td style="width: 100px;">
						<div class="btn-group btn-block">
							<a href="{{route('motors.edit',$itemMotor)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
							<button class="btn btn-danger fa fa-close"></button>
						</div>
					</td>
					<td>{{$itemMotor->brand->name}}</td>
					<td>{{$itemMotor->name}}</td>
					<td>{{$itemMotor->size}} ({{$itemMotor->valve}}кл.)</td>
					<td>{{$itemMotor->power}}л.с.</td>
					<td>{{$itemMotor->transmission->name}}</td>
					<td>{{$itemMotor->driver->name}}</td>
					<td>{{$itemMotor->type->name}}</td>
				</tr>
			@endforeach		
		</table>
	</div>
</div>
@endsection