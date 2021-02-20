<table class="table">
	<tr class="thead-dark">
		<th></th>
		<th>Раздел</th>
		<th>Описание</th>
		<th>Сценарий</th>
		<th>Вкл/Искл</th>
		<th>Статус</th>
		<th>Начало</th>
		<th>Конец</th>
	</tr>

	@foreach($companies as $itemCompany)
	<tr>
		<td style="width: 80px;">
			<div class="btn-group btn-block">
				<a href="{{route('companies.edit',$itemCompany)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
				<button type="button" class="btn btn-danger fa fa-close"></button>
			</div>
		</td>
		
		<td style="font-size: 12px;">
			{{$itemCompany->section->name}}
		</td>
		
		<td>
			<div style="font-size: 12px;"><b>{{$itemCompany->controll->name}}</b></div>
			<div style="font-size: 10px;">{{$itemCompany->controll->text}}</div>
		</td>
		
		<td style="font-size: 12px;">
			{{$itemCompany->scenario->name}}
		</td>

		<td style="font-size: 10px;">
			<div style="overflow-x:hidden;width: inherit;">
				@if(isset($itemCompany->conditions) && $itemCompany->conditions->count())
					@foreach($itemCompany->conditions->SortByDesc('type') as $itemCondition)
					<div style="white-space: nowrap; color: {{ ($itemCondition->type) ? 'green' : 'red' }}">
						{{$itemCondition->model->name}}
						{{$itemCondition->complect->fullName }}
						{{$itemCondition->vin}}
						{{$itemCondition->transmission->name}}
						{{$itemCondition->delivery_id}}
						{{$itemCondition->min_price}}
						{{$itemCondition->max_price}}
						{{$itemCondition->year}}
					</div>
					@endforeach
				@endif
			</div>
		</td>

		<td style="font-size: 12px;width: 70px;">
			{{($itemCompany->status) ? "Активна" : "Не активна"}}
		</td>

		<td style="font-size: 12px;width: 80px;">
			{{$itemCompany->begin_date}}
		</td>

		<td style="font-size: 12px;width: 80px;">
			{{$itemCompany->end_date}}
		</td>

	</tr>
	@endforeach
</table>