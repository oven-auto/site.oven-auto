@extends('layouts.app')

@section('content')
{{Form::open([
	'url'=>isset($car) ? route('cars.update',$car) : route('cars.store'),
	'method'=>isset($car) ? 'PUT' : 'POST',
	'style'=>'width:100%;'
])}}
<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2">
				{{isset($car) ? 'Редактирование: '.$car->vin : 'Новый автомобиль'}}
			</div>
		</div>
	</div>
	

	@include('admin.car.tabs')

	<div class="tab-content" id="car-tab-add">
		<div class="tab-pane fade show active" id="car-main" role="tabpanel" aria-labelledby="car-main-tab">
			@include('admin.car.add_main')
		</div>
		
		<div class="tab-pane fade" id="car-log" role="tabpanel" aria-labelledby="car-log-tab">
			@include('admin.car.car_logistic')
		</div>
		<div class="tab-pane fade" id="car-receiving" role="tabpanel" aria-labelledby="car-receiving-tab">
			@include('admin.car.receiving_car')
		</div>
		<div class="tab-pane fade" id="car-option" role="tabpanel" aria-labelledby="car-option-tab">
			@include('admin.car.option_car',['data'=>isset($car->options) ? $car->options : [] ])
		</div>
	</div>

	@include('admin.form.create.control')

</div>
{{Form::close()}}
@endsection




