@extends('app')

@section('content')

<div class="blog-post">

<h2 class="blog-post-title">{{ $article->title }}</h2>
@if(!empty(Auth::user()) && Auth::user()->isSuper())
<p><a href="{{ '/articles/'.$article->slug."/edit" }}">Edit</a></p>
@endif
<p class="blog-post-meta">Published by {{ $article->author->username }} on {{ date("M j, Y", strtotime($article->published_at)) }}</p>
<p class="blog-post-content">{{ $article->body }}</p>

@include('partials._meta')

<hr />

<div>
    <h4>Comments</h4>
    @if(count($article->topLevelComments()) > 0)
        @foreach($article->topLevelComments() as $comment)
            <div class="comment">
                <div class="comment-pic"></div>
                <p class="comment-author">{{ $comment->author->username }}</p>
                <p class="comment-meta">{{ $comment->created_at }}</p>
                <p class="comment-body">{{ $comment->body }}</p>
            </div>
            <div style="clear: both;"></div>
        @endforeach
    @endif
</div>
</div>

@stop
