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

				

				<div class="input-group mb-3 border">
					<div class="input-group-prepend">
						<span class="input-group-text">Опция цвета</span>
					</div>
					{{Form::checkbox('colored',1,isset($pack)?$pack->colored:'',['class'=>'form-control'])}}
				</div>

				@error('colored')						
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="col-6">
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

				<div class="mark-container">
					@isset($pack)
						@include('admin.getters.mark-select',['data'=>$pack->marks->pluck('mark_id')])
					@endisset
				</div>
			</div>
		</div>


		<div class="row">			
			<div class="col option-container">
				@isset($pack->options)
					@include('admin.getters.options',['data'=>isset($pack->options)?$pack->options:''])
				@endisset
			</div>
		</div>

		@include('admin.form.create.control',['backLink'=>Session::get('filter.pack')])

	{{Form::close()}}
	</div>

@endsection