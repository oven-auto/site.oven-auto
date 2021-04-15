<div class="row d-flex align-items-center">
	<div class="col-2 text-center ">
		<div class="star-block">
			<div class="star favorites {{(array_key_exists($car->id, session()->get('favorites'))) ? 'favorite-checked' : ''}}" data-url="{{route('front.favorites.push',$car)}}">
				<i class="fa fa-star-o"></i>
			</div>
			<div>Запомнить</div>
		</div>
	</div>

	<div class="col-3 ">
		<a href="{{route('front.car',['id'=>$car->id])}}">
			@if(isset($car->img))
				<img src="{{asset('storage/'.$car	->img)}}">
			@else
				<div>Эскиз автомобиля отсутствует</div>
				<!--img src="{{asset('storage/'.$car->mark->alpha)}}"-->
			@endif
		</a>	
	</div>

	<div class="col-5">
		<a href="{{route('front.car',['id'=>$car->id])}}">
			<div class="car-price">{{isset($car->total_price) ? number_format($car->total_price,0,'',' ') : ''}} руб.</div>
			<div class="car-vin">{{$car->vin}}</div>
			<div class="car-name">
				{{$car->brand->name}}
				{{$car->mark->name}}

				@if(!empty($car->color))
					{{$car->color->name}}
					({{$car->color->code}})
				@endif


			</div>
			<div class="car-complect">
				{{$car->year}}
				@if(isset($car->complect))
					{{$car->complect->fullName}}
				@endif
			</div>
		</a>
	</div>

	<div class="col-2 text-center">
		<div class="star-block">
			<div class="star">
				<i class="{{$car->getIconStatusCss()}}"></i>
			</div>
			<div>{{$car->getFrontStatus()}}</div>
		</div>
	</div>
</div>