@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2">
				{{isset($company) ? 'Редактирование: '.$company->name : 'Новая коммерческая акция'}}
			</div>
		</div>
	</div>

	{{Form::open([
		'url'=>isset($company)?route('companies.update',$company):route('companies.store'),
		'method'=>isset($company)?'PUT':'POST'
	])}}
	<div class="row">
		<div class="col-3">
			<!--BEGIN DATE-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Начало акции</span>
				</div>
				{{Form::date(
					'begin_date',
					isset($complect)?$complect->name:'',
					['placeholder'=>'Название','class'=>'form-control']
				)}}

				@error('name')
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>
			<!--BEGIN DATE END-->
		</div>

		<div class="col-3">
			<!--END DATE-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Конец акции</span>
				</div>
				{{Form::date(
					'end_date',
					isset($complect)?$complect->name:'',
					['placeholder'=>'Название','class'=>'form-control']
				)}}

				@error('name')
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>
			<!--END DATE END-->
		</div>

		<div class="col-3">
			<!--BEGIN STATUS-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Статус</span>
				</div>
				{{Form::select(
					'status',
					['Не активна','Активна'],
					isset($complect)?$complect->name:'',
					['class'=>'form-control']
				)}}

				@error('name')
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
			</div>
			<!--END STATUS-->
		</div>
	</div>

	<div class="row">
		<div class="col h4">
			Включаюшие условия
		</div>

		<div class="cars_set">
			@if(isset($company))

			@else
				@include('admin.company.cars_in')
			@endif
		</div>

		<div class="col-2 offset-10 pt-3">
			<button 
				class="btn btn-success btn-block cars-set-add" 
				data-url="{{route('company.get.condition',['type'=>1])}}" 
				type="button">
				Добавить
				<i class="fa fa-plus"></i>
			</button>
		</div>
	</div>

	<div class="row">
		<div class="col h4">
			Исключающие условия
		</div>

		<div class="cars_set">
			@if(isset($company))

			@else
				@include('admin.company.cars_out')
			@endif
		</div>
		
		<div class="col-2 offset-10 pt-3">
			<button 
				class="btn btn-success btn-block cars-set-add" 
				data-url="{{route('company.get.condition',['type'=>0])}}" 
				type="button">
				Добавить
				<i class="fa fa-plus"></i>
			</button>
		</div>
	</div>

	<div class="row">
		<div class="col-12 h4">
			Механика акции
		</div>

		<div class="col">
			<!--BEGIN STATUS-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Промо-код</span>
				</div>
				{{Form::text(
					'promo',
					isset($complect)?$complect->name:'',
					['class'=>'form-control']
				)}}
			</div>
			<!--END STATUS-->
		</div>

		<div class="col">
			<!--BEGIN STATUS-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Раздел</span>
				</div>
				{{Form::select(
					'section_id',
					$sections,
					isset($complect)?$complect->name:'',
					['class'=>'form-control','placeholder'=>'Укажите раздел']
				)}}
			</div>
			<!--END STATUS-->
		</div>

		<div class="col">
			<!--BEGIN STATUS-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Рабочее название</span>
				</div>
				{{Form::text(
					'name',
					isset($complect)?$complect->name:'',
					['class'=>'form-control']
				)}}
			</div>
			<!--END STATUS-->
		</div>

		<div class="col">
			<!--BEGIN STATUS-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Сценарий</span>
				</div>
				{{Form::select(
					'scenario_id',
					$scenarios,
					'',
					['placeholder'=>'Укажите сценарий', 'class'=>'form-control', 'data-url'=>route('company.get.scenario.list')]
				)}}
			</div>
			<!--END STATUS-->
		</div>
	</div>

	<div class="row callculate-company">
		@isset($company)

		@endisset
	</div>

	<div class="row">
		<div class="col-3">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Убивает прочие</span>
				</div>
				{{Form::checkbox(
					'main',
					'1',
					'',
					['class'=>'']
				)}}
			</div>
		</div>

		<div class="col-3">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Бессмертная</span>
				</div>
				{{Form::checkbox(
					'immortal',
					1,
					'',
					['class'=>'']
				)}}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="h4">Контент для клиента</div>
		</div>

		<div class="col-4">
			<div class="input-group ">
				<div class="input-group-prepend">
					<span class="input-group-text">Шаблоны</span>
				</div>
			</div>
			<ul class="list-group">
	            <li class="list-group-item">&lt;model&gt; - идентификатор модели</li>
	            <li class="list-group-item">&lt;bydjet&gt; - идентификатор суммы бюджета</li>
	            <li class="list-group-item">&lt;procent&gt; - идентификатор суммы скидки</li>
	            <li class="list-group-item">&lt;vin&gt; - vin машины</li>
	            <li class="list-group-item">&lt;nomen&gt; - номенклатура</li>
	            <li class="list-group-item">&lt;promo&gt; - промо-код</li>
        	</ul>
		</div>

		<div class="col-8">
			<!--BEGIN STATUS-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Заголовок виджета</span>
				</div>
				{{Form::text(
					'title',
					isset($complect)?$complect->name:'',
					['class'=>'form-control']
				)}}
			</div>
			<!--END STATUS-->

			<!--BEGIN STATUS-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Офер виджета</span>
				</div>
				{{Form::text(
					'offer',
					isset($complect)?$complect->name:'',
					['class'=>'form-control']
				)}}
			</div>
			<!--END STATUS-->

			<!--BEGIN STATUS-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Описание виджета</span>
				</div>
				{{Form::textarea(
					'text',
					isset($complect)?$complect->name:'',
					['class'=>'form-control']
				)}}
			</div>
			<!--END STATUS-->
		</div>
	</div>

	@include('admin.form.create.control')

	{{Form::close()}}

</div>

@endsection