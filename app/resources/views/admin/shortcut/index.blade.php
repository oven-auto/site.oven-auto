@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="h2 m-0">
					Список ярлыков
				</div>
			</div>
			<div class="col text-right">
				<div class="btn-group">
					<a href="{{route('shortcuts.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
					<a href="{{route('shortcuts.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container pt-3 sortable bordered"  data-url="{{route('ajax.shortcuts.sort')}}">
		@foreach($shortcuts as $itemShortcut)
		<div class="row py-2 align-items-center d-flex ui-state-default zone" style="background:#fff;" data-id="{{$itemShortcut->id}}" data-sort="{{$itemShortcut->sort}}">
			<div class="col-1">
				<div class="btn-group" style="width: 70px;" >
					<a href="{{route('shortcuts.edit',$itemShortcut)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
					<button class="btn btn-danger fa fa-close"></button>
				</div>
			</div>

			<div class="col-2">
				{{$itemShortcut->title}}
			</div>

			<div class="col-2">
				{{$itemShortcut->links}}
			</div>

			<div class="col">
				{{$itemShortcut->icon}}
			</div>
		</div>
		@endforeach
	</div>
@endsection