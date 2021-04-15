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
	'url'=>route('front.ajax.get.cars'),
	'method'=>'GET',
	'class'=>'stock-filter-form'
])}}

<div class="container py-3" style="background: #f5f5f5;">
	<div class="row pb-4">
		<div class="col">
			{{ Form::select('mark_id',$models,request('mark_id'),['class'=>'form-control','placeholder'=>'Любая модель']) }}
		</div>
		<div class="col">
			{{ Form::select('transmission_type',$transmissions,request('transmission_type'),['class'=>'form-control','placeholder'=>'Любая трансмиссия']) }}
		</div>
		<div class="col">
			{{ Form::select('driver_type',$drivers,request('driver_type'),['class'=>'form-control','placeholder'=>'Любой привод']) }}
		</div>
	</div>

	<div class="row pb-3">
		<div class="col">
			{{ Form::select('status_delivery',$deliveries,request('status'),['class'=>'form-control','placeholder'=>'Любой этап поставки']) }}
		</div>
		<div class="col">
				<div class="input-group">
					{{ Form::text('min_price',request('min_price'),['class'=>'form-control','placeholder'=>'Минимальная цена']) }}
					{{ Form::text('max_price',request('max_price'),['class'=>'form-control','placeholder'=>'Максимальная цена']) }}
				</div>
		</div>
		<div class="col">
			{{ Form::text('vin',request('vin'),['class'=>'form-control','placeholder'=>'VIN автомобиля']) }}
		</div>
	</div>

	<div class="row">
		@foreach($chunkFilters as $chankPart)
		<div class="col">
			@foreach($chankPart as $id => $name)
			<div>
				<label class="checkbox">
					<input
						{{ (request()->has('option_ids') && in_array($id,request('option_ids'))) ? 'checked' : ''}}
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
			<button type="button" class="btn btn-block btn-dark clear">Очистить</button>
		</div>
		<div class="col"></div>
		<div class="col">
			<button type="button" class="btn btn-renault btn-block search">Найти</button>
		</div>
	</div>
</div>


<div class="container stock-control pt-3">
	<div class="row ">
			<div class="col-3">
				{{Form::hidden('favorites',request('favorites'))}}
				<button type="button" class="btn btn-block btn-grey show-favorite" data-status="0">
					Только выбранные 
					<span class="favorite-count">{{count(session()->get('favorites')) ? count(session()->get('favorites')) : '' }}</span>
				</button>
			</div>

			<div class="col-3">
				<a class="btn btn-block btn-grey" href="{{route('front.compare')}}">
					Сравнить выбранные
					<span class="favorite-count">{{count(session()->get('favorites')) ? count(session()->get('favorites')) : '' }}</span>
				</a>
			</div>
			
			<div class="col-3">
				{{Form::hidden('order',request('order'))}}
				<button class="btn btn-grey btn-block order" data-order="minmax" type="button">Сначало дешевле</button>
			</div>

			<div class="col-3">
				<button class="btn btn-grey btn-block order" data-order="maxmin" type="button">Сначало дороже</button>					
			</div>
	</div>
</div>

{{Form::close()}}



<div class="container cars-list stock pt-3 pb-3">
	@if(isset($cars) && $cars->count())
		@foreach($cars as $itemCar)
			@include('front.cars.itemcarrow',['car'=>$itemCar])
		@endforeach
	@endif
</div>
@endsection