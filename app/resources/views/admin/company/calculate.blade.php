<div class="col">
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Цена базы</span>
		</div>
		{{Form::text('parameters[base]',$self->base,['class'=>'form-control'])}}
	</div>
</div>

<div class="col">
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Цена опций</span>
		</div>
		{{Form::text('parameters[packs]',$self->packs,['class'=>'form-control'])}}
	</div>
</div>

<div class="col">
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Цена допов</span>
		</div>
		{{Form::text('parameters[options]',$self->options,['class'=>'form-control'])}}
	</div>
</div>

<div class="col">
	<div class="input-group mb-3 range-block">
		<div class="input-group-prepend">
			<span class="input-group-text">Процент: <span class="range-value">{{$self->procent}}</span></span>
		</div>
		{{Form::range('parameters[procent]',$self->procent,['class'=>'form-control','min'=>0,'max'=>100,'step'=>0.5])}}
	</div>
</div>

<div class="col">
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Ограничение</span>
		</div>
		{{Form::number('parameters[limit]',$self->limit,['class'=>'form-control'])}}
	</div>
</div>