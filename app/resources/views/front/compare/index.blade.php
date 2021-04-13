@extends('layouts.front')

@section('content')
<div class="container py-3">
	<div class="row">
		<div class="col-4 compare-name   mx-0" style="background: #f5f5f5;padding: 0 15px; padding-right: 0px;">
			<div class="compare-img"></div>
			<div class="compare-car-info pb-3" >
				<div class="">
					VIN - номер
				</div>
				<div class="">
					Модель автомобиля
				</div>
				<div class="">
					Комплектация автомобиля
				</div>
				<div class="">
					Тип двигателя
				</div>
				<div class="">
					Объем двигателя
				</div>
				<div class="">
					Мощность двигателя
				</div>
				<div class="">
					КПП автомобиля
				</div>
				<div class="">
					Тип привода
				</div>
				<div class="">
					Цена
				</div>
			</div>

			<div class="h4">
				Оборудование
			</div> 
			@foreach($options as $id=>$itemOption)
				<div class="compare-option py-2 border-bottom d-flex align-items-center" data-id="{{$id}}" >
					{{$itemOption}}
				</div>
			@endforeach
		</div>

		<div class="col-8 px-0">

				<div class="compare-slider">
				@foreach($cars as $itemCar)
					<div class="text-center mx-0 item-slider" style="">
						
						<div class="compare-img">
							<div class="">
								<img src="{{asset('storage/'.$itemCar->img)}}" style="width: 100%;">
							</div>
							<div class="px-3 pb-3">
								<a href="{{route('front.car',$itemCar)}}" class="btn btn-block btn-renault">Подробнее</a>
							</div>
						</div>
						<div class="compare-car-info pb-3">
							<div class="">
								{{$itemCar->vin}}
							</div>
							<div class="">
								{{$itemCar->brand->name}} {{$itemCar->mark->name}}
							</div>
							<div class="">
								{{$itemCar->complect->name}}
							</div>
							<div class="">
								{{$itemCar->complect->motor->type->name}} 
							</div>
							<div class="">
								{{($itemCar->complect->motor->size)/1000}} литра 
							</div>
							<div class="">
								{{$itemCar->complect->motor->power}} л.с. 
							</div>
							<div class="">
								{{$itemCar->complect->motor->transmission->name}} 
							</div>
							<div class="">
								{{$itemCar->complect->motor->driver->name}} 
							</div>
							<div class="">
								{{number_format($itemCar->total_price,0,'',' ')}} руб.
							</div>
						</div>

						<div class="h4">
							&nbsp
						</div> 
						@foreach($itemCar->compare as $id=>$value)
							<div class="compare-option py-2 d-flex align-items-center justify-content-center border-bottom " data-id="{{$id}}"> 
								@if($value == '+')
									<i class="fa fa-plus"></i>
								@else
									<i class="fa fa-minus"></i>
								@endif
							</div>
						@endforeach
					</div>
				@endforeach
				</div>
		</div>
	</div>
</div>
@endsection