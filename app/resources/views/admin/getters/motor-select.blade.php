@php($needArr = [])
@isset($data)
	@php($needArr = $data)
@endisset

<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text">Мотор</span>
	</div>

	{{Form::select('motor_id',$motors,$needArr,['class'=>'form-control', 'required'=>'required','placeholder'=>'Мотор'])}}
</div>

@error('motor_id')						
    <div class="alert alert-danger">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{ $message }}
	</div>
@enderror