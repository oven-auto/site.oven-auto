<div class="row">


	<div class="col">
		<!--ПРИЁМКА НА СКЛАД BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Дата приёмки на склад</span>
			</div>
			{{Form::date('accept_stock_date',isset($car)?$car->receiving->accept_stock_date:'',['placeholder'=>'','class'=>'form-control' ])}}
		</div>

		@error('accept_stock_date')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--ПРИЁМКА НА СКЛАД END-->

		<!--НОМЕР НАКЛАДНОЙ BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Номер приходной накладной</span>
			</div>
			{{Form::text(
				'receipt_number',
				isset($car)?$car->receiving->receipt_number:'',
				['placeholder'=>'Приходная накладная','class'=>'form-control' ]
			)}}
		</div>

		@error('receipt_number')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--НОМЕР НАКЛАДНОЙ END-->

		
	</div>










	<div class="col">
		<!--ПРЕДПРОДАЖКА BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Дата предпродажной подготовки</span>
			</div>
			{{Form::date('pre_sale_date',isset($car)?$car->receiving->pre_sale_date:'',['placeholder'=>'','class'=>'form-control' ])}}
		</div>

		@error('pre_sale_date')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--ПРЕДПРОДАЖКА END-->

		<!--ДАТА НАКЛАДНОЙ BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Дата приходной накладной</span>
			</div>
			{{Form::date('receipt_date',isset($car)?$car->receiving->receipt_date:'',['placeholder'=>'','class'=>'form-control' ])}}
		</div>

		@error('receipt_date')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--ДАТА НАКЛАДНОЙ END-->
	</div>









	<div class="col">
		<!--ПриЁМЩИК BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Приёмщик</span>
			</div>
			{{Form::select('receiver_id',$authors,$car->receiving->receiver_id,['placeholder'=>'Приемщик','class'=>'form-control' ])}}
		</div>

		@error('receiver_id')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--ПРИЕМЩИК END-->

		<!--РАДИОКОД BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Радиокод</span>
			</div>
			{{Form::text('radiocode',isset($car)?$car->receiving->radiocode:'',['placeholder'=>'Радиокод','class'=>'form-control' ])}}
		</div>

		@error('radiocode')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--РАДИОКОД END-->
	</div>


</div>

<div class="row">
	<div class="col-4">
		<!--УСЛОВИЯ ОТГРУЗКИ BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Условия отгрузки</span>
			</div>
			{{Form::select('provision_id',[1,2,3],isset($car)?$car->receiving->provision_id:'',['placeholder'=>'Обеспечение','class'=>'form-control' ])}}
		</div>

		@error('provision_id')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--УСЛОВИЯ ОТГРУЗКИ END-->
	</div>

	<div class="col-2">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">&nbsp</span>
			</div>
			<button class="btn btn-dark btn-block add-provision" type="button">Добавить условие</button>
		</div>		
	</div>

	<div class="col provision-details">
		<div class="row default">
			<div class="col-4">
				<!--РАДИОКОД BEGIN-->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Дни</span>
					</div>
					{{
						Form::number('provision[day][]',isset($car)?'':'',[
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
				<!--РАДИОКОД END-->
			</div>

			<div class="col-8">
				<!--РАДИОКОД BEGIN-->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Дата</span>
					</div>
					{{Form::date('provision[date][]',isset($car)?$car->vin:'',['placeholder'=>'Дата','class'=>'form-control provision_date' ])}}
				</div>

				@error('year')						
				    <div class="alert alert-danger">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{{ $message }}
					</div>
				@enderror
				<!--РАДИОКОД END-->
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<!--РАДИОКОД BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Дата оплаты ПТС</span>
			</div>
			{{Form::date(
				'pts_pay_date',
				isset($car)?$car->receiving->pts_pay_date:'',
				['placeholder'=>'Фактический закуп','class'=>'form-control' ]
			)}}
		</div>

		@error('pts_pay_date')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--РАДИОКОД END-->
	</div>

	<div class="col">
		<!--РАДИОКОД BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Дата получения ПТС</span>
			</div>
			{{Form::date(
				'pts_receipt_date',
				isset($car)?$car->receiving->pts_receipt_date:'',
				['placeholder'=>'Фактический закуп','class'=>'form-control' ]
			)}}
		</div>

		@error('pts_receipt_date')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--РАДИОКОД END-->
	</div>

	<div class="col">
		<!--РАДИОКОД BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Дата списания со счёта</span>
			</div>
			{{Form::date('pts_debiting_date',isset($car)?$car->receiving->pts_debiting_date:'',['placeholder'=>'Фактический закуп','class'=>'form-control' ])}}
		</div>

		@error('pts_debiting_date')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--РАДИОКОД END-->
	</div>
</div>