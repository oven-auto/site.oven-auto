<div class="container">
	<div class="row">
		<div class="col">
			<div class="alpha-back">
				<img src="{{asset('storage/'.$complect->mark->alpha)}}">
			</div>
			<div class="text-center color-name mb-3">
				Код цвета				
			</div>
			<input type="hidden" name="color_id" value="">
			<div class="text-center">
				@isset($complect->mark->colors)
					@foreach($complect->mark->colors as $itemColor)
						<span 
							class="car-color" 
							data-color="{{$itemColor->color->web}}"
							data-id="{{$itemColor->color->id}}"
							data-code="{{$itemColor->color->code}}"
						>
						</span>
					@endforeach
				@endisset
			</div>
		</div>
		<div class="col">
			<div class="h4">Опции</div>
		</div>
	</div>
</div>