@extends('app')

@section('content')

<div class="blog-post">

    <h2 class="blog-post-title">{{ $article->title }}</h2>
    @if(Auth::check() && Auth::user()->isSuper())
        <p><a href="{{ '/articles/'.$article->slug."/edit" }}">Edit</a></p>
    @endif
    <p class="blog-post-meta">Published by {{ $article->author->username }} on {{ date("M j, Y", strtotime($article->published_at)) }}</p>
    <div class="blog-post-content">{!! $article->body !!}</div>

    @include('partials._meta')

    <hr />

    <div>
        @if(count($article->topLevelComments()) > 0)
            <h4>Comments</h4>
            @foreach($article->topLevelComments() as $comment)
                <div id="comment-{{ $comment->id }}" class="well comment">
                    <div class="comment-pic"></div>
                    <p class="comment-author">{{ $comment->author->username }}</p>
                    <p class="comment-meta">{{ $comment->created_at }}</p>
                    <p class="comment-body">{{ $comment->body }}</p>
                </div>
                <div style="clear: both;"></div>
            @endforeach
            <hr />
        @endif
    </div>

    <div>
        <h4>Leave a comment</h4>

        @include('partials._commentform')
    </div>
</div>

@stop
