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

			Спасибо, что остановили свой выбор на марке Renault. На этой странице представлены автомобили, которые мы готовы предложить Вам для покупки. Чтобы Вы смогли выбрать самый подходящий вариант, используйте поиск по фильтру, - он позволит выбрать именно те параметры, которые Вы хотите видеть в своем будущем автомобиле.<br/>
			Сегодня на сайте {{$carCount}}

			@if($carCount%10==1) 
				автомобиль
			@elseif($carCount%10>1 && $carCount%10<5 && $carCount!=11 && $carCount!=12 && $carCount!=13 && $carCount!=14)
				автомобиля
			@else
				автомобилей
			@endif

		</div>
	</div>
</div>

{{Form::open([
	'url'=>route('front.stock'),
	'method'=>'GET',
])}}
<div class="container py-3" style="background: #f5f5f5;">
	<div class="row pb-4">
		<div class="col">
			{{ Form::select('mark_id',$models,'',['class'=>'form-control','placeholder'=>'Любая модель']) }}
		</div>
		<div class="col">
			{{ Form::select('transmission_type',$transmissions,'',['class'=>'form-control','placeholder'=>'Любая трансмиссия']) }}
		</div>
		<div class="col">
			{{ Form::select('driver_type',$drivers,'',['class'=>'form-control','placeholder'=>'Любой привод']) }}
		</div>
	</div>

	<div class="row pb-3">
		<div class="col">
			{{ Form::select('status',$deliveries,'',['class'=>'form-control','placeholder'=>'Любой этап поставки']) }}
		</div>
		<div class="col">
				<div class="input-group">
					{{ Form::text('min_price','',['class'=>'form-control','placeholder'=>'Минимальная цена']) }}
					{{ Form::text('max_price','',['class'=>'form-control','placeholder'=>'Максимальная цена']) }}
				</div>
		</div>
		<div class="col">
			{{ Form::text('vin','',['class'=>'form-control','placeholder'=>'VIN автомобиля']) }}
		</div>
	</div>

	<div class="row">

		@foreach($chunkFilters as $chankPart)
		<div class="col">
			@foreach($chankPart as $id => $name)
			<div>
				<label class="checkbox">
					<input
						type="checkbox" 
						name="option_ids[]" 
						value="{{$id}}" 
					>
					<div class="checkbox__text">{{$name}}</div>
				</label>
			</div>
			@endforeach
		</div>
		@endforeach	

	</div>

	<div class="row pt-3">
		<div class="col">
			<a href="{{route('front.stock')}}" class="btn btn-block btn-dark">Очистить</a>
		</div>
		<div class="col"></div>
		<div class="col">
			<button type="submit" class="btn btn-renault btn-block">Найти</button>
		</div>
	</div>
</div>
{{Form::close()}}

<div class="container cars-list pt-3 pb-3">
	@if(isset($cars) && $cars->count())
		@foreach($cars as $itemCar)
			@include('front.cars.itemcarrow',['car'=>$itemCar])
		@endforeach
	@endif
</div>
@endsection