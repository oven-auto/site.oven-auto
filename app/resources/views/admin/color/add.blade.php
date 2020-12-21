@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="h2">
					{{isset($color)?'Изменить: '.$color->name:'Новый цвет'}}
				</div>
			</div>
		</div>
		{{Form::open([
			'url'=>isset($color)?route('colors.update',$color):route('colors.store'),
			'method'=>isset($color)?'PUT':'POST'
		])}}
		<div class="row">
			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Название</span>
					</div>
					{{Form::text('name',isset($color)?$color->name:'',['placeholder'=>'Название','class'=>'form-control' , 'required'=>'required'])}}
				</div>

				@error('name')						
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror	

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Код цвета</span>
					</div>
					{{Form::text('code',isset($color)?$color->code:'',['placeholder'=>'Код цвета','class'=>'form-control' , 'required'=>'required'])}}
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
						<span class="input-group-text">Бренд</span>
					</div>
					{{Form::select('brand_id',$brands,isset($color)?$color->brand_id:'',['placeholder'=>'Укажите бренд','class'=>'form-control' , 'required'=>'required'])}}
				</div>

				@error('brand_id')						
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror




				@if(isset($color))
				<div class="colors">
					@foreach(explode(',',$color->web) as $itemWebColor)
					<div class="item-color">
						<div class="input-group mb-3">

							<div class="input-group-prepend">
								
								<div class="btn-group" style="border-radius: 0;">
									<span class="input-group-text">Цвет</span>
									<button type="button" class="btn btn-primary append-color">+</button>
									@if($loop->first)
										<button type="button" class="btn btn-dark shift-color" disabled="">-</button>
									@else
										<button type="button" class="btn btn-danger shift-color">-</button>
									@endif
								</div>
							</div>
							{{Form::color('colors[]',$itemWebColor,['placeholder'=>'Название','class'=>'form-control' , 'required'=>'required'])}}
						</div>

						@error('colors[]')						
						    <div class="alert alert-danger">
						    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								{{ $message }}
							</div>
						@enderror
					</div>
					@endforeach
				</div>
				@else
				<div class="item-color">
					<div class="input-group mb-3">

						<div class="input-group-prepend">
							
							<div class="btn-group" style="border-radius: 0;">
								<span class="input-group-text">Цвет</span>
								<button type="button" class="btn btn-primary append-color">+</button>
								<button type="button" class="btn btn-dark shift-color" disabled="">-</button>
							</div>
						</div>
						{{Form::color('colors[]','',['placeholder'=>'Название','class'=>'form-control' , 'required'=>'required'])}}
					</div>

					@error('colors[]')						
					    <div class="alert alert-danger">
					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							{{ $message }}
						</div>
					@enderror
				</div>
				@endif

			</div>

			<div class="col">
				<div class="color-preview" style="border-radius: 100%;height: 150px;width: 150px;margin: auto;border:1px solid #333;"></div>
			</div>
		</div>

		@include('admin.form.create.control',['backLink'=>Session::get('filter.color')])

		{{Form::close()}}
	</div>
@endsection