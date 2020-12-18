<div class="container">
	<div class="row">
		<div class="col">
			 <div class="h4">
			 	Палитра цветов
			 </div>
		</div>
	</div>

	@if($colors->count())
	<div class="row">
		@foreach($colors as $itemColor)
		<div class="col-3">
			{{$itemColor->code}}
		</div>
		@endforeach
	</div>
	@endif
</div>