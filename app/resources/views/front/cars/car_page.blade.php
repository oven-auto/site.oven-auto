@extends('layouts.front')

@section('content')
<input type="hidden" value="{{$car->vin}}" name="hidden_vin">

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

<!--BEGIN COMPANY ANKOR-->
@include('front.company.ankors',[
	'model'=>$car->mark->slug,
	'config'=>false,
	'href'=>route('pdf.car',$car)
])
<!--END COMPANY ANKOR-->

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
@include('front.company.grid')
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