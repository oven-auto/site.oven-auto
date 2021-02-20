@extends('layouts.app')

@section('content')
	<div class="container" style="min-height: 60vh">
		<div class="row">
			<div class="col">
				<div class="h2 m-0">
					Список коммерческих акций
				</div>
			</div>
			<div class="col text-right">
				<div class="btn-group">
					<a href="{{route('companies.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</a>
					<a href="{{route('companies.index')}}" class="btn btn-secondary"><i class="fa fa-refresh"></i>Обновить</a>
				</div>
			</div>
		</div>

		<div class="row pt-3">
			<div class="col-12">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				@foreach($sections as $id => $name)
					<li class="nav-item">
						<a class="nav-link {{($loop->first) ? 'active' : '' }}"  data-toggle="tab" href="#section{{$id}}" aria-selected="true">
							{{$name}}
						</a>
					</li>
				@endforeach
			</ul>
			<div class="tab-content" id="myTabContent">
				@foreach($sections as $id => $name)
					<div 
						class="tab-pane fade show {{($loop->first) ? 'active' : '' }}" 
						id="section{{$id}}" 
						role="tabpanel" 
					>
						@include('admin.company.admin_row',['companies'=>$companies->where('section_id',$id)])
					</div>
				@endforeach
			</div>
			
			</div>
		</div>
	</div>
@endsection