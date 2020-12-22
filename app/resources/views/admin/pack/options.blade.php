@error('options[]')						
    <div class="alert alert-danger">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{ $message }}
	</div>
@enderror


@foreach($options as $itemGroup)
	<div class="row">
	@foreach($itemGroup->chunk(ceil($itemGroup->count()/3)) as $itemChunk)
		@if($loop->first)
			<div class="col-12 h4 my-3"> {{$itemChunk->first()->type->name}} </div>
		@endif
		<div class="col-4">
		@foreach($itemChunk as $itemOption)			
			
			<label title="{{$itemOption->name}}" data-toggle="tooltip" data-placement="right" class="d-flex align-items-center py-1 pl-1 m-0" style="overflow-x: hidden;width: 100%;white-space: nowrap;">
				
				<input 

					type="checkbox" 
					name="option_ids[]" 
					value="{{$itemOption->id}}" 
					class="mr-2" 
					
				>

				{{$itemOption->name}}
				
			</label>			

		@endforeach
		</div>
	@endforeach
	</div>
@endforeach
