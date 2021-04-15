<div class="container-fluid header">
	<div class="header-top-links row py-1">
		<div class="col text-left">
			<a href="http://renault.ru/my-renault/index.jsp" target="_blank">Подключитесь к My Renault</a>
		</div>
		<div class="col text-right">
			<a href="/content/availablelist">Автомобили в продаже</a>
          	<a href="/content/testform">Тест-драйв</a>
          	<a href="/content/service">Записаться на сервис</a>
		</div>
	</div>

	<div class="header-info py-3">
		<div class="container">
			
		    <div class="row d-flex alig-items-center">
		      <div class="col-1 text-center">
		        <a href="/"><img src="http://www.renault.oven-auto.ru/images/logo.png" alt="Логотип"></a>
		      </div>
		      <div class="col-5 ">
		        <div class="name">ОВЕН-АВТО</div>
		        <div class="slogan ">Официальный дилер Renault в Республике Коми</div>
		      </div>
		      <div class="col-4 ">
		          <div><a class="phone" href="tel:88212288588">8 (8212) 288-588</a></div>
		          <div class="address">г. Сыктывкар, ул. Гаражная, 1</div>
		      </div>
		      <div class="col-2 text-center">
		        <img src="http://www.renault.oven-auto.ru/images/renault_logo.png" alt="Логотип Renault">
		      </div>
		    </div>
  
		</div>
	</div>
</div>

	<div class="menu nav-menu">
		<nav class="navbar navbar-expand-lg navbar-light py-0">
			<div class="container">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="#"><span class="fa fa-home"></span></a>
			      </li>

			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Модельный ряд
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			        	@foreach($models as $slug => $itemModel)
			          		<a class="dropdown-item" href="{{route('front.pricelist',$slug)}}">{{$itemModel}}</a>
			          	@endforeach
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="{{route('front.stock')}}">Автомобили в продаже</a>
			        </div>
			      </li>

			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Покупателям
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">			 
			          <a class="dropdown-item" href="{{route('front.page.credit')}}">Кредитные программы</a>
			          <a class="dropdown-item" href="{{route('front.page.document')}}">Формы документов</a>
			          <a class="dropdown-item" href="{{route('front.page.tradein')}}">Программа TradeIn</a>
			          <a class="dropdown-item" href="{{route('front.page.guarantee')}}">Гарантия цены</a>
			          <a class="dropdown-item" href="{{route('front.page.saleoption')}}">Скидка на дополнительное оборудование</a>
			          <a class="dropdown-item" href="{{route('front.page.othercity')}}">Иногородним покупателям</a>
			        </div>
			      </li>

			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Сервис
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			        	@foreach($models as $slug => $itemModel)
			          		<a class="dropdown-item" href="{{$slug}}">{{$itemModel}}</a>
			          	@endforeach
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="#">Автомобили в продаже</a>
			        </div>
			      </li>

			      <li class="nav-item">
			        <a class="nav-link" href="#">Акции</a>
			      </li>

			      <li class="nav-item">
			        <a class="nav-link" href="#">Контакты</a>
			      </li>

			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Прочее
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			        	@foreach($models as $slug => $itemModel)
			          		<a class="dropdown-item" href="{{$slug}}">{{$itemModel}}</a>
			          	@endforeach
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="#">Автомобили в продаже</a>
			        </div>
			      </li>

			    </ul>

			    <ul class="navbar-nav my-2 my-lg-0">
			    	<a class="nav-link" href="{{route('front.stock')}}">Автомобили в продаже</a>
			    </ul>
			  </div>
			</div>
		</nav>
	</div>	
