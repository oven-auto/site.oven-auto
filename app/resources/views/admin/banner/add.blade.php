@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2">
				{{isset($banner) ? 'Редактирование: '.$banner->title : 'Новый банер'}}
			</div>
		</div>
	</div>

	{{Form::open([
		'url'=>isset($banner)?route('banners.update',$banner):route('banners.store'),
		'method'=>isset($banner)?'PUT':'POST',
		'files'=>true
	])}}
		<div class="row">
			<div class="col">

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Заголовок</span>
					</div>
					{{Form::text('title',isset($banner)?$banner->title:'',['class'=>'form-control','placeholder'=>'Заголовок'])}}
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Текст</span>
					</div>
					{{Form::textarea('text',isset($banner)?$banner->text:'',['class'=>'form-control','placeholder'=>'Заголовок'])}}
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Ссылка</span>
					</div>
					{{Form::text('link',isset($banner)?$banner->link:'',['class'=>'form-control','placeholder'=>'Заголовок'])}}
				</div>

			</div>

			<div class="col">
				<div class="input-group mb-3">

					<div class="">
						@isset($banner)
							<img src="{{asset('storage/'.$banner->img)}}">
						@endisset
					</div>

					<div class="input-group-prepend">
						<span class="input-group-text">Банер</span>
					</div>
					<div class="custom-file">
						{{Form::file('img',['class'=>'custom-file-input'])}}
					    <label class="custom-file-label" for="validatedCustomFile">Укажите фаил</label>
					</div>
					
				</div>
			</div>
		</div>

		@include('admin.form.create.control')

	{{Form::close()}}
</div>
@endsection