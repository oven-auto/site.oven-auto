@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="h2 m-0">
					Палитра цветов
				</div>
			</div>
			<div class="col text-right">
				<div class="btn-group">
					<a href="{{route('colors.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
					<a href="{{route('colors.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
				</div>
			</div>
		</div>
		{{Form::open([
			'url'=>route('colors.index'),
			'method'=>'GET'
		])}}
		<div class="row pt-3">
				<table class="table">
					<tr class="thead-dark">
						<th style="width: 120px;">
							
						</th>
						<th>Название</th>
						<th>Код</th>
						<th>Бренд</th>
						<th>Вид</th>
					</tr> 

					<tr>
						<td>
							<button type="submit" class="btn-primary btn btn-block" >
								<i class="fa fa-search"></i>
								Поиск
							</button>
						</td>

						<td>{{Form::text('name',request()->name,['class'=>'form-control','placeholder'=>'Название'])}}</td>
						<td>{{Form::text('code',request()->code,['class'=>'form-control','placeholder'=>'Код'])}}</td>
						<td>{{Form::select('brand_id',$brands,request()->brand_id,['class'=>'form-control','placeholder'=>'Укажите бренд'])}}</td>
						<td></td>
					</tr>

					@if($colors->count())
						@foreach($colors as $itemColor)
							<tr>
								<td>
									<div class="btn-group btn-block">
										<a href="{{route('colors.edit',$itemColor)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
										<button type="button" class="btn btn-danger fa fa-close"></button>
									</div>
								</td>

								<td>{{$itemColor->name}}</td>
								<td>{{$itemColor->code}}</td>
								<td>{{$itemColor->brand->name}}</td>
								<td>
									<div class="color-pic" data-color="{{$itemColor->web}}"> 
										
									</div>
								</td>
							</tr>
						@endforeach
					@endif
				</table>
		</div>
		{{Form::close()}}
	</div>
@endsection