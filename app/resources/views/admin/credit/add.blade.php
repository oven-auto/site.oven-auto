@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col">
				<div class="h2">
					{{isset($credit)?'Изменить: '.$credit->name:'Новый кредит'}}
				</div>
			</div>
		</div>
	{{Form::open([
		'url'=>isset($credit)?route('credits.update',$credit):route('credits.store'),
		'method'=>isset($credit)?'PUT':'POST',
		'files'=>true
	])}}
		<div class="row">
			<div class="col-4">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Начало</span>
					</div>
					{{Form::date('begin_date',isset($credit)?$credit->begin_date:'',['class'=>'form-control'])}}
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Название</span>
					</div>
					{{Form::text('name',isset($credit)?$credit->name:'',['class'=>'form-control','placeholder'=>'Название'])}}
				</div>

				

				<div class="input-group mb-3 range-block">
					<div class="input-group-prepend">
						<span class="input-group-text">Cтавка: <span class="range-value">{{isset($credit->rate)?$credit->rate:0}}</span>%</span>
					</div>
					{{Form::range('rate',isset($credit->rate)?$credit->rate:0,
						['class'=>'form-control','min'=>0,'max'=>100,'step'=>0.5]
					)}}
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Платеж(руб.)</span>
					</div>
					{{Form::text('pay',isset($credit)?$credit->pay:'',['class'=>'form-control','placeholder'=>'Платеж'])}}
				</div>

				<div class="input-group mb-3">
					<div class="">
						@isset($credit)
							<img src="{{asset('storage/'.$credit->banner)}}">
						@endisset
					</div>

					<div class="input-group-prepend">
						<span class="input-group-text">Банер</span>
					</div>
					<div class="custom-file">
						{{Form::file('banner',['class'=>'custom-file-input'])}}
					    <label class="custom-file-label" for="validatedCustomFile">Укажите фаил</label>
					</div>
					
				</div>

				
			</div>

			<div class="col-4">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Конец</span>
					</div>
					{{Form::date('end_date',isset($credit)?$credit->end_date:'',['class'=>'form-control'])}}
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Срок кредита</span>
					</div>
					{{Form::select('period',[1=>1,2=>2,3=>3,4=>4,5=>5],isset($credit)?$credit->period:'',['class'=>'form-control','placeholder'=>'Срок кредита'])}}
				</div>

				

				<div class="input-group mb-3 range-block">
					<div class="input-group-prepend">
						<span class="input-group-text">Первоначальный взнос: <span class="range-value">{{isset($credit->contribution)?$credit->contribution:0}}</span>%</span>
					</div>
					{{Form::range('contribution',isset($credit->contribution)?$credit->contribution:0,
						['class'=>'form-control','min'=>0,'max'=>100,'step'=>0.5]
					)}}
				</div>
			</div>

			<div class="col-4">
				@include('admin.getters.mark-select',['data'=>isset($credit) ? $credit->models->pluck('mark_id') : collect()])
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="input-group mb-3 range-block">
					<div class="input-group-prepend">
						<span class="input-group-text">Дисклэймер</span>
					</div>
					{{Form::textarea('disclaimer',isset($credit->disclaimer)?$credit->disclaimer:'',
						['class'=>'form-control']
					)}}
				</div>
			</div>
		</div>

		
			@include('admin.form.create.control')
		
	{{Form::close()}}
</div>
@endsection