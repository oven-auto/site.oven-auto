	
	<div class="row py-2 mb-2" style="background: #f5f5f5">
		<div class="container " >
			<div class="row">
				<div class="col">
				@if(isset($complect) && $complect->has('motor'))
					@include('front.pricelist.complect_motor',['complect'=>$complect])
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
									<div class="row mb-2">
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
					@include('front.buttons.question_btn')
				</div>
				<div class="col">
					@include('front.buttons.modal_test_btn')
				</div>
				<div class="col">
					@include('front.buttons.conf_btn',['link'=>$complect->id])
				</div>
			</div>
		</div>
	</div>
