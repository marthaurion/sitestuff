@extends('app')

@section('content')

	<h1>Edit: {!! $article->title !!}</h1>

	<hr />

	{!! Form::model($article, ['method' => 'PATCH', 'url' => 'articles/'.$article->slug]) !!}
		@include('partials._form', ['submitButtonText' => 'Update Article'])
	{!! Form::close() !!}

	@include ('errors.list')

@stop
