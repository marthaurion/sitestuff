@extends('app')

@section('content')
	@foreach($articles as $article)
		<div class="blog-post">
			<h2 class="blog-post-title">
				<a href="{{ url('/articles', $article->slug) }}">{{ $article->title }}</a>
			</h2>

            <p class="blog-post-meta">Published by {{ $article->author->username }} on {{ date("M j, Y", strtotime($article->published_at)) }}.
            @if(count($article->approvedComments()) == 0)
                No comments.
            @elseif(count($article->approvedComments()) == 1)
                    1 comment.
            @else
                {{ count($article->approvedComments()) }} comments.
            @endif
            </p>

            @if(isset($article->excerpt))
                <div id="excerpt">
                    <div class="blog-thumb">
                        @if(!empty($article->firstImage()))
                            <img src="{{ $article->firstImage()->path }}" width="200">
                        @endif
                    </div>
                    <p class="blog-post-content">{{ $article->excerpt }}</p>
                    <div style="clear:both"></div>
                </div>
            @else
                <p class="blog-post-content">{{ $article->body }}</p>
            @endif

			@include('partials._meta')

			<hr>
		</div>
	@endforeach

    <nav>
	    {!! $articles->render(new \App\Http\Pagination\PaginationPresenter($articles)) !!}
    </nav>
@stop
