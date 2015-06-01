@extends('app')

@section('content')

    <h1>Articles</h1>

    <hr>

    @foreach($articles as $article)

        <h2>
            <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
        </h2>

        <p>{{ $article->body }}</p>

    @endforeach

@endsection