<!-- <div class="row cars-list pt-3 pb-3"> -->
	@if(isset($cars) && $cars->isNotEmpty())
		<!-- <div class="container"> -->
		@foreach($cars as $itemCar)
			
			@include('front.cars.itemcarrow',['car'=>$itemCar])
				
		@endforeach
		<!-- </div> -->
	@endif
<!-- </div> -->
