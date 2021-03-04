<div class="row cars-list pt-3 pb-3">
	@if(isset($cars) && $cars->isNotEmpty())
		@foreach($cars as $itemCar)
			
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-2 text-center ">
						<div class="star-block">
							<div class="star">
								<i class="fa fa-star-o"></i>
							</div>
							<div>Запомнить</div>
						</div>
					</div>

					<div class="col-3 ">
						@if(isset($itemCar->img))
							<img src="{{asset('storage/'.$itemCar	->img)}}">
						@else
							<div>Эскиз автомобиля отсутствует</div>
							<!--img src="{{asset('storage/'.$itemCar->mark->alpha)}}"-->
						@endif
					</div>

					<div class="col-5">
						<div class="car-price">Price</div>
						<div class="car-vin">{{$itemCar->vin}}</div>
						<div class="car-name">
							{{$itemCar->brand->name}}
							{{$itemCar->mark->name}}

							@if(!empty($itemCar->color))
								{{$itemCar->color->name}}
								({{$itemCar->color->code}})
							@endif


						</div>
						<div class="car-complect">
							{{$itemCar->year}}
							@if(isset($itemCar->complect))
								{{$itemCar->complect->fullName}}
							@endif
						</div>
					</div>

					<div class="col-2 text-center">
						<div class="star-block">
							<div class="star">
								<i class="{{$itemCar->getIconStatusCss()}}"></i>
							</div>
							<div>{{$itemCar->getFrontStatus()}}</div>
						</div>
					</div>
				</div>
			</div>
			
		@endforeach
	@else
		<div class="container">
			<div class="row">
					<div class="alert alert-warning col m-0">
						Автомобили в данной комплектации отсутствуют на нашем складе, но Вы можете воспользоваться нашим 	<strong>конфигуратором</strong>, и создать свой автомобиль в этой комплектации.
					</div>
			</div>
		</div>
	@endif
</div>