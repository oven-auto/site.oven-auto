<div class="row">
	<div 
		class="col-12 model-complect-control py-2 {{($loop->last) ? '' : 'border-bottom'}}" 
		data-url-complect="{{route('front.ajax.get.complect',$complect->id)}}"
		data-url-cars="{{route('front.ajax.get.cars',['complect_id'=>$complect->id])}}"
		data-condition="0"
	>
		<div class="row"> 
			<div class="col-7"> 
				{{$complect->frontName}}
				<span class="model-complect-code">{{$complect->code}}</span>
			</div>

			<div class="col-1">
				@if($complect->carCount)
				<span class="model-complect-car-count badge rounded-pill">
					есть {{$complect->carCount}} а/м
				</span>
				@endif
			</div>

			<div class="col-4 text-right"> 
				от {{$complect->format_price}}
				<span class="model-complect-open fa fa-angle-down ml-3"></span>
			</div>
		</div>
	</div>
	<div class="col-12 model-complect-content d-none ">
		<div class="model-complect-cars">

		</div>

		<div class="model-complect-description">

		</div>
	</div>
</div>