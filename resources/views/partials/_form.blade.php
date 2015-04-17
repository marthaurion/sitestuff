<div class="form-group">
	{!! Form::label('title', 'Title: ') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body: ') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('excerpt', 'Excerpt: ') !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('published_at', 'Published On: ') !!}
	{!! Form::input('datetime-local', 'published_at', $article->published_at, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cat_id', 'Category: ') !!}
    {!! Form::select('cat_id', $cat_names, $article->cat_name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tag_list', 'Tags: ') !!}
	{!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
	<script>
		$('#tag_list').select2({
			placeholder: 'Choose a tag'
		});
	</script>
@endsection
