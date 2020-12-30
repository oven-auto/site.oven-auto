<div class="row">
	<div class="col">
		<!--YEAR BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Заказа в производство</span>
			</div>
			{{Form::date('year',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
		</div>

		@error('year')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--YEAR END-->

		<div class="plan-date">
			<!--YEAR BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Планируемая сборка</span>
				</div>
				{{Form::date('year',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
			</div>

			@error('year')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror
			<!--YEAR END-->
		</div>
	</div>

	<div class="col">
		<!--YEAR BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Уведомление о сборке</span>
			</div>
			{{Form::date('year',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
		</div>

		@error('year')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--YEAR END-->

		<!--YEAR BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Фактическая сборка</span>
			</div>
			{{Form::date('year',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
		</div>

		@error('year')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--YEAR END-->
	</div>

	<div class="col">
		<!--YEAR BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Готовность к отгрузке</span>
			</div>
			{{Form::date('year',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
		</div>

		@error('year')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--YEAR END-->

		<!--YEAR BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Цех отгрузки</span>
			</div>
			{{Form::text('year',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
		</div>

		@error('year')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--YEAR END-->

		<div class="ship-date">
			<!--YEAR BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Отгрузка</span>
				</div>
				{{Form::date('year',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
			</div>

			@error('year')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror
			<!--YEAR END-->
		</div>

	</div>
</div>