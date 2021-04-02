@extends('layouts.front')

@section('content')
<!--BEGIN CAR IMAGE-->
<div class="container model-viewer py-3">
	<div class="row">
		<div class="col text-center">
			<div class="color-img">
				<img src="{{asset('storage/'.$car->img)}}">
			</div>

			<div class="color-name py-3">
				{{$car->color->name}}
				<div class="color-notify">Автомобиль на эскизе может отличаться от реального</div>
			</div>
		</div>
	</div>
</div>
<!--END CAR IMAGE-->

<div class="container py-5 car-actions">
	<div class="row ">
		<div class="col-3 text-left">
			
			<span style="display: inline-block;" class="pr-1 text-center">
				<div class="star text-center">
					<i class="fa fa-car"></i>
				</div>
				<div>О модели</div>
			</span>

			<span style="display: inline-block;" class="px-1 text-center">
				<div class="star text-center">
					<i class="fa fa-file-text"></i>
				</div>
				<div>Скачать</div>
			</span>
		</div>

		<div class="col-6 text-center px-0">
			@if($companies->has(2) && $companies->get(2)->count())
			<span style="display: inline-block;position: relative;" class="pr-1">
				<div class="star text-center">
					<i class="fa fa-gift"></i>
				</div>
				<div>Подарки</div>
				<span class="action-count">{{$companies->get(2)->count()}}</span>
			</span>
			@endif

			@if($companies->has(4) && $companies->get(4)->count())
			<span style="display: inline-block;position: relative;" class="px-1">
				<div class="star text-center">
					<i class="fa fa-rocket"></i>
				</div>
				<div>Акции</div>
				<span class="action-count">{{$companies->get(4)->count()}}</span>
			</span>
			@endif

			@if($companies->has(3) && $companies->get(3)->count())
			<span style="display: inline-block;position: relative;" class="px-1">
				<div class="star text-center">
					<i class="fa fa-database"></i>
				</div>
				<div>Сервисы</div>
				<span class="action-count">{{$companies->get(3)->count()}}</span>
			</span>
			@endif

			@if($companies->has(5) && $companies->get(5)->count())
			<span style="display: inline-block;position: relative;" class="px-1">
				<div class="star text-center">
					<i class="fa  fa-cube"></i>
				</div>
				<div>Продукты</div>
				<span class="action-count">{{$companies->get(5)->count()}}</span>
			</span>
			@endif

			@if($companies->has(1) && $companies->get(1)->count())
			<span style="display: inline-block;position: relative;" class="px-1">
				<div class="star text-center">
					<i class="fa fa-percent"></i>
				</div>
				<div>Скидки</div>
				<span class="action-count">{{$companies->get(1)->count()}}</span>
			</span>
			@endif

			@if(isset($car->mark->credits) && $car->mark->credits->count())
			<span style="display: inline-block;position: relative;" class="pl-1">
				<div class="star text-center">
					<i class="fa fa-university"></i>
				</div>
				<div>Кредиты</div>
				<span class="action-count">{{$car->mark->credits->count()}}</span>
			</span>
			@endif
		</div>

		<div class="col-3 text-right">

			<span style="display: inline-block;position: relative;" class="px-1 text-center">
				<div class="star text-center">
					<i class="fa fa-balance-scale"></i>
				</div>
				<div>
					Сравнить
				</div>
				<span class="favorite-count">{{count(session()->get('favorites')) ? count(session()->get('favorites')) : '' }}</span>
			</span>

			<span style="display: inline-block;" class="pl-1 text-center">
				<div class="star text-center favorites {{(array_key_exists($car->id, session()->get('favorites'))) ? 'favorite-checked' : ''}}" data-url="{{route('front.favorites.push',$car)}}">
					<i class="fa fa-star"></i>
				</div>
				<div>Запомнить</div>
			</span>

			
		</div>
	</div>
</div>

<!--BEGIN CAR HEADER-->
<div class="container pt-3 model-info">
	<div class="row border-bottom pb-1">
		<div class="col text">
			{{$car->vin}}
		</div>

		<div class="col text">
			Этап поставки
		</div>

		<div class="col text">
			Цена продажи
		</div>
	</div>

	<div class="row py-1 car-header-info">
		<div class="col text bold">
			{{$car->brand->name}}
			{{$car->mark->name}}
		</div>

		<div class="col text bold">
			{{$car->getFrontStatus()}}			
		</div>

		<div class="col text bold car-price">
			{{isset($car->total_price) ? number_format($car->total_price,0,'',' ') : ''}} руб.			
		</div>
	</div>

	<div class="row d-flex align-items-center">
		<div class="col text bold">
			{{$car->complect->name}}
		</div>

		<div class="col text bold">
			{{$car->getLocationStatus()}}
		</div>

		<div class="col">
			@include('front.buttons.sale_btn')
		</div>
	</div>
</div>
<!--END CAR HEADER-->

<!--BEGIN COMPLECT-->
<div class="container pb-3 pt-2">
	<div class="row">
		<div class="col">
			@if(isset($car) && isset($car->complect) && $car->complect->has('motor'))
				@include('front.pricelist.complect_motor',['complect'=>$car->complect])
			@endif

			@if(isset($car->complect->options))
				<div class="pt-2 rn-bold">Комплектация {{$car->complect->name}}</div>
				@foreach($car->complect->options->slice(0,ceil($car->complect->options->count()/2)-1) as $key=>$itemOption)
					<div>
						{{$itemOption->option->name}}
					</div>
				@endforeach
			@endif
		</div>

		<div class="col">
			@if(isset($car->complect->options))
				<div class="pack-line"> 
				@foreach($car->complect->options->slice(ceil($car->complect->options->count()/2)-1) as $key=>$itemOption)
					<div>
						{{$itemOption->option->name}}
					</div>
				@endforeach
				</div>
				<div class="pack-price text-right">
					{{$car->complect->format_price}}
				</div>
			@endif
		</div>

		<div class="col">
			@if(isset($car->packs) && $car->packs->count())
			<div class="rn-bold">Опционное оборудование</div>							
				@foreach($car->packs as $itemPack)
					<div>{{$itemPack->pack->name}}</div>
					@if(isset($itemPack->pack->options))
						<div class="pack-line">
						@foreach($itemPack->pack->options as $itemOption)
							<div>{{$itemOption->option->name}}</div>
						@endforeach
						</div>
						<div class="row mb-2">
							<div class="col-6">{{$itemPack->pack->code}}</div>
							<div class="col-6 pack-price text-right">{{$itemPack->pack->format_price}}</div>
						</div>
					@endif
				@endforeach
			@endif

			@if(isset($car->options) && $car->options->count())
				<div class="rn-bold">Дополнительное оборудование</div>
				<div class="pack-line"> 
					@foreach($car->options as $itemOption)
						<div>{{$itemOption->option->name}}</div>
					@endforeach
				</div>
				<div class="pack-price text-right">
					{{number_format($car->option_price,0,'',' ')}} руб.
				</div>
			@endif

			<div class="pt-3">
				@include('front.buttons.conf_btn',['link'=>$car->complect_id])
			</div>
		</div>
	</div>
</div>
<!--END COMPLECT-->

<!--BEGIN COMPANY-->
<div class="container py-3">
	<div class="row">
		<div class="col-8 company-content">
			@foreach($companies as $itemSection)
			<div class="row"> 
				@foreach($itemSection as $itemCompany)
					
					@if($loop->first)
					<div class="col-12 pb-4">
						<div class="block-title">
							{{$itemCompany->section->name}}
						</div> 
					</div>
					@endif

					@if($itemCompany->parameters)
					<div class="col-6 mb-4"> 
						<div 
							class="border p-3 company-block {{($itemCompany->controll->immortal) ? 'company-immortal' : 'company-mortal'}} {{($itemCompany->controll->main) ? 'company-main' : ''}}" 
							data-company-section="{{$itemCompany->section_id}}" 
							data-company-id="{{$itemCompany->id}}"
							{{$itemCompany->parameters->setData($car)}}
						>
							<div class="company-title rn-bold">
								{{$itemCompany->controll->title}}
							</div>

							<div class="company-text">
								{!!$itemCompany->controll->text!!}
							</div>

							<div class="company-footer p-3">
								<div class="company-section pt-3">
									{{$itemCompany->section->name}}
								</div>

								<div class="company-offer">
									{!!$itemCompany->controll->offer!!}
								</div>

								<div class="company-checkbox border m-3">
									
								</div>

								<input type="checkbox" value="{{$itemCompany->id}}" name="company_ids[]">
							</div>
						</div>
					</div>
					@endif
				@endforeach
			</div>
			@endforeach
		</div>

		<div class="col-4" style="position: relative;">
			<div class="block-title pb-4">
				Калькулятор выгод
			</div>
			<div class=" company-calculator">
				<div class="border p-3">
					<div class="block-title text-center">
						Ваш чек*
					</div>

					<div class="px-3">
						<div class="row border-bottom-dotted">
							<div class="col-6 px-0">Комплектация:</div>
							<div class="col-6 px-0 text-right base-price" data-base="{{$car->complect->price}}">{{number_format($car->complect->price,0,'',' ').' руб.'}}</div>
						</div>

						<div class="row border-bottom-dotted">
							<div class="col-6 px-0">Опции:</div>
							<div class="col-6 px-0 text-right packs-price" 
									data-packs="{{
										$car->packs->sum(function($pack){
											return $pack->pack->price;
										})
									}}"
							>
								{{
									number_format($car->packs->sum(function($pack){
										return $pack->pack->price;
									}),0,'',' ').' руб.'
								}}
							</div>
						</div>

						<div class="row border-bottom-dotted">
							<div class="col-6 px-0">Аксессуары:</div>
							<div class="col-6 px-0 text-right option-price" data-option="{{$car->option_price}}">{{number_format($car->option_price,0,'',' ').' руб.'}}</div>
						</div>
					</div>

					<div class="company-description px-3">
						<div class="row">
							<div class="col px-0 pt-3 text-right block-title">
								{{number_format($car->total_price,0,'',' ')}} руб.
							</div>
						</div>
					</div>

					<div class="pt-3">
						@include('front.buttons.sale_btn')
					</div>
				</div>

				<div class="mt-3 px-3">
					* - не является публичной офертой
				</div>
			</div>
		</div>
	</div>
</div>
<!--END COMPANY-->

<!--BEGIN TEST DRIVE-->
@include('front.cars.test')
<!--END TEST-->

<!--Begin Credits-->
@include('front.banner.credit',['credits'=>$car->mark->credits,'model'=>$car->mark])
<!--End Credits-->

<!--Begin footer form-->
@include('forms.pagefooter',[
	'name'=>$car->brand->name.' '.$car->mark->name,
	'image'=>$car->mark->banner
])
<!--End footer form-->

@endsection