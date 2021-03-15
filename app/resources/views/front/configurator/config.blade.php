@extends('layouts.front')

@section('content')
<!--Begin complect colors-->
<div class="container model-viewer py-3">
	<div class="row">
		<div class="col text-center">
			<div class="color-img">
				@php($color_id = '')
				@if(isset($complect->mark) && $complect->mark->colors->count())

					@foreach($complect->mark->colors as $itemMarkColor)
						@if($complect->complectcolors->contains('color_id',$itemMarkColor->color_id) && 
							$complect->complectcolors->where('color_id',$itemMarkColor->color_id)->first()->colorpacks->count()==0
						)
							<img src="{{asset('storage/'.$itemMarkColor->img )}}">
							@php($color_id = $itemMarkColor->color_id)
							@break
						@else
							@if($loop->last)
								<img src="{{asset('storage/'.$itemMarkColor->img )}}">
								@php($color_id = $itemMarkColor->color_id)
							@endif
						@endif
					@endforeach
											
				@endif				
			</div>
			<div class="color-control" data-url="{{route('front.ajax.get.modelimage',$complect->mark)}}">
				@if($complect->mark->has('colors'))

					@foreach($complect->complectcolors as $itemComplectColor)
						@if($complect->mark->colors->contains('color_id',$itemComplectColor->color_id))
							<span 
								class="color-btn {{($itemComplectColor->color_id == $color_id) ? 'active' : ''}}" 
								data-color="{{$itemComplectColor->color->web}}"
								data-color-id="{{$itemComplectColor->color_id}}"
								data-pack="{{($itemComplectColor->colorpacks->count()) ? $itemComplectColor->colorpacks->implode('pack_id','-') : ''}}"
							>
									
							</span>
						@endif
					@endforeach

					
				@endif
			</div>

			<div class="color-name py-3">
			@if(
				$complect->mark->has('colors') && 
				$complect->mark->colors->count() && 
				$complect->mark->colors->where('color_id',$color_id)->first()
			)
				{{$complect->mark->colors->where('color_id',$color_id)->first()->color->name}}
				<div>(Автомобиль на эскизе может отличаться от реального)</div>
			@endif
			</div>
		</div>
	</div>
</div>
<!--end model colors-->

<!--BEGIN CAR HEADER-->
<div class="container pt-3 model-info">
	<div class="row border-bottom pb-1">
		<div class="col text">
			Конфигуратор
		</div>

		<div class="col text">
			Этап поставки
		</div>

		<div class="col text">
			Цена продажи
		</div>
	</div>

	<div class="row py-1">
		<div class="col text bold">
			{{$complect->brand->name}}
			{{$complect->mark->name}}
		</div>

		<div class="col text bold">
			Подготовка заказа			
		</div>

		<div class="col text bold config-price" data-price="{{$complect->price}}">
			{{number_format($complect->price,0,'',' ')}} руб.		
		</div>
	</div>

	<div class="row d-flex align-items-center">
		<div class="col text bold">
			{{$complect->name}}
		</div>

		<div class="col text bold">
			Выберите цвет
		</div>

		<div class="col">
			<button type="button" class="btn btn-block btn-renault">Обсудить покупку</button>
		</div>
	</div>
</div>
<!--END CAR HEADER-->

<!--BEGIN COMPLECT-->
<div class="container pb-3 pt-2">
	<div class="row">
		<div class="col">
			@if(isset($complect) && $complect->has('motor'))
				@include('front.pricelist.complect_motor',['complect'=>$complect])
			@endif

			@if(isset($complect->options))
				<div class="pt-2 rn-bold">Комплектация {{$complect->name}}</div>
				@foreach($complect->options->slice(0,ceil($complect->options->count()/2)-1) as $key=>$itemOption)
					<div>
						{{$itemOption->option->name}}
					</div>
				@endforeach
			@endif
		</div>

		<div class="col">
			@if(isset($complect->options))
				<div class="pack-line"> 
				@foreach($complect->options->slice(ceil($complect->options->count()/2)-1) as $key=>$itemOption)
					<div>
						{{$itemOption->option->name}}
					</div>
				@endforeach
				</div>
				<div class="pack-price text-right">
					{{$complect->format_price}}
				</div>
			@endif
		</div>

		<div class="col">
			<div class="rn-bold">Опционное оборудование</div>
			@if(isset($complect->packs) && $complect->packs->count())				
				@foreach($complect->packs as $itemPack)
					<div>{{$itemPack->pack->name}}</div>
					@if(isset($itemPack->pack->options))
						<div class="pack-line">
						@foreach($itemPack->pack->options as $itemOption)
							<div>{{$itemOption->option->name}}</div>
						@endforeach
						</div>
						<div class="row mb-2 d-flex align-items-center">
							<div class="col-6">
								<label class="checkbox {{ ($itemPack->pack->colored) ? 'color-pack-checkbox' : '' }}">
									<input type="checkbox" name="pack_ids[]" value="{{$itemPack->pack_id}}" class="config-pack {{ ($itemPack->pack->colored) ? 'color-pack' : '' }}" data-pack-price="{{$itemPack->pack->price}}">
									<div class="checkbox__text">{{$itemPack->pack->code}}</div>
								</label>
							</div>
							<div class="col-6 pack-price text-right">{{$itemPack->pack->format_price}}</div>
						</div>
					@endif
				@endforeach
			@endif
		</div>
	</div>
</div>
<!--END COMPLECT-->

<!--BEGIN COMPANY-->
<div class="container">
	<div class="row">
		<div class="col">
			<div class="block-title ">
				
			</div>
		</div>
	</div>
</div>
<!--END COMPANY-->

<!--BEGIN TEST DRIVE-->
@include('front.cars.test')
<!--END TEST-->

<!--Begin Credits-->
@include('front.banner.credit',['credits'=>$complect->mark->credits,'model'=>$complect->mark])
<!--End Credits-->
@endsection