@extends('layouts.front')

@section('content')
	<div class="container py-3">
		<div class="row pb-5">
			<div class="col">
				<div class="">
					<div class="h3 text-center rn-bold pb-3">
						Кредитные программы
					</div>
				</div>
			
				<div class="">
					<div class="block-title">
						Покупка автомобиля - значимое событие в жизни каждого человека! Собственная программа финансирования Renault Finance уже помогла многим ускорить этот счастливый момент. В рамках программы для каждого автомобиля Renault нами были разработаны специальные финансовые предложения с комфортными условиями, подобранными именно для Вас. 
					</div>
				</div>
			</div>
		</div>
		<div class="row pb-3">
			<div class="col">
				<div class="h3 text-center rn-bold ">
					Как получить кредит?
				</div>
				<div class="text-center block-title">
					Всего 3 шага
				</div>
			</div>
		</div>

		<div class="row pb-3">
			<div class="col">
				<div class="mb-3">
					<img src="{{asset('images/credit/1.jpg')}}" style="width: 100%;">
				</div>

				<div class="h3">Шаг 1</div>

				<div class="block-title">Получите расчет по кредиту у менеджера дилерского центра.</div>
			</div>

			<div class="col">
				<div class="mb-3">
					<img src="{{asset('images/credit/2.jpg')}}" style="width: 100%;">
				</div>

				<div class="h3">Шаг 2</div>

				<div class="block-title">Оформите заявку, предъявив только паспорт и водительское удостоверение.</div>
			</div>

			<div class="col">
				
				<div class="mb-3">
					<img src="{{asset('images/credit/3.jpg')}}" style="width: 100%;">
				</div>

				<div class="h3">Шаг 3</div>

				<div class="block-title">Подпишите кредитный договор и получите ваш новый Renault.</div>
			</div>
		</div>

		<div class="row"><div class="col"><div style="border-bottom: 3px solid #fc3;"></div></div></div>
	</div>

	<div class="container pt-3 pb-5">
		<div class="row mb-3">
			<div class="col">
				<div class="h3 text-center rn-bold">Кредитные предложения</div>
				<div class="block-title text-center">
					{{\App\Models\Credit\Credit::getRusCurrentMonth()}}
					{{date('Y')}}
				</div>	
			</div>
		</div>

		@if(isset($credits) && $credits->count())
			@foreach($credits as $itemCredit)
			<div class="container border {{(!$loop->last) ? 'mb-4' : ''}}">
				<div class="row">
					<div class="col d-flex align-items-center  justify-content-between" style="background: #f5f5f5;">
						<div class="py-5 h3">
							{{$itemCredit->name}}
						</div>
						<div class="" >
							Действует до {{$itemCredit->end_date}}
						</div>
					</div>
				</div>
				<div class="row">
					@if(isset($itemCredit->models) && $itemCredit->models->count())
						@foreach($itemCredit->models as $itemModel)
							<div class="col-3 text-center pb-3">
								<div class="">
									@if(is_file(public_path('storage/'.$itemModel->model->icon)))
										<img src="{{asset('storage/'.$itemModel->model->icon)}}" style="width: 100%;">
									@endif
								</div>
								<div class="block-title pt-3">
									{{$itemModel->model->brand->name}} 
									{{$itemModel->model->name}}
								</div>
								<div class="">
									от {{number_format($itemModel->model->lowcomplect->price,0,'',' ')}} руб.
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
			@endforeach
		@endif
	</div>

	<!--Begin footer form-->
	@include('forms.pagefooter',[
		'image'=>$credits->first()->models->random()->model->icon
	])
	<!--End footer form-->

@endsection