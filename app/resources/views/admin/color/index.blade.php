@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<table class="table">
				<tr>
					<th>
						<a href="{{route('colors.create')}}" class="btn btn-success">Добавить</a>
					</th>
					<th></th>
				</tr> 
				@if($colors->count())
					@foreach($colors as $itemColor)
						<tr>
							<td>
								<div class="btn-group">
									<a href="{{route('colors.edit',$itemColor)}}" class="btn btn-primary">Открыть</a>
									<button type="button" class="btn btn-danger">Удалить</button>
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
	</div>
@endsection