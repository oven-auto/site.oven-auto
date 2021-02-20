@php($needArr = [])
@isset($data)
	@php($needArr = $data)
@endisset

<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text">Комплектация</span>
	</div>

	{{Form::select('complect_id',isset($complects)?$complects:[],$needArr,[
		'class'=>'form-control' , 
		'required'=>'required', 
		'data-url-pack'=>route('ajax.get.complect.pack'),
		'data-url-color'=>route('ajax.get.complect.color'),
		'data-url-carview'=>route('ajax.get.car.view'),
		'placeholder'=>'Комплектация'
	])}}
</div>

@error('complect_id')						
    <div class="alert alert-danger">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{ $message }}
	</div>
@enderror