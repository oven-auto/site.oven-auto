@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="h2">
					{{isset($property)?'Характеристика: '.$property->name:'Новая характеристика'}}
				</div>
			</div>
		</div> 
		{{Form::open([
			'url'=>isset($property)?route('properties.update',$property):route('properties.store'),
			'method'=>isset($property)?'PUT':'POST'
		])}}
		<div class="row">
			<div class="col-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Название</span>
					</div>
					{{Form::text('name',isset($property)?$property->name:'',['placeholder'=>'Название','class'=>'form-control' , 'required'=>'required'])}}
				</div>

				@error('name')						
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