<div class="container py-5 car-actions">
	<div class="row ">
		<div class="col-3 text-left">
			
			<span style="display: inline-block;" class="pr-1 text-center">
				<a href="{{route('front.pricelist',$model)}}">
					<div class="star text-center">
						<i class="fa fa-car"></i>
					</div>
					<div>О модели</div>
				</a>
			</span>

			<span style="display: inline-block;" class="px-1 text-center">
				<a href="{{$href}}" target="_blank">
					<div class="star text-center">
						<i class="fa fa-file-text"></i>
					</div>
					<div>Скачать</div>
				</a>
			</span>
		</div>
		
		<div class="col-6 text-center px-0">
		@if(isset($companies) && $companies->count())
		
			@if($companies->has(2) && $companies->get(2)->count())
			<span style="display: inline-block;position: relative;" class="pr-1">
				<a href="#section2">
					<div class="star text-center">
						<i class="fa fa-gift"></i>
					</div>
					<div>Подарки</div>
					<span class="action-count">{{$companies->get(2)->count()}}</span>
				</a>
			</span>
			@endif

			@if($companies->has(4) && $companies->get(4)->count())
			<span style="display: inline-block;position: relative;" class="px-1">
				<a href="#section4">
				<div class="star text-center">
					<i class="fa fa-rocket"></i>
				</div>
				<div>Акции</div>
				<span class="action-count">{{$companies->get(4)->count()}}</span>
				</a>
			</span>
			@endif

			@if($companies->has(3) && $companies->get(3)->count())
			<span style="display: inline-block;position: relative;" class="px-1">
				<a href="#section3">
				<div class="star text-center">
					<i class="fa fa-database"></i>
				</div>
				<div>Сервисы</div>
				<span class="action-count">{{$companies->get(3)->count()}}</span>
				</a>
			</span>
			@endif

			@if($companies->has(5) && $companies->get(5)->count())
			<span style="display: inline-block;position: relative;" class="px-1">
				<a href="#section5">
				<div class="star text-center">
					<i class="fa  fa-cube"></i>
				</div>
				<div>Продукты</div>
				<span class="action-count">{{$companies->get(5)->count()}}</span>
				</a>
			</span>
			@endif

			@if($companies->has(1) && $companies->get(1)->count())
			<span style="display: inline-block;position: relative;" class="px-1">
				<a href="#section1">
				<div class="star text-center">
					<i class="fa fa-percent"></i>
				</div>
				<div>Скидки</div>
				<span class="action-count">{{$companies->get(1)->count()}}</span>
				</a>
			</span>
			@endif

			@if(isset($car->mark->credits) && $car->mark->credits->count())
			<span style="display: inline-block;position: relative;" class="pl-1">
				<a href="#credits">
				<div class="star text-center">
					<i class="fa fa-university"></i>
				</div>
				<div>Кредиты</div>
				<span class="action-count">{{$car->mark->credits->count()}}</span>
				</a>
			</span>
			@endif
		
		@endif
		</div>
		
		<div class="col-3 text-right {{($config) ? 'disabled-ankor' : ''}}" >

			<span style="display: inline-block;position: relative;" class="px-1 text-center">
				<a href="{{route('front.compare')}}">
				<div class="star text-center">
					<i class="fa fa-balance-scale"></i>
				</div>
				<div>
					Сравнить
				</div>
				<span class="favorite-count">{{count(session()->get('favorites')) ? count(session()->get('favorites')) : '' }}</span>
				</a>
			</span>

			<span style="display: inline-block;" class="pl-1 text-center">
				<div class="star text-center favorites {{(array_key_exists($car->id, session()->get('favorites'))) ? 'favorite-checked' : ''}}" data-url="{{($config) ? '' : route('front.favorites.push',$car)}}">
					<i class="fa fa-star"></i>
				</div>
				<div>Запомнить</div>
			</span>

			
		</div>
	</div>
</div>