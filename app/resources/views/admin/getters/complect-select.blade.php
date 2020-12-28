@php($needArr = [])
@isset($data)
	@php($needArr = $data)
@endisset

<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text">Модель</span>
	</div>

	{{Form::select('complect_id',$complects,$needArr,[
		'class'=>'form-control' , 
		'required'=>'required', 
		'data-url-pack'=>route('ajax.get.pack'),
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