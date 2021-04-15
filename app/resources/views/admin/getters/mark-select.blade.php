@php($needArr = collect())
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
			<span class="input-group-text">Модели</span>
		</div>
		<div class="row">
		@foreach($marks as $markId=>$markName)
		
			<div class="col-12">
				@php ($checked = ( $needArr->contains($markId)) ? 'checked' : '')
				
				<label class="checkbox">
					<input style="padding-top: 10px;margin-top: 10px;" type="checkbox" name="mark_ids[]" value="{{$markId}}" {{$checked}} >
					<div class="checkbox__text" style="">{{$markName}}</div>
				</label>
			</div>
		
		@endforeach
		</div>
		<!--Form::select('mark_ids[]',isset($marks)?$marks:[],$needArr,['class'=>'form-control' , 'required'=>'required','multiple', 'size'=>count($marks),'data-url-pack'=>route('ajax.get.pack')])-->
	</div>


@endif