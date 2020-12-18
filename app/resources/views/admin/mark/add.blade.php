@extends('layouts.app')

@section('content')
	{{Form::open([
		'url'=>isset($mark)?route('marks.update',$mark):route('marks.store'),
		'method'=>isset($mark)?'PUT':'POST',
		'files'=>true
	])}}
	<div class="container">
		<div class="row">
			<div class="h2 col">{{isset($title)?$title:''}}</div>
		</div>

		<div class="row">
			<div class="col">

				<!--NAME BEGIN-->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Название</span>
					</div>
					{{Form::text('name',isset($mark)?$mark->name:'',['placeholder'=>'Название','class'=>'form-control' , 'required'=>'required'])}}

					@error('name')						
					    <div class="alert alert-danger">
					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							{{ $message }}
						</div>
					@enderror	
				</div>
				<!--NAME END-->

				<!--BRAND BEGIN-->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Бренд</span>
					</div>
					{{Form::select('brand_id', $brands,isset($mark)?$mark->brand_id:'',['placeholder'=>'Укажите бренд','class'=>'form-control' , 'required'=>'required'])}}

					@error('brand_id')						
					    <div class="alert alert-danger">
					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							{{ $message }}
						</div>
					@enderror	
				</div>
				<!--BRAND END-->

				<!--BODY BEGIN-->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Кузов</span>
					</div>
					{{Form::select('body_id', $bodies,isset($mark)?$mark->body_id:'',['placeholder'=>'Укажите тип кузова','class'=>'form-control' , 'required'=>'required'])}}

					@error('body_id')						
					    <div class="alert alert-danger">
					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							{{ $message }}
						</div>
					@enderror	
				</div>
				<!--BODY END-->

				<!--BODY BEGIN-->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Страна</span>
					</div>
					{{Form::select('country_id', $countries,isset($mark)?$mark->country_id:'',['placeholder'=>'Укажите страну','class'=>'form-control' , 'required'=>'required'])}}

					@error('country_id')						
					    <div class="alert alert-danger">
					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							{{ $message }}
						</div>
					@enderror	
				</div>
				<!--BODY END-->

				<!--BODY BEGIN-->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Статус</span>
					</div>
					{{Form::select(
						'status', 
						[0=>'не показывать',1=>'показывать'],
						isset($mark)?$mark->status:'',
						['placeholder'=>'Укажите статус','class'=>'form-control' , 'required'=>'required']
					)}}

					@error('status')						
					    <div class="alert alert-danger">
					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							{{ $message }}
						</div>
					@enderror	
				</div>
				<!--BODY END-->

				<!--PREFIX BEGIN-->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Префикс</span>
					</div>
					{{Form::text('prefix',isset($mark)?$mark->prefix:'',['placeholder'=>'Префикс','class'=>'form-control' ])}}

					@error('predix')						
					    <div class="alert alert-danger">
					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							{{ $message }}
						</div>
					@enderror	
				</div>
				<!--PREFIX END-->
			</div>

			<div class="col-9">
				<div class="row">
					<div class="col">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Иконка</span>
							</div>
							<div class="custom-file">
							    <input type="file" class="custom-file-input" name="icon" {{isset($mark)?'':'required'}}>
							    <label class="custom-file-label" for="validatedCustomFile">Укажите фаил</label>
							</div>

							@error('icon')
							    <div class="alert alert-danger">
								    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								    {{ $message }}
								</div>
							@enderror
						</div>	
						@isset($mark)
							<div class="">
								<img src="{{asset('storage/'.$mark->icon)}}">
							</div>
						@endisset
					</div>

					<div class="col">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Альфа</span>
							</div>
							<div class="custom-file">
							    <input type="file" class="custom-file-input" name="alpha" {{isset($mark)?'':'required'}}>
							    <label class="custom-file-label" for="validatedCustomFile">Укажите фаил</label>
							</div>

							@error('alpha')
							    <div class="alert alert-danger">
								    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								    {{ $message }}
								</div>
							@enderror
						</div>	
						@isset($mark)
							<div class="">
								<img src="{{asset('storage/'.$mark->alpha)}}">
							</div>
						@endisset
					</div>

					<div class="col">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Банер</span>
							</div>
							<div class="custom-file">
							    <input type="file" class="custom-file-input" name="banner" {{isset($mark)?'':'required'}}>
							    <label class="custom-file-label" for="validatedCustomFile">Укажите фаил</label>
							</div>

							@error('banner')
							    <div class="alert alert-danger">
								    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								    {{ $message }}
								</div>
							@enderror
						</div>	
						@isset($mark)
							<div class="">
								<img src="{{asset('storage/'.$mark->banner)}}">
							</div>
						@endisset
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<!--SLOGAN BEGIN-->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Слоган</span>
					</div>
					{{Form::text('slogan',isset($mark)?$mark->slogan:'',['placeholder'=>'Слоган','class'=>'form-control' , 'required'=>'required'])}}

					@error('slogan')						
					    <div class="alert alert-danger">
					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							{{ $message }}
						</div>
					@enderror	
				</div>
				<!--SLOGAN END-->

				<!--DESCRIPTION BEGIN-->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Описание</span>
					</div>
					{{Form::textarea('description',isset($mark)?$mark->description:'',['placeholder'=>'Описание','class'=>'form-control' , 'required'=>'required','style'=>'height:100px;'])}}

					@error('description')						
					    <div class="alert alert-danger">
					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							{{ $message }}
						</div>
					@enderror	
				</div>
				<!--DESCRIPTION END-->
			</div>
		</div>


		<div class="row">
			<div class="col">
				<div class="h4 mb-3">
					Документы
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">
							@if(isset($mark->documents) && !empty($mark->documents->brochure))
								<a href="{{asset('storage/'.$mark->documents->brochure)}}" target="_blank">Брошюра</a>
							@else
								Брошюра
							@endif
						</span>
					</div>
					<div class="custom-file">
					    <input type="file" class="custom-file-input" name="brochure">
					    <label class="custom-file-label" for="validatedCustomFile">Укажите фаил</label>
					</div>

					@error('brochure')
					    <div class="alert alert-danger">
						    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						    {{ $message }}
						</div>
					@enderror
				</div>	
			</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">
							@if(isset($mark->documents) && !empty($mark->documents->manual))
								<a href="{{asset('storage/'.$mark->documents->manual)}}" target="_blank">Руководство</a>
							@else
								Руководство
							@endif
						</span>
					</div>
					<div class="custom-file">
					    <input type="file" class="custom-file-input" name="manual">
					    <label class="custom-file-label" for="validatedCustomFile">Укажите фаил</label>
					</div>

					@error('manual')
					    <div class="alert alert-danger">
						    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						    {{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">
							@if(isset($mark->documents) && !empty($mark->documents->price))
								<a href="{{asset('storage/'.$mark->documents->price)}}" target="_blank">Прайс-лист</a>
							@else
								Прайс-лист
							@endif
						</span>
					</div>
					<div class="custom-file">
					    <input type="file" class="custom-file-input" name="price">
					    <label class="custom-file-label" for="validatedCustomFile">Укажите фаил</label>
					</div>

					@error('price')
					    <div class="alert alert-danger">
						    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						    {{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">
							@if(isset($mark->documents) && !empty($mark->documents->toy))
								<a href="{{asset('storage/'.$mark->documents->toy)}}" target="_blank">Акссесуары</a>
							@else
								Акссесуары
							@endif
						</span>
					</div>
					<div class="custom-file">
					    <input type="file" class="custom-file-input" name="toy">
					    <label class="custom-file-label" for="validatedCustomFile">Укажите фаил</label>
					</div>

					@error('toy')
					    <div class="alert alert-danger">
						    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						    {{ $message }}
						</div>
					@enderror
				</div>
			</div>
		</div>

		@isset($properties)
			<div class="row">
				<div class="col">
					<div class="h4 mb-3">
						Характеристики
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($properties as $itemProperty)
					
					<div class="col-4">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">{{$itemProperty->name}}</span>
							</div>
							{{Form::text(
								'properties['.$itemProperty->id.']',
								($mark->properties->contains('property_id',$itemProperty->id))?$mark->properties->where('property_id',$itemProperty->id)->first()->value:'',
								['placeholder'=>'','class'=>'form-control' ]
							)}}
							@error('properties.'.$itemProperty->id)						
							    <div class="alert alert-danger">
							    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									{{ $message }}
								</div>
							@enderror	
						</div>
					</div>
					
				@endforeach
			</div>
		@endisset

		<div class="row ">
			<div class="col-12">
				<div class="h4 mb-3">
					Цветовая палитра
				</div>
			</div>
			<div class="col-12">
				<button type="button" class="btn btn-dark" id="get-color" data-url="{{route('ajax.mark.color.get')}}">Добавить/удалить цвета</button>
			</div>
		</div>
		<div class="palette">
			<div class="row">
				@if(isset($mark->colors) && $mark->colors->count())

				@endif
			</div>
		</div>

		@include('admin.form.create.control')

	</div>
	{{Form::close()}}
@endsection