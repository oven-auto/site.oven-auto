<div class="row">
	<div class="col">
		<!--ЗАКАЗ В ПРОИЗВОДСТВО BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Заказа в производство</span>
			</div>
			{{Form::date('order_date',isset($car)?$car->year:'',['placeholder'=>'Заказ в вроизводство','class'=>'form-control' ])}}
		</div>

		@error('order_date')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--ЗАКАЗ В ПРОИЗВОДСТВО END-->



		<div class="plan-date">
			<!--ПЛАНИРУЕМАЯ СБОРКА BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Планируемая сборка</span>
				</div>
				{{Form::date('plan_date',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
			</div>

			@error('plan_date')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror
			<!--ПЛАНИРУЕМАЯ СБОРКА  END-->


		</div>
	</div>






	<div class="col">
		<!--УВЕДОМЛЕНИЕ О СБОРКЕ BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Уведомление о сборке</span>
			</div>
			{{Form::date('notice_date',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
		</div>

		@error('notice_date')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--УВЕДОМЛЕНИЕ О СБОРКЕ END-->





		<!--ФАКТИЧЕСКАЯ СБОРКА BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Фактическая сборка</span>
			</div>
			{{Form::date('build_date',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
		</div>

		@error('build_date')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--ФАКТИЧЕСКАЯ СБОРКА END-->
	</div>

	<div class="col">
		<!--ГОТОВНОСТЬ К ОТГРУЗКЕ BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Готовность к отгрузке</span>
			</div>
			{{Form::date('ready_date',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
		</div>

		@error('ready_date')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--ГОТОВНОСТЬ К ОТГРУЗКЕ END-->

		<!--ЦЕХ ОТГРУЗКИ BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Цех отгрузки</span>
			</div>
			<div class="form-control">ЦЕХ</div>
		</div>
		<!--ЦЕХ ОТГРУЗКИ END-->

		<div class="ship-date">
			<!--ДАТА ОТГРУЗКИ BEGIN-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Отгрузка</span>
				</div>
				{{Form::date('ship_date',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' ])}}
			</div>

			@error('ship_date')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror
			<!--ДАТА ОТГРУЗКИ END-->
		</div>

	</div>
</div>