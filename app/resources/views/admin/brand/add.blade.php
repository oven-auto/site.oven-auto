@extends('layouts.app')

@section('content')

	<div class="container">
		{{Form::open([
			'url'=>isset($brand)?route('brands.update',$brand):route('brands.store'),
			'files'=>true,
			'method'=>isset($brand)?'PUT':'POST'
		])}}

		

		<div class="row">			
			<div class="col-6">				
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Название</span>
					</div>
					{{Form::text('name',isset($brand)?$brand->name:'',['placeholder'=>'Название','class'=>'form-control' , 'required'=>'required'])}}
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
						<span class="input-group-text">Иконка</span>
					</div>
					<div class="custom-file">
					    <input type="file" class="custom-file-input" name="icon" {{isset($brand)?'':'required'}}>
					    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
					  </div>
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

			<div class="col-6">
				@isset($brand)
					@if(!empty($brand->icon))
						<img src="{{asset('storage/'.$brand->icon)}}">
					@endif
				@endisset
			</div>
		</div>

		@include('admin.form.create.control')

		{{Form::close()}}
		
	</div>
@endsection