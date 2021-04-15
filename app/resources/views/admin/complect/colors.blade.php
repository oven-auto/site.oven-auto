<div class="row pt-3">
	<div class="col h4">
		Список цветов
	</div>
</div>


<div class="row"> 
	@if(isset($complect) && $complect->has('modelcolors'))
		@foreach($complect->modelcolors as $itemModelColor)
			<div class="col-3 text-center">
				<div class="">{{$itemModelColor->color->code}}</div>
				<div style="position: relative;">
					<img src="{{asset('storage/'.$itemModelColor->img)}}">
					{{Form::checkbox(
						'color_id['.$itemModelColor->color_id.']',
						$itemModelColor->color_id,
						($complect->complectcolors->contains('color_id',$itemModelColor->color_id))?'checked':'',
						['style'=>'']
					)}}
				</div>
				
				
				@php ($arrPackIds = [])
				@if($complect->has('complectcolors') && $complect->complectcolors->contains('color_id',$itemModelColor->color_id))
					@if($complect->complectcolors->where('color_id',$itemModelColor->color_id)->first()->colorpacks->count())
						@php ($arrPackIds = $complect->complectcolors->where('color_id',$itemModelColor->color_id)->first()->colorpacks->pluck('pack_id'))
					@endif
				@endif

				{{Form::select(
					'pack_id['.$itemModelColor->color_id.'][]', 
					$colorPacks, 
					$arrPackIds,
					['multiple'=>'multiple','class'=>'form-control'])}}
			</div>
		@endforeach
	@endif

	@if(isset($markColors))
		@foreach($markColors as $itemModelColor)
			<div class="col-3 text-center">
				<div class="">{{$itemModelColor->color->code}}</div>
				<div style="position: relative;">
					<img src="{{asset('storage/'.$itemModelColor->img)}}">
					{{Form::checkbox(
						'color_id['.$itemModelColor->color_id.']',
						$itemModelColor->color_id,
						'',
						['style'=>'']
					)}}

					
				</div>
				{{Form::select(
						'pack_id['.$itemModelColor->color_id.'][]', 
						isset($packs) ? $packs : [], 
						[],
						['multiple'=>'multiple','class'=>'form-control'])}}
			</div>
		@endforeach
	@endif

</div>