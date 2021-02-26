<div class="container-fluid header">
	<div class="header-top-links row">
		<div class="col text-left">
			1
		</div>
		<div class="col text-right">
			2
		</div>
	</div>

	<div class="header-info">
		<div class="container">
			3
		</div>
	</div>

	<div class="menu">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
			          		<a class="dropdown-item" href="{{$slug}}">{{$itemModel}}</a>
			          	@endforeach
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="#">Автомобили в продаже</a>
			        </div>
			      </li>

			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Покупателям
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			        	@foreach($models as $slug => $itemModel)
			          		<a class="dropdown-item" href="{{$slug}}">{{$itemModel}}</a>
			          	@endforeach
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="#">Автомобили в продаже</a>
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
			    	<a class="nav-link" href="#">Авто в продаже</a>
			    </ul>
			  </div>
			</div>
		</nav>
	</div>	
</div>