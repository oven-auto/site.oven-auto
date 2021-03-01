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
								{{$model->countCars}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end model count and min price-->

	<!--begin model infos-->
	<div class="container model-info pt-4">
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
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="">
					<img src="{{asset('storage/'.$model->alpha)}}">
				</div>
				<div class="">
					@if($model->has('colors'))
						@foreach($model->colors as $itemColor)
							<span class="{{($loop->first) ? 'active' : ''}}" style="display: inline-block;width: 30px;height: 30px;background: {{$itemColor->color->web}}"></span>
						@endforeach
					@endif
				</div>
				<div class="">
					@if($model->has('colors'))
						{{$model->colors->first()->color->name}}
					@endif
				</div>
			</div>
		</div>
	</div>
	<!--end model colors-->

	<!--Begin model properties-->
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="block-title py-3">
					Характеристики
				</div>
			</div>
		</div>

		<div class="row properties">
			@foreach($model->properties->chunk($model->properties->count()/2) as $chunk)
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
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="block-title py-3">
					Комплектации
				</div>
			</div>
		</div>

		@foreach($model->currentcomplects as $itemComplect)
		<div class="row">
			<div class="col-12 model-complect-control">
				<div class="row"> 
					<div class="col-7"> 
						{{$itemComplect->frontName}}
						{{$itemComplect->code}}
					</div>

					<div class="col-1"> 
						{{$itemComplect->cars_count}}
					</div>

					<div class="col-4 text-right"> 
						{{number_format($itemComplect->price,0,'',' ')}} руб.
						<span class="model-complect-open fa fa-angle-down ml-3" data-url="" ></span>
					</div>
				</div>
			</div>
			<div class="col-12 model-complect-content">

			</div>
		</div>
		@endforeach
	</div>
	<!--End model complects-->

	<!--Begin testdrive-->
		<!--*-->
	<!--end testdrive-->

	<!--Begin Credits-->
		<!--*-->
	<!--End Credits-->

@endsection