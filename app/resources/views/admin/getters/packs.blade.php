
<div class="h4">Пакеты опции</div>
@if(isset($packs) && $packs->count())
<table class="table">
		<tr class="thead-dark">
			<th style="width: 50px;"></th>
			<th>Модель</th>
			<th>Название</th>
			<th>Код</th>
			<th>Цена</th>
			<th>Состав</th>
		</tr>
		@foreach($packs as $itemPack)
		<tr>
			<td>
				@php ($checked = (isset($data) && $data->contains('pack_id',$itemPack->id))?'checked':'')
				<!--Form::checkbox('pack_ids[]',$itemPack->id,'',['class'=>'form-control',$checked])-->

				<label class="checkbox">
					<input type="checkbox" name="pack_ids[]" value="{{$itemPack->id}}" {{$checked}} >
					<div class="checkbox__text"></div>
				</label>
			</td>
			<td>
				@isset($itemPack->marks)
					@foreach($itemPack->marks as $itemMark)							
						{{$itemMark->mark->name}}
					@endforeach
				@endisset
			</td>
			<td>{{$itemPack->name}}</td>
			<td>{{$itemPack->code}}</td>
			<td>{{$itemPack->price}}</td>
			<td>
				@isset($itemPack->options)
					@foreach($itemPack->options as $itemOption)
						@if(! $loop->first)
							|
						@endif
						{{$itemOption->option->name}}
					@endforeach
				@endisset
			</td>
		</tr>
		@endforeach
</table>	
@endif