@if(isset($credits) && isset($model))
	<div class="container banners py-3">
		<div class="row banner-carousel">
		  	@foreach($credits as $itemCredit)
		  	<div class="container">
			  	<div class="row d-flex">
			  		<div class="col-5">
			  			<img src="{{asset('storage/'.$itemCredit->banner)}}">
			  		</div>

			  		<div class="col-7 d-flex align-content-stretch flex-wrap">
			  			<div>
				  			<div class="credit-model">
				  				
				  				Кредит на {{$model->brand->name}} {{$model->name}}

				  			</div>

				  			<div class="credit-name">
				  				{{$itemCredit->name}}
				  			</div>
				  		</div>

			  			<div class="credit-info">
			  				<div>Кредитные предложения от Renault Finance.</div>
			  				<div>
			  					@if($itemCredit->rate)
			  						Ставка по кредиту {{$itemCredit->rate}}% |
			  					@endif

			  					@if($itemCredit->pay)
			  						Ежимесячный платеж {{$itemCredit->pay}} руб. |
			  					@endif

			  					@if($itemCredit->contribution)
			  						Первоначальный взнос от {{$itemCredit->contribution}}% |
			  					@endif

			  					@if($itemCredit->period)
			  						Срок кредита до {{$itemCredit->period}}
			  						{{($itemCredit->period==1)?'года':'лет'}} |
			  					@endif
			  				</div>
			  			</div>
			  			<div style="width: 100%;position: relative;">
				  			<div class="btn-group btn-block" style="position: absolute;bottom: 0px;left: 0px;">
				  				<a href="#" class="btn btn-dark">Подробнее о кредитах</a>
				  				<button type="button" class="btn btn-renault ">Обсудить покупку</button>
				  			</div>
				  		</div>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col">
			  			<div class="border py-2 mt-2 text-center credit-description-control" data-condition="0">			  				
			  				Юридическая информация<span class="fa fa-angle-down"></span>
			  			</div>	
			  			<div class="credit-description-content py-2 d-none">
			  				{{$itemCredit->disclaimer}}
			  			</div>
			  		</div>
			  	</div>
			</div>
		  	@endforeach
		</div>
	</div>
@endif