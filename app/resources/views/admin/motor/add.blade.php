@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2">
				{{isset($motor) ? 'Редактирование: '.$motor->fullName : 'Новый агрегат'}}
			</div>
		</div>
	</div>
	{{Form::open([
		'url'=>isset($motor)?route('motors.update',$motor):route('motors.store'),
		'method'=>isset($motor)?'PUT':'POST'
	])}}
	<div class="row">
		<div class="col-6">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Название</span>
				</div>
				{{Form::text('name',isset($motor)?$motor->name:'',['placeholder'=>'Название','class'=>'form-control' , 'required'=>'required'])}}
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
					<span class="input-group-text">Тип</span>
				</div>
				{{Form::select('type_id',$types,isset($motor)?$motor->type_id:'',['placeholder'=>'Тип','class'=>'form-control' , 'required'=>'required'])}}
			</div>

			@error('type_id')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror	

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Трансмиссия</span>
				</div>
				{{Form::select('transmission_id',$transmissions,isset($motor)?$motor->transmission_id:'',['placeholder'=>'Трансмиссия','class'=>'form-control' , 'required'=>'required'])}}
			</div>

			@error('transmission_id')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Привод</span>
				</div>
				{{Form::select('driver_id',$drivers,isset($motor)?$motor->driver_id:'',['placeholder'=>'Привод','class'=>'form-control' , 'required'=>'required'])}}
			</div>

			@error('driver_id')						
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
				{{Form::select('brand_id',$brands,isset($motor)?$motor->brand_id:'',['placeholder'=>'Бренд','class'=>'form-control' , 'required'=>'required'])}}
			</div>

			@error('brand_id')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Объём</span>
				</div>
				{{Form::select('size',
					array_combine(range(1000,2800,100),range(1000,2800,100)),
					isset($motor)?$motor->size:'',['placeholder'=>'Объём','class'=>'form-control' , 'required'=>'required'])}}
			</div>

			@error('size')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Мощность</span>
				</div>
				{{Form::number('power',isset($motor)?$motor->power:'',['placeholder'=>'Мощность','class'=>'form-control' , 'required'=>'required'])}}
			</div>

			@error('power')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Кол-во клапанов</span>
				</div>
				{{Form::select('valve',array_combine([8,16],[8,16]),isset($motor)?$motor->valve:'',['placeholder'=>'Кол-во клапанов','class'=>'form-control' , 'required'=>'required'])}}
			</div>

			@error('valve')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror

		</div>
	</div>

	@include('admin.form.create.control')

	{{Form::close()}}

</div>
@endsection