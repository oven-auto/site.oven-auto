<div 
	class="border p-3 company-block" 
	data-company-section="{{$self->company->section_id}}" 
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