@extends('layouts.front')

@section('content')
<div class="container pt-3 pb-3">
	<div class="row pb-3">
		<div class="col">
			<div class="">
				<div class="h3 text-center rn-bold pb-3">
					Формы документов
				</div>
			</div>
		
			<div class="">
				<div class="block-title">
					Находясь в автосалоне, все мысли Покупателя, как правило, обращены к новому автомобилю, а торжественный момент покупки не располагает к изучению документов. Мы понимаем как важно принять взвешенное решение и не упустить детали, поэтому предлагаем Вам ознакомиться с содержанием всех основных документов заранее.
				</div>
			</div>
		</div>
	</div>

	<div class="row block-title">
		<div class="col">
			<div class="">
				1. Выбрали автомобиль из поставки? Покупка начнется с оформления Предварительного договора купли-продажи автомобиля.
			</div>
			
			<div class="pt-3">
				<a href="" class="d-block" style="">
					<i class="fa fa-file-o " style=""></i>
					Предварительный договор
				</a>

				<a href="" class="d-block" style="">
					<i class="fa fa-file-o " style=""></i>
					Приложение к договору
				</a>
			</div>
		</div>
	</div>

	<div class="row block-title pt-3">
		<div class="col">
			<div>
				2. Автомобиль уже на нашем складе? Осталось зафиксировать его параметры и согласовать условия продажи.
			</div>
			
			<div class="pt-3">
				<a href="" class="d-block" style="">
					<i class="fa fa-file-o " style=""></i>
					Договор купли-продажи
				</a>

				<a href="" class="d-block" style="">
					<i class="fa fa-file-o " style=""></i>
					Приложение к договору купли-продажи
				</a>
			</div>
		</div>
	</div>

	<div class="row block-title pt-3">
		<div class="col">
			<div>
				3. Если Вы предпочитаете дистанционные формы оплаты, Вам будет предложен Счет для безналичного перечисления в банке или Квитанция для защищенной оплаты по QR-коду черз мобильное приложение Вашего банка.
			</div>
	

			<div class="pt-3">
				<a href="" class="d-block" style="">
					<i class="fa fa-file-o " style=""></i>
					Счет на оплату в банке
				</a>

				<a href="" class="d-block" style="">
					<i class="fa fa-file-o " style=""></i>
					Квитанция для оплаты по QR-коду
				</a>
			</div>
		</div>
	</div>

	<div class="row block-title pt-3">
		<div class="col">
			<div>
				4. Вы оплатили автомобиль и готовитесь его получить? В процессе выдачи будет оформлен Акт приема-передачи.
			</div>
	

			<div class="pt-3">
				<a href="" class="d-block" style="">
					<i class="fa fa-file-o " style=""></i>
					Акт приема-передачи автомобиля
				</a>
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