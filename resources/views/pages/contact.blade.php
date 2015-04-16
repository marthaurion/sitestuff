@extends('app')

@section('content')
	<h1>Contact Me!</h1>

    {!! Form::open(['route' => 'contact']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'First & Last Name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email Address') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@domain.com']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('message', 'Message') !!}
            {!! Form::textarea('message', null, ['class' => 'form-control', 'row' => 10]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

@stop
