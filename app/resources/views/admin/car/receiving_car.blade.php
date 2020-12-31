<div class="row">


	<div class="col">
		<!--ПРИЁМКА НА СКЛАД BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Приёмка на склад</span>
			</div>
			{{Form::date('vin',isset($car)?$car->vin:'',['placeholder'=>'VIN','class'=>'form-control' ])}}
		</div>

		@error('year')						
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
				<span class="input-group-text">Приходная накладная</span>
			</div>
			{{Form::text('vin',isset($car)?$car->vin:'',['placeholder'=>'Приходная накладная','class'=>'form-control' ])}}
		</div>

		@error('year')						
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
				<span class="input-group-text">Предпродажка</span>
			</div>
			{{Form::date('vin',isset($car)?$car->vin:'',['placeholder'=>'VIN','class'=>'form-control' ])}}
		</div>

		@error('year')						
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
				<span class="input-group-text">Дата накладной</span>
			</div>
			{{Form::date('vin',isset($car)?$car->vin:'',['placeholder'=>'VIN','class'=>'form-control' ])}}
		</div>

		@error('year')						
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
			{{Form::date('vin',isset($car)?$car->vin:'',['placeholder'=>'VIN','class'=>'form-control' ])}}
		</div>

		@error('year')						
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
			{{Form::text('vin',isset($car)?$car->vin:'',['placeholder'=>'Радиокод','class'=>'form-control' ])}}
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