{!! Form::model($comment = new \App\Comment, ['route' => 'comments.store']) !!}

{!! Form::hidden('article_id', $article->id) !!}

@if(!Auth::check())
    <div class="form-group">
        {!! Form::label('username', 'Username: ') !!}
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email: ') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
@else
    {!! Form::hidden('username', Auth::user()->username) !!}
    {!! Form::hidden('email', Auth::user()->email) !!}
@endif

<div class="form-group">
    {!! Form::label('body', 'Comment: ') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}

@include('errors.list')