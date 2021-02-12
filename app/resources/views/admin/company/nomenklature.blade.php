<div class="col-3">
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Номенклатура</span>
		</div>
		<button 
			class="btn btn-secondary btn-block company-modal-options" 
			type="button" 
			data-url="{{route('ajax.get.option.all')}}">
			Выбрать ДО
		</button>
	</div>
</div>

<div class="col-9">
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">Выбранное ДО</span>
		</div>
	</div>
	<div class="select-options-view"></div>
	<input id="nomenklatures" type="hidden" value="" name="nomenklatures">
</div>

