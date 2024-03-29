@extends('layouts.front')

@section('content')
<div class="container pt-3 pb-3">
	<div class="row pb-3">
		<div class="col">
			<div class="">
				<div class="h3 text-center rn-bold pb-3">
					Скидка на заказ-наряд
				</div>
			</div>

			<div class="block-title">
				<div class="pb-3">
					Существует ошибочное мнение, что покупать дополнительное оборудование в автосалоне дорого. Мы развенчиваем стереотипы! В Овен-Авто любое дополнительное оборудование с грандиозной скидкой 20% при покупке нового автомобиля Renault.
				</div>

				<div class="">
					<div class="pb-3">
						Акция распространяется на продажу и установку любого дополнительного оборудования и аксессуаров, реализуемого автосалоном в рамках 	Договора купли-продажи, наличие которого штатно не предусмотрено заводской комплектацией автомобиля.
					</div>
					<div class="">
						Для участия в акции перейдите в раздел Автомобили в продаже и подберите интересующий Вас автомобиль Renault. На странице автомобиля выберите  в персональные условия акцию "Скидка на заказ-наряд" и отправьте запрос в автосалон.
					</div>
				</div>
			</div>

			<div class="text-center py-3">
				<a class="btn btn-renault" href="{{route('front.stock')}}">Автомобили в наличи</a>
			</div>

			<div class="">
				Сумма скидки в денежном эквиваленте не может превышать 8 500 руб.
				ООО "Фирма "Овен-Авто" вправе продавать автомобили тех комплектаций и с тем дополнительным оборудованием, которые доступны на момент обращения Клиента.
				Ограничения по применению акции совместно с другими специальными предложениями Дилерского центра уточняйте в отделе продаж ООО "Фирма "Овен-Авто".
				Предложение не является публичной офертой.
			</div>
		</div>
	</div>
</div>

<!--Begin footer form-->
@include('forms.pagefooter',[
'image'=>\App\Models\Mark::getRandomBanner()
])
<!--End footer form-->

@endsection