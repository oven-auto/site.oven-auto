@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2">
				{{isset($option) ? 'Редактирование: '.$option->name : 'Новое оборудование'}}
			</div>
		</div>
	</div>

	{{Form::open([
		'url'=>isset($option) ? route('options.update',$option) : route('options.store'),
		'method'=>isset($option) ? 'PUT' : 'POST'
	])}}
	<div class="row">
		<div class="col-6">
			<!--NAME BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Название</span>
				</div>
				{{Form::text('name',isset($option)?$option->name:'',['placeholder'=>'Название','class'=>'form-control' , 'required'=>'required'])}}

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

			<!--TYPE BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Раздел</span>
				</div>
				{{Form::select('type_id',$types,isset($option)?$option->type_id:'',['placeholder'=>'Раздел','class'=>'form-control' , 'required'=>'required'])}}

				@error('type_id')
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>
			<!--TYPE END-->

			<!--FILTER BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Фильтруется</span>
				</div>
				{{Form::select('filter_id',$filters,isset($option)?$option->filter_id:'',['placeholder'=>'Укажите фильтр','class'=>'form-control' ])}}

				@error('filter_id')
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>
			<!--FILTER END-->

		
			<!--BRAND BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Бренд</span>
				</div>
				{{Form::select('brand_ids[]',$brands,
				isset($option->brands) ? $option->brands->pluck('brand_id') : '',
				['class'=>'form-control','multiple', 'required' ])}}

				@error('filter_id')
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>
			<!--BRAND END-->
		</div>
	</div>

	@include('admin.form.create.control')

	{{Form::close()}}
</div>
@endsection