@extends('layouts.app')

@section('content')
	
	<div class="container">

	{{Form::open([
		'url'=>isset($pack)?route('packs.update',$pack):route('packs.store'),
		'method'=>isset($pack)?'PUT':'POST'
	])}}
	
		<div class="row">
			<div class="col">
				<div class="h2">
					{{isset($pack)?'Редактировать опцию: '.$pack->name.' '.$pack->code : 'Новая опция'}}
				</div>
			</div>
		</div>

		<div class="row" id="pack-edit">
			<div class="col-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Название</span>
					</div>
					{{Form::text('name',isset($pack)?$pack->name:'',['placeholder'=>'Название','class'=>'form-control' ])}}
				</div>

				@error('pack')						
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Код</span>
					</div>
					{{Form::text('code',isset($pack)?$pack->code:'',['placeholder'=>'Код','class'=>'form-control' , 'required'=>'required'])}}
				</div>

				@error('code')						
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Цена</span>
					</div>
					{{Form::number('price',isset($pack)?$pack->price:'',['placeholder'=>'Цена','class'=>'form-control' , 'required'=>'required'])}}
				</div>

				@error('price')						
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Бренд</span>
					</div>
					{{Form::select('brand_id',$brands,isset($pack)?$pack->brand_id:'',
						[
							'placeholder'=>'Бренд',
							'class'=>'form-control',
							'required'=>'required',
							'data-url-mark'=>route('ajax.get.mark'),
							'data-url-option'=>route('ajax.get.option')
						]
					)}}
				</div>

				@error('brand_id')						
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="col-6">
				<div class="mark-container">
					@isset($pack)
						@include('admin.pack.mark-select')
					@endisset
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col option-container">

			</div>
		</div>

		@include('admin.form.create.control')

	{{Form::close()}}
	</div>

@endsection