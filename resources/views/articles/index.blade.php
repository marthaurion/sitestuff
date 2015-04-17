@extends('app')

@section('content')
	@foreach($articles as $article)
		<div class="blog-post">
			<h2 class="blog-post-title">
				<a href="{{ url('/articles', $article->slug) }}">{{ $article->title }}</a>
			</h2>

            <p class="blog-post-meta">Published by {{ $article->author->username }} on {{ date("M j, Y", strtotime($article->published_at)) }}.
            @if(count($article->comments) == 0)
                No comments.
            @elseif(count($article->comments) == 1)
                    1 comment.
            @else
                {{ count($article->comments) }} comments.
            @endif
            </p>

            <p class="blog-post-content">{{ $article->body }}</p>

			@include('partials._meta')

			<hr>
		</div>
	@endforeach

    <nav>
	    {!! $articles->render() !!}
    </nav>
@stop
