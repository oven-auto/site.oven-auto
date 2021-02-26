@extends('layouts.front')

@section('content')
	<div class="container">
		@include('front.banner.main')
	</div>

	<div class="container">
		@include('front.tab.model')
	</div>
@endsection