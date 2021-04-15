<div 
	class="border p-3 company-block {{($self->company->controll->immortal) ? 'company-immortal' : ''}} {{($self->company->controll->main) ? 'company-main' : ''}}" 
	data-company-section="{{$self->company->section_id}}" 
	data-company-id="{{$self->company->id}}"

>
	<div class="company-title rn-bold">
		{{$self->company->controll->title}}
	</div>

	<div class="company-text">
		{{$self->company->controll->text}}
	</div>

	<div class="company-section pt-3 rn-bold">
		{{$self->company->section->name}}
	</div>

	<div class="company-offer">
		{{$self->company->controll->offer}}
	</div>

</div>