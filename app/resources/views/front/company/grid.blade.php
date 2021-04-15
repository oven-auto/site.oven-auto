@if(isset($companies) && $companies->count())
<div class="container py-3">
	<div class="row">
		<div class="col-8 company-content">
			@foreach($companies as $itemSection)
			<div class="row"> 
				@foreach($itemSection as $itemCompany)
					
					@if($loop->first)
					<div class="col-12 pb-4" id="section{{$itemCompany->section->id}}">
						<div class="block-title">
							{{$itemCompany->section->name}}
						</div> 
					</div>
					@endif

					@if($itemCompany->parameters)
					<div class="col-6 mb-4"> 
						<div 
							class="border p-3 company-block {{($itemCompany->controll->immortal) ? 'company-immortal' : 'company-mortal'}} {{($itemCompany->controll->main) ? 'company-main' : ''}}" 
							data-company-section="{{$itemCompany->section_id}}" 
							data-company-id="{{$itemCompany->id}}"
							{{$itemCompany->parameters->setData($car)}}
						>
							<div class="company-title rn-bold">
								{{$itemCompany->controll->title}}
							</div>

							<div class="company-text">
								{!!$itemCompany->controll->text!!}
							</div>

							<div class="company-footer p-3">
								<div class="company-section pt-3">
									{{$itemCompany->section->name}}
								</div>

								<div class="company-offer">
									{!!$itemCompany->controll->offer!!}
								</div>

								<div class="company-checkbox border m-3">
									
								</div>

								<input type="checkbox" value="{{$itemCompany->id}}" name="company_ids[]">
							</div>
						</div>
					</div>
					@endif
				@endforeach
			</div>
			@endforeach
		</div>

		<div class="col-4" style="position: relative;">
			<div class="block-title pb-4">
				Калькулятор выгод
			</div>
			<div class=" company-calculator">
				<div class="border p-3">
					<div class="block-title text-center">
						Ваш чек*
					</div>

					<div class="px-3">
						<div class="row border-bottom-dotted">
							<div class="col-6 px-0">Комплектация:</div>
							<div class="col-6 px-0 text-right base-price" data-base="{{$car->complect->price}}">{{number_format($car->complect->price,0,'',' ').' руб.'}}</div>
						</div>

						<div class="row border-bottom-dotted">
							<div class="col-6 px-0">Опции:</div>
							<div class="col-6 px-0 text-right packs-price" 
									data-packs="{{
										$car->packs->sum(function($pack){
											return $pack->pack->price;
										})
									}}"
							>
								{{
									number_format($car->packs->sum(function($pack){
										return $pack->pack->price;
									}),0,'',' ').' руб.'
								}}
							</div>
						</div>

						<div class="row border-bottom-dotted">
							<div class="col-6 px-0">Аксессуары:</div>
							<div class="col-6 px-0 text-right option-price" data-option="{{$car->option_price}}">{{number_format($car->option_price,0,'',' ').' руб.'}}</div>
						</div>
					</div>

					<div class="company-description px-3">
						<div class="row">
							<div class="col px-0 pt-3 text-right block-title">
								{{number_format($car->total_price,0,'',' ')}} руб.
							</div>
						</div>
					</div>

					<div class="pt-3">
						@if(!isset($button))
							@include('front.buttons.sale_btn')
						@else
							@include('front.buttons.'.$button)
						@endif
					</div>
				</div>

				<div class="mt-3 px-3">
					* - не является публичной офертой
				</div>
			</div>
		</div>
	</div>
</div>
@endif