@error('options[]')						
    <div class="alert alert-danger">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{ $message }}
	</div>
@enderror

@foreach($options as $itemOption)
	<div class="row">
			<div class="col-2">
				{{$itemOption->name}}
			</div>
	</div>
@endforeach