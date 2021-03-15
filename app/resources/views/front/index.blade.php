@extends('layouts.front')

@section('content')
	
	@include('front.banner.main')
	
	@include('front.tab.model')

	<div class="container pt-5 ">
		<div class="row pb-3">
			<div class="col big-text">
				Автосалон Овен-Авто. Официальный дилер Renault в г. Сыктывкаре
			</div>
		</div>

		<div class="row">
			<div class="col-12 block-title text-justify">
				<img src="{{asset('images/showroom.jpg')}}" style="float: left;width: 60%;" class="mr-4 mb-4">
				Овен-Авто – единственный официальный дилер марки Renault в Республике Коми. Приглашаем Вас посетить наш автосалон и познакомиться с новыми автомобилями Renault. Шоурум дилерского центра отвечает высоким стандартам производителя и порадует Вас незабываемой атмосферой мира Renault, а наши специалисты постараются сделать все, чтобы оправдать Ваши ожидания. К Вашим услугам парк подменных автомобилей и автомобили для пробной поездки, финансовые и страховые консультации, сервисный центр, оснащенный современным оборудованием, МКП, автомойка и многое другое…
				Добро пожаловать в мир Renault. 
			</div>
		</div>

		<div class="row py-5">
			<div class="col-4">
				<div class="block-title">
					Адрес:
				</div>
				<div class="block-title pb-3">
					г. Сыктывкар, ул. Гаражная д. 1
				</div>

				<div class="block-title">
					Отдел продаж:
				</div>

				<div class="block-title pb-3">
					8 (8212) 288 588
				</div>

				<div class="block-title">
					Сервис:
				</div>

				<div class="block-title pb-3">
					8 (8212) 288 588
				</div>

				<a href="#" class="btn btn-block btn-renault">Все контакты</a>
			</div>

			<div class="col-8">
				<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac2fca488e293632c690e765dab50541d78a6d14e9c4e42be850e1e9c2324a42f&amp;width=100%25&amp;height=349&amp;lang=ru_RU&amp;scroll=true"></script>
			</div>
		</div>
	</div>
	
@endsection