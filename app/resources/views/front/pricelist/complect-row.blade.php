<div class="row">
	<div 
		class="col-12 model-complect-control py-2 {{($loop->last) ? '' : 'border-bottom'}}" 
		data-url-complect="{{route('front.ajax.get.complect',$complect->id)}}"
		data-url-cars="{{route('front.ajax.get.cars',['complect_id'=>$complect->id])}}"
		data-condition="0"
	>
		<div class="row align-items-center"> 
			<div class="col-7"> 
				{{$complect->frontName}}
				<span class="model-complect-code">{{$complect->code}}</span>
			</div>

			<div class="col-2 text-right">
				@if($complect->carCount)
				<span class="model-complect-car-count text-center" style="">
					{{$complect->carCount}}
				</span>
				@endif
			</div>

			<div class="col-3 text-right align-items-center"> 
				от {{$complect->format_price}}
				<span class="model-complect-open fa fa-angle-down ml-3"></span>
			</div>
		</div>
	</div>
	<div class="col-12 model-complect-content d-none ">
		<div class="model-complect-cars cars-list pt-3 pb-3">

		</div>

		<div class="model-complect-description">

		</div>
	</div>
</div>