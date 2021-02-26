@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2 m-0">
				Список оборудования
			</div>
		</div>
		<div class="col text-right">
			<div class="btn-group">
				<a href="{{route('options.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
				<a href="{{route('options.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
			</div>
		</div>
	</div>
	
	{{Form::open([
		'url'=>route('options.index'),
		'method'=>'GET'
	])}}



	<div class="row pt-3">
			<table class="table">
				<tr class="thead-dark">
					<th></th>
					<th>Название</th>
					<th>Раздел</th>
					<th>Фильтр</th>
					<th>Бренд</th>
				</tr>

				<tr>
					<td>
						<button type="submit" class="btn-primary btn btn-block" style="width: 90px;">
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
						<!--TYPE BEGIN-->
						<div class="input-group">
							
							{{Form::select('type_id',$types,request()->type_id,['placeholder'=>'Укажите раздел','class'=>'form-control'])}}

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
					</td>

					<td>
						<!--FILTER BEGIN-->
						<div class="input-group">
							
							{{Form::select('filter_id',$filters,request()->filter_id,['placeholder'=>'Укажите фильтр','class'=>'form-control'])}}

							@error('type_id')
							    <div class="alert alert-danger">
							    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									{{ $message }}
								</div>
							@enderror
						</div>
						<!--FILTER END-->
					</td>

					<td>
						<!--BRAND BEGIN-->
						<div class="input-group ">
							{{Form::select('brand_id',$brands,request()->brand_id,['placeholder'=>'Укажите бренд','class'=>'form-control'])}}

							@error('brand_id')
							    <div class="alert alert-danger">
							    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									{{ $message }}
								</div>
							@enderror
						</div>
						<!--BRAND END-->
					</td>
				</tr>
				@foreach($options as $itemOption)
					<tr>
						<td>
							<div class="btn-group btn-block">
								<a href="{{route('options.edit',$itemOption)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
								<button class="btn btn-danger fa fa-close " type="button"></button>
							</div>
						</td>
						<td>{{$itemOption->name}}</td>
						<td>{{$itemOption->type->name}}</td>
						<td>{{$itemOption->filter->name}}</td>
						<td>
							@isset($itemOption->brands)
								@foreach($itemOption->brands as $itemBrand)
									{{$itemBrand->brand->name}}
								@endforeach
							@endisset
						</td>
					</tr>
				@endforeach
			</table>
	</div>
	{{Form::close()}}

	<div class="row">
		<div class="col"> 
			{{$options->appends(request()->query())->links()}}
		</div>
	</div>
</div>
@endsection