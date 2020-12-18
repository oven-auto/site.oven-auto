@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<table class="table">
				<tr>
					<th><a href="{{route('properties.create')}}" class="btn btn-success">Добавить</a></th>
					<th>Название</th>
				</tr>
				@foreach($properties as $itemProperty)
					<tr>
						<td>
							<div class="btn-group">
								<a class="btn btn-primary" href="{{route('properties.edit',$itemProperty)}}">Открыть</a>
								<button type="button" class="btn btn-danger">Удалить</button>
							</div>
						</td>
						<td>
							{{$itemProperty->name}}
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection