<div class="row cars-list pt-3 pb-3">
	@if(isset($cars) && $cars->isNotEmpty())
		<div class="container">
		@foreach($cars as $itemCar)
			
			@include('front.cars.itemcarrow',['car'=>$itemCar])
				
		@endforeach
		</div>
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