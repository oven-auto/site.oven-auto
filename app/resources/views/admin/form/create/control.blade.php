<?php
	$route = Route::getCurrentRoute()->getName();
	$routeArr = explode('.',$route);
	$index = $route;
	if(isset($routeArr[1]))
		$index = $routeArr[0].'.index';
?>

<div class="row mt-5">
	<div class="col text-right">
		<div class="btn-group">
			<a class="btn btn-primary" href="{{route($index)}}">Выход</a>
			<button type="submit" class="btn btn-success">Создать</button>
		</div>
	</div>
</div>