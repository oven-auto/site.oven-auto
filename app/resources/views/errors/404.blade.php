@extends('errors::layout')

@section('title', __('Not Found'))
@section('code', '404')

@section('message')
	<div>Ошибочка(((</div>
	<div>{{ $exception->getMessage() }}</div>
	<div><a href="{{url()->previous()}}">Назад</a></div>
@endsection
