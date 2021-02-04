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
		@if(isset($company))

		@else
			@include('admin.company.cars_in')
		@endif
	</div>

	<div class="row">
		<div class="col h4">
			Исключающие условия
		</div>
		@if(isset($company))

		@else
			@include('admin.company.cars_out')
		@endif
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
					'section',
					[],
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
					\App\Models\Company::getScenarioList(),
					'',
					['placeholder'=>'Сценарий','class'=>'form-control']
				)}}
			</div>
			<!--END STATUS-->
		</div>
	</div>

	<div class="row callculate-company">

	</div>

	@include('admin.form.create.control')

	{{Form::close()}}

</div>

@endsection