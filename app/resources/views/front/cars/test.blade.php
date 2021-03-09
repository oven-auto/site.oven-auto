@if(isset($test))
<div class="container py-3">
	<div class="row d-flex">
		<div class="col-5">
			@isset($test->img)
				<img src="{{asset('storage/'.$test->img)}}" style="width: 100%;">
			@endisset
		</div>

		<div class="col-7 d-flex align-content-stretch flex-wrap">
			<div>
				<div class="credit-model">
					Испытай в движении {{$test->brand->name}} {{$test->mark->name}}
				</div>

				<div class="credit-name">
					Пробная поездка
				</div>
			</div>

			<div class="credit-info">
				Автомобиль в комплектации {{$test->complect->name}}, {{$test->complect->motor->type->name}} {{$test->complect->motor->valve}} клапанный с рабочим объемом {{$test->complect->motor->size/1000}} л. ({{$test->complect->power}} л.с.), КПП {{$test->complect->motor->transmission->full_name}}, привод {{$test->complect->motor->driver->full_name}}.
			</div>

			<div style="width: 100%;position: relative;">
	  			<div class="btn-group btn-block" style="position: absolute;bottom: 0px;left: 0px;">
	  				<a href="#" class="btn btn-dark">Подробнее о тест-драйве</a>
	  				<button type="button" class="btn btn-renault ">Пройти тест-драйв</button>
	  			</div>
	  		</div> 
		</div>
	</div>
</div>
@endif