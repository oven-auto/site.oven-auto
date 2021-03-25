@extends('layouts.front')

@section('content')
	<!--Begin banner-->
	<div class="container banners">
		<div class="row">
			<div class="col">
				<img src="{{asset('storage/'.$model->banner)}}">
			</div>
		</div>
	</div>
	<!--End banner-->

	<!--Begin model count and min price-->
	<div class="container ">
		<div class="row">
			<div class="col">
				<div class="container model-header py-3">
					<div class="row">
						<div class="col">
							<div class="model-header-title">
								Начальная цена
							</div>
							<div class="model-header-value">
								{{number_format($model->minPrice,0,'',' ')}} руб.
							</div>
						</div>
						<div class="col border-left border-right">
							<div class="model-header-title">
								Кредитные программы
							</div>
							<div class="model-header-value">
								@if($model->has('credits'))
									от {{number_format($model->credits->min('rate'),1,'.','')}}%
								@endif
							</div>
						</div>
						<div class="col">
							<div class="model-header-title">
								Сейчас в продаже
							</div>
							<div class="model-header-value">
								@if($model->countCars % 10 == 1 && $model->countCars!=11)
									{{$model->countCars}} автомобиль
								@elseif($model->countCars % 10 > 1 && $model->countCars % 10 < 5)
									{{$model->countCars}} автомобиля
								@else
									{{$model->countCars}} автомобилей
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end model count and min price-->

	<!--begin model infos-->
	<div class="container model-info py-3">
		<div class="row">
			<div class="col text-center">
				<div class="name">
					{{$model->brand->name}}
					{{$model->name}}
				</div>

				<div class="slogan pb-4">
					{{$model->slogan}}
				</div>

				<div class="description">
					{{$model->description}}
				</div>
			</div>
		</div>
	</div>
	<!--end model infos-->

	<!--Begin model colors-->
	<div class="container model-viewer py-3">
		<div class="row">
			<div class="col text-center">
				<div class="color-img">
					@if(isset($model) && $model->colors->count())
						<img src="{{asset('storage/'.$model->colors->first()->img )}}">						
					@endif				
				</div>
				<div class="color-control" data-url="{{route('front.ajax.get.modelimage',$model)}}">
					@if($model->has('colors'))
						@foreach($model->colors as $itemColor)
							<span 
								class="color-btn {{($loop->first) ? 'active' : ''}}" 
								data-color="{{$itemColor->color->web}}"
								data-color-id="{{$itemColor->color_id}}"
							>
									
							</span>
						@endforeach
					@endif
				</div>
				<div class="color-name py-3">
					@if($model->has('colors') && $model->colors->count() )
						{{$model->colors->first()->color->name}}
						<div>(Автомобиль на эскизе может отличаться от реального)</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!--end model colors-->

	<!--Begin model properties-->
	<div class="container py-3">
		<div class="row">
			<div class="col">
				<div class="block-title ">
					Характеристики
				</div>
			</div>
		</div>

		<div class="row properties">
			@foreach($model->properties->where('name','!=','--')->chunk(ceil($model->properties->count()/2)) as $chunk)
				<div class="col">
					<table class="table">
					@foreach($chunk as $itemProperty)
						<tr>
							<td> 
								{{$itemProperty->property->name}}
							</td>
							<td> 
								{{$itemProperty->value}}
							</td>
						</tr>
					@endforeach
					</table>
				</div>
			@endforeach
		</div>
	</div>
	<!--End model properties-->

	<!--Begin model complects-->
	@if(isset($complects) && $complects->where('status',1)->count())
	<div class="container py-3">
		<div class="row">
			<div class="col">
				<div class="block-title ">
					Комплектации
				</div>
			</div>
		</div>

		@foreach($complects->where('status',1) as $itemComplect)
			@include('front.pricelist.complect-row',['complect'=>$itemComplect])
		@endforeach
	</div>
	@endif

	@if(isset($complects) && $complects->where('status',0)->count())
	<div class="container py-3">
		<div class="row">
			<div class="col">
				<div class="block-title ">
					Прошлые комплектации
				</div>
			</div>
		</div>
		@foreach($complects->where('status',0) as $itemComplect)
			@include('front.pricelist.complect-row',['complect'=>$itemComplect])
		@endforeach
	</div>
	@endif
	<!--End model complects-->

	<!--Begin testdrive-->
	@include('front.cars.test')
	<!--end testdrive-->

	<!--Begin Credits-->
	@include('front.banner.credit',['credits'=>$model->credits,'model'=>$model])
	<!--End Credits-->

	<!--Begin footer form-->
	@include('forms.pagefooter',[
		'name'=>$model->brand->name.' '.$model->name,
		'image'=>$model->banner
	])
	<!--End footer form-->

@endsection