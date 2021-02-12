<div class="container pb-4 car-set-bg">
	<div class="row">
		<div class="col-3">
			<!--END DATE-->
			<div class="input-group ">
				<div class="input-group-prepend">
					<span class="input-group-text">VIN</span>
				</div>
				{{Form::hidden('car[type][]','1')}}
				{{Form::text(
					'car[vin][]',
					'',
					['placeholder'=>'VIN','class'=>'form-control']
				)}}
			</div>
			<!--END DATE END-->
		</div>

		<div class="col-3">
			<!--END DATE-->
			<div class="input-group ">
				<div class="input-group-prepend">
					<span class="input-group-text">Модель</span>
				</div>
				{{Form::select(
					'car[mark_id][]',
					$models,
					'',
					['placeholder'=>'Модель','class'=>'form-control']
				)}}
			</div>
			<!--END DATE END-->
		</div>

		<div class="col-3">
			<!--END DATE-->
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Комплектация</span>
				</div>
				{{Form::select(
					'car[complect_id][]',
					$complects,
					'',
					['placeholder'=>'Комплектация','class'=>'form-control']
				)}}
			</div>
			<!--END DATE END-->
		</div>

		<div class="col-3">
			<div class="row">
				<div class="col">
					<!--END DATE-->
					<div class="input-group ">
						<div class="input-group-prepend">
							<span class="input-group-text">КПП</span>
						</div>
						{{Form::select(
							'car[transmission_id][]',
							$transmissions,
							'',
							['placeholder'=>'КПП','class'=>'form-control']
						)}}
					</div>
					<!--END DATE END-->
				</div>

				<div class="col">
					<!--END DATE-->
					<div class="input-group ">
						<div class="input-group-prepend">
							<span class="input-group-text">Привод</span>
						</div>
						{{Form::select(
							'car[driver_id][]',
							$drivers,
							'',
							['placeholder'=>'Привод','class'=>'form-control']
						)}}
					</div>
					<!--END DATE END-->
				</div>
			</div>
		</div>

		<div class="col">
			<!--END DATE-->
			<div class="input-group ">
				<div class="input-group-prepend">
					<span class="input-group-text">Поставка</span>
				</div>
				{{Form::select(
					'car[delivery_id][]',
					[],
					'',
					['placeholder'=>'Поставка','class'=>'form-control']
				)}}
			</div>
			<!--END DATE END-->
		</div>

		<div class="col">
			<!--END DATE-->
			<div class="input-group ">
				<div class="input-group-prepend">
					<span class="input-group-text">Цена: от</span>
				</div>
				{{Form::text(
					'car[min_price][]',
					'',
					['placeholder'=>'Цена: от','class'=>'form-control']
				)}}
			</div>
			<!--END DATE END-->
		</div>

		<div class="col">
			<!--END DATE-->
			<div class="input-group ">
				<div class="input-group-prepend">
					<span class="input-group-text">Цена: до</span>
				</div>
				{{Form::text(
					'car[max_price][]',
					'',
					['placeholder'=>'Цена: до','class'=>'form-control']
				)}}
			</div>
			<!--END DATE END-->
		</div>

		<div class="col">
			<div class="row">
				<div class="col-6">
					<!--END DATE-->
					<div class="input-group ">
						<div class="input-group-prepend">
							<span class="input-group-text">Год выпуска</span>
						</div>
						{{Form::select(
							'car[year][]',
							[],
							'',
							['placeholder'=>'Год выпуска','class'=>'form-control']
						)}}
					</div>
					<!--END DATE END-->
				</div>

				<div class="col-6">
					<div class="input-group ">
						<div class="input-group-prepend">
							<span class="input-group-text">&nbsp</span>
						</div>
						<button class="btn btn-block btn-outline-danger cars-set-delete" type="button">
							Удалить
							<i class="fa fa-close"></i>
						</button>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>