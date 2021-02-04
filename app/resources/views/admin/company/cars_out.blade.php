<div class="container mb-3">
	<div class="row">
		<div class="col-3">
			<!--END DATE-->
			<div class="input-group ">
				<div class="input-group-prepend">
					<span class="input-group-text">VIN</span>
				</div>
				{{Form::hidden('type[]','0')}}
				{{Form::text(
					'vin[]',
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
					'mark_id[]',
					[],
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
					'complect_id[]',
					[],
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
							'transmission_id[]',
							[],
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
							'driver_id[]',
							[],
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
					'delivery_id[]',
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
					'max_price[]',
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
					'max_price[]',
					'',
					['placeholder'=>'Цена: до','class'=>'form-control']
				)}}
			</div>
			<!--END DATE END-->
		</div>

		<div class="col">
			<!--END DATE-->
			<div class="input-group ">
				<div class="input-group-prepend">
					<span class="input-group-text">Год выпуска</span>
				</div>
				{{Form::select(
					'year[]',
					[],
					'',
					['placeholder'=>'Год выпуска','class'=>'form-control']
				)}}
			</div>
			<!--END DATE END-->
		</div>

	</div>
</div>