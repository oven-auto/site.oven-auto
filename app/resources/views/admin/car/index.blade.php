@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="h2 m-0">
					Список автомобилей
				</div>
			</div>
			<div class="col text-right">
				<div class="btn-group">
					<a href="{{route('cars.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
					<a href="{{route('cars.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
				</div>
			</div>
		</div>

		
		<div class="row pt-3">
			<table class="table complect-table">
				<tr class="thead-dark">
					
				</tr>
				
				@foreach($cars as $itemCar)
					<tr>
						<td>
							<div class="btn-group btn-block">
								<a href="{{route('cars.edit',$itemCar)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
								<button class="btn btn-danger fa fa-close"></button>
							</div>
						</td>
						
						<td>
							{{$itemCar->vin}}
						</td>

						<td>
							{{$itemCar->brand->name}}
							{{$itemCar->mark->name}}
						</td>

						<td>
							{{$itemCar->complect->name}}
							{{$itemCar->complect->motor->adminName}}
						</td>

						<td>
							<div class="color-pic" data-color="{{$itemCar->color->web}}" style="display: inline-block;"></div>
						</td>

						<td>
							{{$itemCar->delivery->name}}
						</td>

						<td>
							{{$itemCar->year}}
						</td>

						<td>
							{{$itemCar->getStatus()}}
						</td>
					</tr>
				@endforeach

			</table>
		</div>
	</div>
@endsection