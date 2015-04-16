<div class="meta">
	<p>Posted in: <a href="{{ route('category.index', $article->category->slug) }}">{{ $article->category->title }}</a></p>
	@unless ($article->tags->isEmpty())
        <p>Tags:
            @foreach ($article->tags as $index => $tag)
            @if ($index != 0)
                &bull;
            @endif
            <a href="{{ route('tag.index', $tag->slug) }}">{{ $tag->name }}</a>
            @endforeach
        </p>
	@endunless
</div>


