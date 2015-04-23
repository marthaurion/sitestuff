@extends('admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Comment Moderation
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2>Comments</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Post</th>
                            <th>User</th>
                            <th>E-mail</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td><a href="/articles/{{ $comment->article->slug }}">{{ $comment->article->title }}</a></td>
                                <td>{{ $comment->author->username }}</td>
                                <td>{{ $comment->author->email }}</td>
                                <td>{{ $comment->body }}</td>
                                <td><a href="#">Approve</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop