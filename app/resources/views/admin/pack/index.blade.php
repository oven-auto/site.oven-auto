@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="h2 m-0">
					Список опций
				</div>
			</div>
			<div class="col text-right">
				<div class="btn-group">
					<a href="{{route('packs.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
					<a href="{{route('packs.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
				</div>
			</div>
		</div>

		<div class="row pt-3">
			<table class="table">
				<tr class="thead-dark">
					<th></th>
					<th>Название</th>
					<th>Код</th>
					<th>Цена</th>
					<th style="min-width: 50%;">Состав</th>
					<th>Бренд</th>
					<th>Допуск</th>
				</tr>

				<tr>
					{{Form::open([
						'url'=>route('packs.index'),
						'method'=>'GET'
					])}}
					<td>
						<button type="submit" class="btn-primary btn btn-block" style="width: 100px;">
							<i class="fa fa-search"></i>
							Поиск
						</button>
					</td>

					<td>
						<!--NAME BEGIN-->
						<div class="input-group ">
							
							{{Form::text('name',request()->name,['placeholder'=>'Название','class'=>'form-control' ])}}

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
					</td>

					<td>
						<!--CODE BEGIN-->
						<div class="input-group ">
							
							{{Form::text('code',request()->code,['placeholder'=>'Код','class'=>'form-control' ])}}

							@error('code')
							    <div class="alert alert-danger">
							    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									{{ $message }}
								</div>
							@enderror
						</div>
						<!--CODE END-->
					</td>

					<td>
						<!--PRICE BEGIN-->
						<div class="input-group ">
							
							{{Form::text('price',request()->price,['placeholder'=>'Цена','class'=>'form-control' ])}}

							@error('price')
							    <div class="alert alert-danger">
							    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									{{ $message }}
								</div>
							@enderror
						</div>
						<!--PRICE END-->
					</td>

					<td>
						{{Form::hidden('option_id',request()->option_id,['class'=>'form-control option-filter'])}}
						<button type="button" class="btn btn-secondary" id="pack-option-button" data-url="{{route('ajax.get.option.all')}}">Выбрать оборудование</button>
						@error('option_id')
						    <div class="alert alert-danger">
						    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								{{ $message }}
							</div>
						@enderror
					</td>

					<td>
						{{Form::select('brand_id',$brands,request()->brand_id,['class'=>'form-control','placeholder'=>'Бренд'])}}
					</td>

					<td>
						<!--MARK BEGIN-->
						<div class="input-group ">
							
							{{Form::select('mark_id',$marks,request()->mark_id,['placeholder'=>'Модели','class'=>'form-control'])}}

							@error('mark_id')
							    <div class="alert alert-danger">
							    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									{{ $message }}
								</div>
							@enderror
						</div>
						<!--MARK END-->
					</td>
					{{Form::close()}}
				</tr>

				@foreach($packs as $itemPack)
				<tr>
					<td style="width: 100px;">
						<div class="btn-group btn-block">
							<a href="{{route('packs.edit',$itemPack)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
							<button class="btn btn-danger fa fa-close " type="button"></button>
						</div>
					</td>
					<td>{{$itemPack->name}}</td>
					<td>{{$itemPack->code}}</td>
					<td>{{$itemPack->price}}</td>
					<td>
						@isset($itemPack->options)
							@foreach($itemPack->options as $itemOption)
								@if( ! $loop->first )
									|
								@endif
								{{$itemOption->option->name}}
							@endforeach
						@endisset
					</td>
					<td>{{$itemPack->brand->name}}</td>
					<td>
						@isset($itemPack->marks)
							@foreach($itemPack->marks as $itemMark)							
								{{$itemMark->mark->name}}
							@endforeach
						@endisset
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection