@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2">
				Список оборудования
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<table class="table">
				<tr>
					<th></th>
					<th>Название</th>
					<th>Раздел</th>
					<th>Фильтр</th>
					<th>Бренд</th>
				</tr>
				@foreach($options as $itemOption)
					<tr>
						<td>
							<div class="btn-group">
								<a href="{{route('options.edit',$itemOption)}}" class="btn btn-success">Открыть</a>
								<button class="btn btn-danger" type="button">Удалить</button>
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
	</div>
</div>
@endsection