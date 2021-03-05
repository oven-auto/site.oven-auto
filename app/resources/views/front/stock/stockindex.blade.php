@extends('layouts.front')

@section('content')
<div class="container model-info text-center py-3">
	<div class="row">
		<div class="col name">
			Автомобили в продаже
		</div>
	</div>
	<div class="row">
		<div class="col description">
			Спасибо, что остановили свой выбор на марке Renault. На этой странице представлены автомобили, которые мы готовы предложить Вам для покупки. Чтобы Вы смогли выбрать самый подходящий вариант, используйте поиск по фильтру, - он позволит выбрать именно те параметры, которые Вы хотите видеть в своем будущем автомобиле.
			Сегодня на сайте 77 автомобилей.
		</div>
	</div>
</div>

<div class="container">
	<div class="row pb-4">
		<div class="col">
			{{ Form::select('mark_id',[],'',['class'=>'form-control']) }}
		</div>
		<div class="col">
			{{ Form::select('transmission_id',[],'',['class'=>'form-control']) }}
		</div>
		<div class="col">
			{{ Form::select('driver_id',[],'',['class'=>'form-control']) }}
		</div>
	</div>

	<div class="row pb-3">
		<div class="col">
			{{ Form::select('driver_id',[],'',['class'=>'form-control']) }}
		</div>
		<div class="col">
				<div class="input-group">
					{{ Form::text('driver_id','',['class'=>'form-control']) }}
					{{ Form::text('driver_id','',['class'=>'form-control']) }}
				</div>
		</div>
		<div class="col">
			{{ Form::select('driver_id',[],'',['class'=>'form-control']) }}
		</div>
	</div>

	<div class="row">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
</div>

<div class="container cars-list pt-3 pb-3">
	@if(isset($cars) && $cars->count())
		@foreach($cars as $itemCar)
			@include('front.cars.itemcarrow',['car'=>$itemCar])
		@endforeach
	@endif
</div>
@endsection