<div class="container">
	<div class="row">
		<div class="col">
			 <div class="h4">
			 	Палитра цветов: {{$brand->name}}
			 </div>
		</div>
	</div>

	@if($colors->count())
	<div class="row text-center">
		@foreach($colors as $itemColor)
		<div class="col-2">
			<div class="border p-2 my-2 pb-3 rounded color-check" data-color-id="{{$itemColor->id}}">
				{{$itemColor->code}}
				<div class="color-pic" data-color="{{$itemColor->web}}"></div>
			</div>
		</div>
		@endforeach
	</div>
	@endif
</div>