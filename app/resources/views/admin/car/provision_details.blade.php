<div class="row {{isset($class)?$class:''}}">
	<div class="col-4">
		<!--DAY BEGIN-->
		<div class="input-group mb-3">
			@isset($class)
			<div class="input-group-prepend">
				<span class="input-group-text">Дни</span>
			</div>
			@endisset
			{{
				Form::number('provision[day][]',isset($item)? $item->day:'',[
					'placeholder'=>'Дни',
					'class'=>'form-control provision_day' 
				])
			}}
		</div>

		@error('year')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--DAY END-->
	</div>

	<div class="col-8">
		<!--DATE BEGIN-->
		<div class="input-group mb-3">
			@isset($class)
			<div class="input-group-prepend">
				<span class="input-group-text">Дата</span>
			</div>
			@endisset
			{{Form::date('provision[date][]',isset($item)?$item->date:'',['placeholder'=>'Дата','class'=>'form-control provision_date' ])}}
		</div>

		@error('year')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--DATE END-->
	</div>
</div>