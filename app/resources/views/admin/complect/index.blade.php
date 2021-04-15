@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="h2 m-0">
					Список комплектаций
				</div>
			</div>
			<div class="col text-right">
				<div class="btn-group">
					<a href="{{route('complects.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
					<a href="{{route('complects.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
				</div>
			</div>
		</div>

		
		<div class="row pt-3">
			<table class="table complect-table">
				<tr class="thead-dark">
					<th style=""></th>
					<th style="width: 100px;">Код</th>
					<th>Модель</th>
					<th>Название</th>
					<th>Наличие</th>
					<th style="width: 150px;">Агрегат</th>
					<th style="width: 100px;">Оборуд. / <br/>Опции</th>
					<th style="width: 100px;">Цена</th>
					<th>Порядок</th>
					<th>Статус</th>
				</tr>
				{{Form::open([
					'url'=>route('complects.index'),
					'method'=>'GET'
				])}}

				<tr>
					<td>
						<button type="submit" class="btn-primary btn btn-block" style="width: 100px;">
							<i class="fa fa-search"></i>
							Поиск
						</button>
					</td>
					<td>{{Form::text('code',request()->code,['class'=>'form-control','placeholder'=>'Код'])}}</td>
					<td>{{Form::select('mark_id',$marks,request()->code,['class'=>'form-control','placeholder'=>'Модель'])}}</td>
					<td>{{Form::text('name',request()->name,['class'=>'form-control','placeholder'=>'Название'])}}</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>{{Form::select('status',$statuses,request()->status,['class'=>'form-control','placeholder'=>'Статус','style'=>'width:60px;padding-left:0px;'])}}</td>
				</tr>

				{{Form::close()}}


				@foreach($complects as $itemComplect)
					<tr>
						<td>
							<div class="btn-group btn-block">
								<a href="{{route('complects.edit',$itemComplect)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
								<button class="btn btn-danger fa fa-close"></button>
							</div>
						</td>
						<td>{{$itemComplect->code}}</td>
						<td>{{$itemComplect->brand->name}} {{$itemComplect->mark->name}}</td>
						<td>{{$itemComplect->name}}</td>
						<td>Наличие</td>
						<td>{{$itemComplect->motor->adminName}}</td>
						<td>
							{{isset($itemComplect->options) ? $itemComplect->options->count() : 0}} об.
							<br/>
							{{isset($itemComplect->packs) ? $itemComplect->packs->count() : 0}} пак.
						</td>
						<td>{{$itemComplect->formatPrice}}</td>
						<td>{{$itemComplect->sort}}</td>
						<td>
							{{Form::checkbox('complect-status','1',$itemComplect->status,['data-id'=>$itemComplect->id, 'data-url'=>route('ajax.complect.status',$itemComplect)])}}					
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection