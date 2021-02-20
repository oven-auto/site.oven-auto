@php($needArr = [])
@isset($data)
	@php($needArr = $data)
@endisset

@if(isset($type) && $type=='single')

	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Модели</span>
		</div>

		{{Form::select('mark_id',isset($marks)?$marks:[],$needArr,['class'=>'form-control' , 'required'=>'required', 'data-url-pack'=>route('ajax.get.pack'),'data-url-complect'=>route('ajax.get.complect'),'placeholder'=>'Модель'])}}
	</div>

	@error('mark_ids[]')						
	    <div class="alert alert-danger">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{ $message }}
		</div>
	@enderror

@else

	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Модели2</span>
		</div>

		{{Form::select('mark_ids[]',isset($marks)?$marks:[],$needArr,['class'=>'form-control' , 'required'=>'required','multiple', 'size'=>count($marks),'data-url-pack'=>route('ajax.get.pack')])}}
	</div>

	@error('mark_ids[]')						
	    <div class="alert alert-danger">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{ $message }}
		</div>
	@enderror

@endif