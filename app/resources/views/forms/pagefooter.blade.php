<div class="container-fluid pt-5 " style="
	@if(isset($image))
	background:linear-gradient( 
		to top,
		rgba(255, 255, 255, 1), 
		rgba(255,255,255, 0.5) ), 
		url( {{isset($image) ? asset('storage/'.$image) : ''}}
	); 
	background-size:cover;
	background-position: center;
	background-attachment: fixed;
	@endif
">
	<div class="container text-center">
		<div class="row align-items-stretch">
			<div class="col d-flex align-content-stretch flex-wrap">
				<div class="rn-bold big-text d-block" style="width: 100%;">
					ЕСТЬ ВОПРОСЫ? МЫ ОТВЕТИМ! 
				</div>
			
		
				<div class="col block-title d-block">
					@if(isset($name))
						Мы рады, что Вас заинтересовал {{$name}}. Дополнительную информацию о выбранном автомобиле Вы можете получить по телефону отдела продаж 8 (8212) 288 588 или задайте вопрос в форме рядом. Наши сотрудники свяжутся с Вами и постараются ответить на все вопросы. 
					@else
						Мы рады, что Вас заинтересовали автомобили Renault. Дополнительную информацию Вы можете получить по телефону отдела продаж 8 (8212) 288 588 или задайте вопрос в форме ниже. Наши сотрудники свяжутся с Вами и постараются ответить на все вопросы. 
					@endif
				</div>
			</div>
		</div>
		
		<div class="row py-5 justify-content-md-center">
			<div class="col col-md-6">
				<div style="background: rgba(255,255,255,0.5);border-radius: 10px;padding: 15px;">
					@include('forms.question')
				</div>
			</div>
		</div>
	</div>
</div>