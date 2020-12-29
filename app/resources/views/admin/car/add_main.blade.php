<div class="row">
	<div class="col">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Тип поставки</span>
			</div>
			{{Form::select('delivery_id',$deliveryTypes,isset($car)?$car->delivery_id:'',['placeholder'=>'Тип доставки','class'=>'form-control' , 'required'=>'required'])}}
		</div>

		@error('delivery_id')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror

		<!--YEAR BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Выпуск</span>
			</div>
			{{Form::date('year',isset($car)?$car->year:'',['placeholder'=>'Выпуск','class'=>'form-control' , 'required'=>'required'])}}
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

		<!--BRAND BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Бренд</span>
			</div>
			{{Form::select('brand_id',$brands,isset($car)?$car->brand_id:'',['placeholder'=>'Бренд','class'=>'form-control' , 'required'=>'required', 'data-url'=>route('ajax.get.mark','single')])}}
		</div>

		@error('brand_id')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--BRAND END-->

	</div>







	<div class="col">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Тип поставки</span>
			</div>
			{{Form::select('delivery_id',$deliveryTypes,isset($car)?$car->delivery_id:'',['placeholder'=>'Тип доставки','class'=>'form-control' , 'required'=>'required'])}}
		</div>

		@error('delivery_id')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror

		<!--VIN BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">VIN</span>
			</div>
			{{Form::text('vin',isset($car)?$car->vin:'',['placeholder'=>'VIN','class'=>'form-control' , 'required'=>'required'])}}
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

		<!--MARK BEGIN-->
		<div class="car-mark-add">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Модель</span>
				</div>
				{{Form::select('mark_id',[],'',['placeholder'=>'Модель','class'=>'form-control' , 'required'=>'required'])}}
			</div>

			@error('mark_id')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror
		</div>
		<!--MARK END-->

	</div>






	<div class="col">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Маркер</span>
			</div>
			{{Form::select('marker_id',$logistMarkers,isset($car)?$car->marker_id:'',['placeholder'=>'Маркер логиста','class'=>'form-control' , 'required'=>'required'])}}
		</div>

		@error('delivery_id')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror

		<!--ORDER_NUMBER BEGIN-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">№ заказа</span>
			</div>
			{{Form::text('order_number',isset($car)?$car->order_number:'',['placeholder'=>'Номер заказа','class'=>'form-control' , 'required'=>'required'])}}
		</div>

		@error('year')						
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@enderror
		<!--ORDER_NUMBER END-->

		<!--MARK BEGIN-->
		<div class="car-complect-add">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Комплектация</span>
				</div>
				{{Form::select('complect_id',[],'',['placeholder'=>'Комплектация','class'=>'form-control' , 'required'=>'required'])}}
			</div>

			@error('complect_id')						
			    <div class="alert alert-danger">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ $message }}
				</div>
			@enderror
		</div>
		<!--MARK END-->

	</div>
</div>

<div class="row" id="car-view">

</div>