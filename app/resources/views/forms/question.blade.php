{{Form::open([
	'url' => route('front.callback.registration')
])}}
<div class="container front-form">

	<div class="row pb-3">
			<div class="message"></div>
		    <div class="input-group mb-3" >
		        <div class="input-group-prepend">
		          <div class="input-group-text"><i class="fa fa-user"></i></div>
		        </div>
		        <input type="text" class="form-control data-control" id="username" name="username" placeholder="Ваше имя" >
		    </div>
	</div>

	<div class="row pb-3">
			<div class="message"></div>
		    <div class="input-group mb-3">
		        <div class="input-group-prepend">
		          <div class="input-group-text" ><i class="fa fa-phone"></i></div>
		        </div>
		        <input type="text" class="form-control data-control" id="userphone" name="userphone" placeholder="Ваше телефон">
		    </div>
	</div>

	<div class="row pb-3">
			<div class="message"></div>
		    <div class="input-group textarea">
		        <div class="input-group-prepend">
		          <div class="input-group-text"><i class="fa fa-comment"></i></div>
		        </div>
		        <textarea type="text" class="form-control data-control" id="usercomment" name="usercomment" placeholder="Ваш вопрос"></textarea>
		    </div>
	</div>

	<div class="row text-center">
		<p>
		Нажимая кнопку "Отправить", Вы соглашаетесь с <a href="" style="display: inline;">политикой защиты данных</a> ООО «Фирма «Овен-Авто»<input type="checkbox" name="uservalid" id="uservalid" value="1">
		</p>
	</div>

	<div class="row pt-2">
		<button class="btn btn-renault btn-block send-btn" type="button">Отправить</button>
	</div>

</div>
{{Form::close()}}