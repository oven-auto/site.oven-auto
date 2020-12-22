@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2">
				{{isset($motor) ? 'Редактирование: '.$motor->fullName : 'Новый агрегат'}}
			</div>
		</div>
	</div>

</div>
@endsection