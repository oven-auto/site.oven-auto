@extends('layouts.app')

@section('content')

<div class="container" id="complect-edit">
	<div class="row">
		<div class="col">
			<div class="h2">
				{{isset($complect) ? 'Редактирование: '.$complect->name : 'Новая комплектация'}}
			</div>
		</div>
	</div>
	{{Form::open([
		'url'=>isset($complect)?route('complects.update',$complect):route('complects.store'),
		'method'=>isset($complect)?'PUT':'POST'
	])}}
	<div class="row">
		<div class="col-6">

			<!--NAME BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Название</span>
				</div>
				{{Form::text('name',isset($complect)?$complect->name:'',['placeholder'=>'Название','class'=>'form-control'])}}

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

			<!--NAME BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Код</span>
				</div>
				{{Form::text('code',isset($complect)?$complect->code:'',['placeholder'=>'Код','class'=>'form-control' , 'required'=>'required'])}}

				@error('code')
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>
			<!--NAME END-->

			<!--NAME BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Цена</span>
				</div>
				{{Form::number('price',isset($complect)?$complect->price:'',['placeholder'=>'Цена','class'=>'form-control' , 'required'=>'required'])}}

				@error('price')
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>
			<!--NAME END-->

			
		</div>

		<div class="col-6">
			<!--NAME BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Бренд</span>
				</div>
				{{Form::select('brand_id',$brands,isset($complect)?$complect->brand_id:'',
					[
						'placeholder'=>'Бренд',
						'class'=>'form-control',
						'required'=>'required',
						'data-url-mark'=>route('ajax.get.mark'),
						'data-url-option'=>route('ajax.get.option'),
						'data-url-motor'=>route('ajax.get.motor')
					]
				)}}

				@error('brand_id')
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>
			<!--NAME END-->

			<div class="mark-container">
				@isset($complect)
					@include('admin.getters.mark-select',['data'=>[$complect->mark_id]])
				@endisset
			</div>

			<div class="motor-container">
				@isset($complect)
					@include('admin.getters.motor-select',['data'=>[$complect->motor_id]])
				@endisset
			</div>

		</div>
	</div>

	<div class="row">

		<div class="col option-container">
			@isset($complect)
				@include('admin.getters.options',['data'=>isset($complect->options)?$complect->options:''])
			@endisset
		</div>

	</div>

	<div class="row pt-5">
		<div class="col pack-container">
			@isset($complect)
				@include('admin.getters.packs',['data'=>isset($complect->packs)?$complect->packs:''])
			@endisset
		</div>
	</div>

	@include('admin.form.create.control')

	{{Form::close()}}
</div>


@endsection