@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2">
				{{isset($shortcut) ? 'Редактирование: '.$shortcut->title : 'Новый ярлык'}}
			</div>
		</div>
	</div>

	{{Form::open([
		'url'=>isset($shortcut)?route('shortcuts.update',$shortcut):route('shortcuts.store'),
		'method'=>isset($shortcut)?'PUT':'POST',
	])}}
	<div class="row pt-3">
		<div class="col-6">

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Заголовок</span>
				</div>
				{{Form::text(
					'title',isset($shortcut)?$shortcut->title:'',
					['class'=>'form-control','placeholder'=>'Заголовок']
				)}}
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Ссылка</span>
				</div>
				{{Form::text(
					'link',isset($shortcut)?$shortcut->link:'',
					['class'=>'form-control','placeholder'=>'Ссылка']
				)}}
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Код иконки</span>
				</div>
				{{Form::text(
					'icon',isset($shortcut)?$shortcut->icon:'',
					['class'=>'form-control','placeholder'=>'Иконка']
				)}}
			</div>

		</div>
	</div>

	@include('admin.form.create.control')

	{{Form::close()}}

</div>
@endsection