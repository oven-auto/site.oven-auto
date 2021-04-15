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
					<a href="{{route('credits.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
					<a href="{{route('credits.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
				</div>
			</div>
		</div>

		
		<div class="row pt-3">
			<table class="table complect-table">
				<tr class="thead-dark">
					<th></th>
					<th>Название</th>
					<th>Модели</th>
					<th>Начало</th>
					<th>Конец</th>
					<th>Платеж</th>
					<th>Ставка</th>
					<th>Перв.взнос</th>
					<th>Период</th>
				</tr>

				@foreach($credits as $itemCredit)
				<tr>
					<td style="width: 70px;">
						<div class="btn-group btn-block">
							<a href="{{route('credits.edit',$itemCredit)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
							<button type="button" class="btn btn-danger fa fa-close"></button>
						</div>
					</td>
					<td>{{$itemCredit->name}}</td>
					<td>
						@if($itemCredit->models->count())
							@foreach($itemCredit->models as $itemModel)
								{{$itemModel->model->name}}<br/>
							@endforeach
						@endif
					</td>
					<td>
						{{$itemCredit->begin_date}}
					</td>

					<td>
						{{$itemCredit->end_date}}
					</td>

					<td>
						{{number_format($itemCredit->pay,0,'',' ')}}руб.
					</td>

					<td>
						{{$itemCredit->rate}}%
					</td>

					<td>
						{{$itemCredit->contribution}}%
					</td>

					<td>
						{{$itemCredit->period}} 
						@if($itemCredit->period==1)
							год
						@elseif($itemCredit->period==5)
							лет
						@else
							года
						@endif
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection