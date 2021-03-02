<div class="container">
	<div class="row">


		<div class="col-4">
			@if(isset($complect) && $complect->modelcolors->count() && $complect->complectcolors->count())
			<div class="alpha-back">
			
				@foreach($complect->modelcolors as $itemModelColor)
					@if($complect->complectcolors->contains('color_id',$itemModelColor->color_id))
						<img class="d-none" src="{{asset('storage/'.$itemModelColor->img)}}" data-color-id="{{$itemModelColor->color_id}}">
					@endif
				@endforeach
			
			</div>
			<div class="text-center color-name mb-3">
				Код цвета				
			</div>
			<input type="hidden" name="color_id" value="{{isset($car)?$car->color_id:''}}">
			<div class="text-center">
				@foreach($complect->modelcolors as $itemModelColor)
					@if($complect->complectcolors->contains('color_id',$itemModelColor->color_id))

						<span 
							class="car-color {{(isset($car) && $car->color_id==$itemModelColor->color->id) ? 'active' : ''}}" 
							data-color="{{$itemModelColor->color->web}}"
							data-id="{{$itemModelColor->color->id}}"
							data-code="{{$itemModelColor->color->code}}"
							data-url = "{{route('ajax.get.complect.color.pack')}}"
							data-complect-color = "{{$complect->complectcolors->where('color_id',$itemModelColor->color_id)->first()->id}}"
						>
						</span>
					@endif
				@endforeach
			</div>
			@else
				<div>
					У данной комплектации не указаны используемые цвета
				</div>
			@endif
		</div>

		<div class="col">
			<div class="container">
				<div class="row mt-3 py-1 mb-3" style="">
					<div class="col h4 py-0 my-0" >
						{{$complect->brand->name}} {{$complect->mark->name}} {{$complect->name}}
					</div>

					<div class="col text-right h4 py-0 my-0" >
						<span class="car-price" data-price="{{$complect->price}}">{{$complect->formatPrice}}</span>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<table class="" style="width: 100%;">
							<tr class="h5">
								<td>Исполнение</td>
								<td>{{$complect->code}}</td>
							</tr>
							<tr>
								<td>Двигатель</td>
								<td>{{$complect->motor->type->name}} {{$complect->motor->valve}} клапанный</td>
							</tr>
							<tr>
								<td>Рабочий объем</td>
								<td>{{$complect->motor->size}} ({{$complect->motor->power}}л.с.)</td>
							</tr>
							<tr>
								<td>Трансмиссия</td>
								<td>{{$complect->motor->transmission->name}} </td>
							</tr>
							<tr>
								<td>Привод</td>
								<td>{{$complect->motor->driver->name}} </td>
							</tr>
						</table>
					</div>

					<div class="col">
						<div class="h5 pt-1" >Опции</div>
						@foreach($complect->packs as $itemPack)
							<div class="mb-3 pb-3 border-bottom">
								<div class="">{{$itemPack->pack->name}}</div>
								<div style="font-size: 10px;">
									@isset($itemPack->pack->options)
										@foreach($itemPack->pack->options as $itemOption)
											@if(!$loop->first)
												|
											@endif
											{{$itemOption->option->name}}
										@endforeach
									@endisset
								</div>
								<div class="row">
									<div class="col">
										<label class="checkbox">
											<input
												class="{{($itemPack->pack->colored)? 'colored-pack' : ''}} car-pack {{(isset($car) && $car->packs->contains('pack_id',$itemPack->pack->id))?'checked':''}}"
												type="checkbox" 
												name="pack_ids[]" 
												value="{{$itemPack->pack->id}}" 
												data-price="{{$itemPack->pack->price}}"
												data-pack-id="{{$itemPack->pack->id}}"
											>
											<div class="checkbox__text"></div>
										</label>
									</div>
									<div class="col">{{$itemPack->pack->code}}</div>
									<div class="col">{{$itemPack->pack->formatPrice}}</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>