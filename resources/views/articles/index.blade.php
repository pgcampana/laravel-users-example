@extends('app')

@section('title')
Index
@stop

@section('content')
<h1>Article</h1>
@if (count($articles))
<ul>
	@foreach ($article as $articles)
		<user>
			<h2><a href="{{action('ArticlesController@show', [$article->id])}}">{{$article->name}}</a><h2>
			<ul>
				<li>{{$article->title}}</li>
				<li>{{$article->id}}</li>
				<li>{{$article->body}}</li>
			</ul>
		</article>
	@endforeach
</ul>
@else
<p>no article</p>
@endif

@stop
