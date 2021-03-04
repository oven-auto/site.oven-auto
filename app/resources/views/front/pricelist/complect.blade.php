	
	<div class="row py-2 mb-2" style="background: #f5f5f5">
		<div class="container " >
			<div class="row">
				<div class="col">
				@if(isset($complect) && $complect->has('motor'))
					<div class="rn-bold">Исполнение {{$complect->code}}</div>
					<div>Двигатель {{$complect->motor->type->name}} {{$complect->motor->valve}} клапанный</div>
					<div>Рабочий объем {{$complect->motor->size/1000}}л. ({{$complect->motor->power}} л.с.)</div>
					<div>КПП {{$complect->motor->transmission->full_name}}</div>
					<div>Привод {{$complect->motor->driver->full_name}}</div>
				@endif

				@if(isset($complect->options))
					<div class="pt-2 rn-bold">Комплектация {{$complect->name}}</div>
					@foreach($complect->options->slice(0,ceil($complect->options->count()/2)-1) as $key=>$itemOption)
						<div>
							{{$itemOption->option->name}}
						</div>
					@endforeach
				@endif
				</div>

				<div class="col">
					@if(isset($complect->options))
						<div class="pack-line"> 
						@foreach($complect->options->slice(ceil($complect->options->count()/2)-1) as $key=>$itemOption)
							<div>
								{{$itemOption->option->name}}
							</div>
						@endforeach
						</div>
						<div class="pack-price text-right">
							{{$complect->format_price}}
						</div>
					@endif
				</div>

				<div class="col">
					@if(isset($complect->packs))
						<div class="rn-bold">Опционное оборудование</div>
						@foreach($complect->packs as $itemPack)
							<div class="pb-2">
								<div>{{$itemPack->pack->name}}</div>
								@if(isset($itemPack->pack->options))
									<div class="pack-line">
									@foreach($itemPack->pack->options as $itemOption)
										<div>{{$itemOption->option->name}}</div>
									@endforeach
									</div>
									<div class="row">
										<div class="col-6">{{$itemPack->pack->code}}</div>
										<div class="col-6 pack-price text-right">{{$itemPack->pack->format_price}}</div>
									</div>
								@endif
							</div>
						@endforeach
					@endif
				</div>
			</div>

			<div class="row py-2">
				<div class="col">
					<button class="btn btn-renault btn-block" type="button">Задать вопрос</button>
				</div>
				<div class="col">
					<button class="btn btn-renault btn-block" type="button">Пройти тест драйв</button>
				</div>
				<div class="col">
					<a class="btn btn-dark btn-block">Перейти в конфигуратор</a>
				</div>
			</div>
		</div>
	</div>
