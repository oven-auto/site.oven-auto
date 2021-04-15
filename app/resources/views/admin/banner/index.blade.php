@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<div class="h2 m-0">
				Список банеров
			</div>
		</div>
		<div class="col text-right">
			<div class="btn-group">
				<a href="{{route('banners.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
				<a href="{{route('banners.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
			</div>
		</div>
	</div>

	<div class="row pt-3 sortable" style="min-height: 60vh;" data-url="{{route('ajax.banners.sort')}}">
		@foreach($banners as $itemBanner)
			<div class="col-4 zone ui-state-default py-3" data-sort="{{$itemBanner->sort}}" data-id="{{$itemBanner->id}}">
				
				<div style='
					height: 200px;
					background-size: cover !important;
					background-position: center !important;
					background: url({{asset("storage/".$itemBanner->img)}})
				'>
					
				</div>
				
				<div class="" style="">
					<div class="btn-group btn-block">
						<a href="{{route('banners.edit',$itemBanner)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
						<button type="button" class="btn btn-danger fa fa-close"></button>
					</div>
				</div>
			
			</div>
		@endforeach
	</div>
</div>

@endsection